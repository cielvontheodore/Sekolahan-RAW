# Narra — Sekolahan-RAW

A school website and content management system built with Laravel. Narra provides a public-facing website for school news, galleries, contact messages, and an admin dashboard.

## Tech Stack

* **Backend:** Laravel 12
* **Language:** PHP
* **Database:** MySQL
* **Frontend:** Blade, Vite, and npm
* **Authentication:** Laravel Breeze
* **WhatsApp integration:** Node.js, Express, and Baileys

## Requirements

Make sure you have installed:

* PHP and Composer
* MySQL or MariaDB
* Node.js and npm
* Git

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/cielvontheodore/Sekolahan-RAW.git
cd Sekolahan-RAW
```

### 2. Install Laravel dependencies

```bash
composer install
```

Create your environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 3. Configure the database

Create a MySQL database, then update the database settings in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Run the database migrations:

```bash
php artisan migrate
```

### 4. Install frontend dependencies

From the project root:

```bash
npm install
npm run build
```

For frontend development with hot reloading, use:

```bash
npm run dev
```

### 5. Start the Laravel application

```bash
php artisan serve
```

The application will be available at:

http://127.0.0.1:8000

## WhatsApp Integration

Narra includes a separate Node.js service in the `whatsapp/` directory. It uses Baileys to connect to WhatsApp and allows Laravel to send notifications to an administrator's WhatsApp group when new inbox messages arrive.

### 1. Install dependencies

```bash
cd whatsapp
npm ci
```

If `package-lock.json` is not available, use `npm install` instead.

### 2. Start the WhatsApp service

```bash
node index.js
```

The service runs locally on `127.0.0.1:3001`.

Available endpoints:

* `GET /ping` — check whether the service is running.
* `POST /send` — send a WhatsApp message.

### 3. Connect WhatsApp

On the first run, follow the QR-code or pairing instructions provided by the service and link your WhatsApp account.

Authentication data is stored locally in `whatsapp/auth_info_baileys/`. Keep this directory private; it contains sensitive session credentials.

**Important:** Run the Laravel application and WhatsApp service separately. WhatsApp notifications require the Node.js service to be running and reachable by Laravel.

## Project Structure

```text
Sekolahan-RAW/
├── app/                 # Laravel application logic
├── database/            # Migrations and seeders
├── public/              # Public assets
├── resources/           # Blade views and frontend resources
├── routes/              # Application routes
├── whatsapp/            # Node.js WhatsApp service
├── package.json         # Frontend dependencies
├── composer.json        # PHP dependencies
└── artisan              # Laravel CLI
```

## Development Notes

* Configure your local environment in `.env`.
* Never commit `.env`, API keys, database credentials, or WhatsApp session data.
* Keep `composer.lock` and the relevant npm lockfiles in version control for reproducible dependency installation.
* The WhatsApp integration is a separate service and must be deployed and maintained independently of Laravel.

## License

Add your chosen license here before redistributing the project.
