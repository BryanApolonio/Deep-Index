# Deep Index
> A simple .onion link aggregator and high-performance search engine with a brutalist design.

<p align="center">
  <img src="./img/home.png" width="48%" />
  <img src="./img/results.png" width="48%" />
</p>

---

## Overview
**Deep Index** is a lightweight PHP-based search engine designed to crawl and cache hidden services from the Deep Web. It prioritizes speed, a brutalist "dark-mode" aesthetics, and zero-bloat functionality.

The engine synchronizes with the **[Ahmia.fi](https://ahmia.fi/onions/)** public database to provide a curated list of active Onion V3 nodes, storing them locally for instant access.

## Features
- **Automated Sync:** Intelligent caching system that refreshes the index periodically.
- **SQLite3 Backend:** Fast, file-based persistence (no heavy SQL setup required).
- **Onion V3 Ready:** Optimized regex filters for 56-character v3 addresses.
- **Minimalist UI:** A cold, terminal-inspired interface focused on logic and readability.

## Prerequisites
To run this project on your local machine or a Linux server, you need:

* **PHP 8.1+**
* **PHP Extensions:** `php-sqlite3`, `php-curl`
* **Web Server:** Apache, Nginx, or the PHP built-in server.

### Installation (Debian/Ubuntu/MX Linux)
```bash
sudo apt update
sudo apt install php-cli php-sqlite3 php-curl -y
````

## Getting Started

1.  **Clone the repository:**

    ```bash
    git clone https://github.com/BryanApolonio/Deep-Index.git
    cd deep-index
    ```

2.  **Set Permissions:**
    Ensure the `data/` directory is writable:

    ```bash
    chmod 775 data/
    ```

3.  **Run the server:**

    ```bash
    php -S localhost:8000
    ```

    Open `http://localhost:8000` in your browser.

## Project Structure

```text
├── assets/
│   ├── css/style.css       # Optimized Styles
│   └── img/                # UI Screenshots (home.png & results.png)
├── data/
│   └── deep_index.db       # SQLite Persistence (Auto-generated)
├── includes/
│   └── engine.php          # Crawler & Search Logic
├── index.php               # Entry Point (Home)
└── results.php             # Data Grid View (Search)
```

-----

## Credits & Data Source

This project functions as a gateway to the distributed web. We acknowledge and credit **[Ahmia.fi](https://ahmia.fi/)** for their invaluable contribution to the privacy ecosystem.

**Deep Index** uses the [Ahmia Public Onion List](https://ahmia.fi/onions/) as its primary data feed to maintain an updated directory of hidden services.

> **Disclaimer:** This tool is for educational and research purposes only. Use it responsibly and at your own risk.
