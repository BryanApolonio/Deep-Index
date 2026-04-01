<?php

/*DeepIndex Engine | Made by: https://github.com/BryanApolonio*/
/*Core Logic for SQLite persistence and Onion crawling.*/

define('DB_PATH', __DIR__ . '/../data/deep_index.db');
define('CACHE_TIME', 3600);

function getDatabaseConnection() {
    try {
        $db = new PDO('sqlite:' . DB_PATH);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $db->exec("CREATE TABLE IF NOT EXISTS onion_links (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            address TEXT UNIQUE,
            last_seen INTEGER
        )");
        
        return $db;
    } catch (PDOException $e) {
        error_log("DB Connection Error: " . $e->getMessage());
        return null;
    }
}

function syncAhmiaData($db) {
    $ch = curl_init("https://ahmia.fi/onions/");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_USERAGENT      => 'DeepIndex-Crawler/2.0',
        CURLOPT_TIMEOUT        => 30
    ]);
    
    $content = curl_exec($ch);
    curl_close($ch);

    if ($content) {
        preg_match_all('/[a-z2-7]{56}\.onion/', $content, $matches);
        $links = array_unique($matches[0]);

        if (!empty($links)) {
            $db->beginTransaction();
            $db->exec("DELETE FROM onion_links");
            
            $stmt = $db->prepare("INSERT INTO onion_links (address, last_seen) VALUES (?, ?)");
            $now = time();
            
            foreach ($links as $link) {
                $stmt->execute([$link, $now]);
            }
            $db->commit();
            return true;
        }
    }
    return false;
}

function fetchOnionLinks($query = '') {
    $db = getDatabaseConnection();
    if (!$db) return [];

    $res = $db->query("SELECT last_seen FROM onion_links LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    $lastUpdate = $res['last_seen'] ?? 0;

    if (time() - $lastUpdate > CACHE_TIME) {
        syncAhmiaData($db);
    }

    try {
        if (!empty($query)) {
            $stmt = $db->prepare("SELECT address FROM onion_links WHERE address LIKE :q LIMIT 100");
            $stmt->execute([':q' => '%' . strtolower($query) . '%']);
        } else {
            $stmt = $db->query("SELECT address FROM onion_links ORDER BY id DESC LIMIT 100");
        }
        
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    } catch (PDOException $e) {
        return [];
    }
}
