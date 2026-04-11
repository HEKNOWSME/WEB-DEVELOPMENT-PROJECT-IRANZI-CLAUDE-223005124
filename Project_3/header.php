<?php
require_once 'config.php';

if (!isset($pageTitle)) {
    $pageTitle = 'Claudi Hotel';
}

if (!isset($activePage)) {
    $activePage = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($pageTitle); ?> | Claudi Hotel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <div class="brand-block">
                <span class="brand-mark">Claudi</span>
                <span class="brand-sub">Hotel & Restaurant</span>
            </div>
            <button class="menu-toggle" id="menu-toggle" aria-label="Toggle menu">Menu</button>
            <nav class="site-nav" id="site-nav">
                <a class="nav-link <?php echo $activePage === 'home' ? 'active' : ''; ?>" href="index.php">Home</a>
                <a class="nav-link <?php echo $activePage === 'about' ? 'active' : ''; ?>" href="about.php">About Us</a>
                <a class="nav-link <?php echo $activePage === 'menu' ? 'active' : ''; ?>" href="menu.php">Menu</a>
                <a class="nav-link <?php echo $activePage === 'order' ? 'active' : ''; ?>" href="order.php">Order</a>
                <a class="nav-link <?php echo $activePage === 'gallery' ? 'active' : ''; ?>" href="gallery.php">Gallery</a>
                <a class="nav-link <?php echo $activePage === 'contact' ? 'active' : ''; ?>" href="contact.php">Contact Us</a>
                <?php if (!empty($_SESSION['admin_logged_in'])): ?>
                    <a class="nav-link <?php echo $activePage === 'orders' ? 'active' : ''; ?>" href="orders.php">Customer Orders</a>
                    <a class="nav-link" href="logout.php">Logout</a>
                <?php else: ?>
                    <a class="nav-link <?php echo $activePage === 'login' ? 'active' : ''; ?>" href="login.php">Login</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main class="site-main">
