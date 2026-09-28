const {
  makeWASocket,
  useMultiFileAuthState,
  DisconnectReason,
  fetchLatestBaileysVersion,
} = require("@whiskeysockets/baileys");
const pino = require("pino");
const qrcode = require("qrcode-terminal");
const axios = require("axios");
const express = require("express");

// express special for url

const app = express();

app.use(express.json());

app.get("/ping", (req, res) => {
    res.json({
        success: true,
        message: "pong",
    });
});

app.listen(3001, "127.0.0.1", () => {
    console.log("WhatsApp API listening on http://127.0.0.1:3001");
});

//


async function startBot() {
  // 1. Setup Auth
  const { state, saveCreds } = await useMultiFileAuthState("auth_info_baileys");

  // 2. Ambil versi WA terbaru biar gak gampang DC
  const { version } = await fetchLatestBaileysVersion();

  const sock = makeWASocket({
    version,
    auth: state,
    logger: pino({ level: "error" }), // Ubah ke error biar tau kalau ada masalah fatal
    printQRInTerminal: false, // Kita handle manual di bawah
    browser: ["Windows", "Chrome", "11.0.0"], // Identitas bot
    getMessage: async (key) => {
      return { conversation: "hey" };
    },
  });

  sock.ev.on("connection.update", (update) => {
    const { connection, lastDisconnect, qr } = update;

    if (qr) {
      console.log("--- SCAN QR DI BAWAH INI ---");
      qrcode.generate(qr, { small: true });
    }

    if (connection === "close") {
      const statusCode = lastDisconnect?.error?.output?.statusCode;
      const reason = lastDisconnect?.error?.message;

      console.log(`Koneksi Close: ${reason} (${statusCode})`);

      const shouldReconnect = statusCode !== DisconnectReason.loggedOut;
      if (shouldReconnect) {
        console.log("Mencoba hubungkan kembali dalam 5 detik...");
        setTimeout(() => startBot(), 5000); // Kasih delay biar gak spamming loop
      }
    } else if (connection === "open") {
      console.log("Bot sudah online! ✅");
    }
  });

  sock.ev.on("creds.update", saveCreds);

  sock.ev.on("messages.upsert", async ({ messages }) => {
    const m = messages[0];
    if (!m.message || m.key.fromMe) return;

    const messageText =
      m.message.conversation || m.message.extendedTextMessage?.text || "";
    const lowerText = messageText.toLowerCase();
    const sender = m.key.remoteJid;

    // fitur 1
    if (messageText.toLowerCase() === "ping") {
      await sock.sendPresenceUpdate("composing", sender);
      await new Promise((resolve) => setTimeout(resolve, 1000));

      await sock.sendMessage(m.key.remoteJid, { text: "Pong!" });
    }


    // fitur 7?
    // end

    // ini harusnya end
  });
}

startBot().catch((err) => console.error("Error saat start:", err));
