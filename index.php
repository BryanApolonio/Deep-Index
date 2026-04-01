<?php 
require_once 'includes/engine.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeepSearch | Onion Directory</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="app-container centered-view">
        <header>
            <div class="logo"><span>// </span>DEEP INDEX</div>
            <p class="subtitle">SECURE ANONYMOUS LINK AGGREGATOR</p>
        </header>

        <section class="search-section">
            <form action="results.php" method="GET" class="input-group">
                <input type="text" name="q" placeholder="Search .onion links..." required autofocus>
                <button type="submit" class="btn-execute">Search</button>
            </form>
        </section>
        
        <footer class="simple-footer">
       DATABASE: SQLITE3 | MADE BY: <a href="https://github.com/BryanApolonio" target="_blank" class="footer-link">BryanApolonio</a>
     </footer>
     
    </div>
</body>
</html>
