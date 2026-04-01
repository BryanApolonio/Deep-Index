# 🔍 DEEP INDEX a simple search engine to use as a base
> A minimalist, logic-driven .onion link aggregator and search engine.

![Home Interface](./img/home.png)
![Search Results](./img/results.png)

---

## 💀 Overview
**Deep Index** is a lightweight PHP-based search engine designed to crawl and cache hidden services from the Deep Web. It prioritizes speed, a brutalist "dark-mode" aesthetics, and zero-bloat functionality.

The engine synchronizes with the **[Ahmia.fi](https://ahmia.fi/onions/)** public database to provide a curated list of active Onion V3 nodes.

## ⚡ Features
- **Automated Crawling:** Periodically fetches and parses the latest Onion V3 addresses.
- **SQLite Persistence:** Uses a local database to cache links, ensuring lightning-fast search results.
- **Brutalist UI:** A cold, terminal-inspired interface focused on readability and UX.
- **Node Validation:** Regex-based filtering to ensure only valid V3 addresses are indexed.

## 🛠️ Prerequisites
To run this project on your local machine (or a Linux server), you need:

* **PHP 8.1+**
* **PHP Extensions:** `php-sqlite3`, `php-curl`, `php-mbstring`
* **Web Server:** Apache, Nginx, or the PHP built-in server.

### Installation (Debian/Ubuntu/MX Linux)
```bash
sudo apt update
sudo apt install php-cli php-sqlite3 php-curl
