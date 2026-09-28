const {
    makeWASocket,
    useMultiFileAuthState,
    DisconnectReason,
    fetchLatestBaileysVersion,
} = require("@whiskeysockets/baileys");

const pino = require("pino");
const qrcode = require("qrcode-terminal");
const express = require("express");


// ==================================================
// CONFIG
// ==================================================

const PORT = 3001;

// Ganti dengan JID grup WhatsApp tujuan
const GROUP_JID = "120363197762735821@g.us";


// ==================================================
// EXPRESS API
// ==================================================

const app = express();

app.use(express.json());


// Health check
app.get("/ping", (req, res) => {
    res.json({
        success: true,
        message: "pong",
    });
});


// Send message to WhatsApp group
app.post("/send", async (req, res) => {
    try {
        // WhatsApp belum connect
        if (!sock) {
            return res.status(503).json({
                success: false,
                message: "WhatsApp belum terhubung",
            });
        }

        const { message } = req.body;

        // Message kosong
        if (!message) {
            return res.status(400).json({
                success: false,
                message: "message wajib diisi",
            });
        }

        // Laravel cuma ngasih text.
        // Baileys meneruskan ke grup.
        await sock.sendMessage(GROUP_JID, {
            text: message,
        });

        console.log("Pesan berhasil dikirim ke WhatsApp.");

        res.json({
            success: true,
            message: "Pesan berhasil dikirim",
        });

    } catch (error) {
        console.error("Gagal mengirim WhatsApp:", error);

        res.status(500).json({
            success: false,
            message: "Gagal mengirim pesan",
        });
    }
});


// Start Express
app.listen(PORT, "127.0.0.1", () => {
    console.log(
        `WhatsApp API listening on http://127.0.0.1:${PORT}`
    );
});


// ==================================================
// BAILEYS
// ==================================================

// IMPORTANT:
// Jangan const sock di dalam startBot().
// Express juga perlu mengakses socket ini.

let sock = null;


async function startBot() {

    // ----------------------------------------------
    // Auth
    // ----------------------------------------------

    const { state, saveCreds } =
        await useMultiFileAuthState("auth_info_baileys");


    // ----------------------------------------------
    // WhatsApp version
    // ----------------------------------------------

    const { version } =
        await fetchLatestBaileysVersion();


    // ----------------------------------------------
    // Create socket
    // ----------------------------------------------

    sock = makeWASocket({
        version,
        auth: state,

        logger: pino({
            level: "error",
        }),

        printQRInTerminal: false,

        browser: [
            "Windows",
            "Chrome",
            "11.0.0",
        ],

        getMessage: async (key) => {
            return {
                conversation: "hey",
            };
        },
    });


    // ----------------------------------------------
    // Connection
    // ----------------------------------------------

    sock.ev.on("connection.update", async (update) => {

        const {
            connection,
            lastDisconnect,
            qr,
        } = update;


        // QR
        if (qr) {
            console.log("");
            console.log("--- SCAN QR DI BAWAH INI ---");

            qrcode.generate(qr, {
                small: true,
            });
        }


        // Connection closed
        if (connection === "close") {

            const statusCode =
                lastDisconnect?.error?.output?.statusCode;

            const reason =
                lastDisconnect?.error?.message;

            console.log(
                `Koneksi Close: ${reason} (${statusCode})`
            );


            const shouldReconnect =
                statusCode !== DisconnectReason.loggedOut;


            if (shouldReconnect) {

                console.log(
                    "Mencoba hubungkan kembali dalam 5 detik..."
                );

                // Socket lama sudah mati.
                sock = null;

                setTimeout(() => {
                    startBot().catch((err) => {
                        console.error(
                            "Gagal reconnect:",
                            err
                        );
                    });
                }, 5000);

            } else {

                console.log(
                    "WhatsApp logout. Tidak melakukan reconnect."
                );

                sock = null;
            }
        }


        // Connection opened
        else if (connection === "open") {

            console.log("");
            console.log("Bot sudah online! ✅");

             try {
                const groups = await sock.groupFetchAllParticipating();

                console.log("\n=== WHATSAPP GROUPS ===");

                for (const [jid, group] of Object.entries(groups)) {
                    console.log(`Group: ${group.subject}`);
                    console.log(`JID: ${jid}`);
                    console.log("----------------------");
                }
            } catch (error) {
                console.error("Gagal mengambil daftar grup:", error);
            }

        }
    });


    // ----------------------------------------------
    // Save authentication credentials
    // ----------------------------------------------

    sock.ev.on(
        "creds.update",
        saveCreds
    );


    // ----------------------------------------------
    // Incoming messages
    // ----------------------------------------------

    sock.ev.on(
        "messages.upsert",
        async ({ messages }) => {

            const m = messages[0];

            if (!m.message || m.key.fromMe) {
                return;
            }


            const messageText =
                m.message.conversation ||
                m.message.extendedTextMessage?.text ||
                "";

            const lowerText =
                messageText.toLowerCase();

            const sender =
                m.key.remoteJid;


            // --------------------------------------
            // ping
            // --------------------------------------

            if (lowerText === "ping") {

                await sock.sendPresenceUpdate(
                    "composing",
                    sender
                );

                await new Promise(
                    (resolve) =>
                        setTimeout(resolve, 1000)
                );

                await sock.sendMessage(
                    sender,
                    {
                        text: "Pong!",
                    }
                );
            }
        }
    );
}


// ==================================================
// START BOT
// ==================================================

startBot().catch((err) => {
    console.error(
        "Error saat start:",
        err
    );
});
