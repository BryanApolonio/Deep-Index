<?php 
require_once 'includes/engine.php';
$query = $_GET['q'] ?? '';

if (empty($query)) {
    header("Location: index.php");
    exit;
}
$links = fetchOnionLinks($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($query) ?> - DeepSearch</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="app-container results-view">
        <header class="top-bar">
            <a href="index.php" style="text-decoration: none; color: inherit;">
                <div class="logo"><span>// </span>DEEP INDEX</div>
            </a>

            <section class="search-section">
                <form action="results.php" method="GET" class="input-group">
                    <input type="text" name="q" value="<?= htmlspecialchars($query) ?>" required>
                    <button type="submit" class="btn-execute">Search</button>
                </form>
            </section>
        </header>

        <main class="results-grid">
            <?php if (empty($links)): ?>
                <div class="empty-state">
                    <p>STATUS: NO_DATA_FOUND | INDEX REFRESH REQUIRED</p>
                </div>
            <?php else: ?>
                <?php foreach ($links as $link): ?>
                    <div class="link-card">
                        <span class="card-tag">NODE_ADDRESS_V3</span>
                        <a href="http://<?= $link ?>" target="_blank" class="onion-address"><?= $link ?></a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
          </main>
        <footer class="simple-footer">
       Source: Ahmia Public Database | <a href="https://ahmia.fi/onions" target="_blank" class="footer-link">ahmia.fi/onions</a>
     </footer>
    </div>
</body>
</html>
