<?php
$pageTitle = 'Home';
$activePage = 'home';
include 'header.php';
?>
<section class="hero-section">
    <div class="container hero-grid">
        <div class="hero-copy">
            <h1>Warm Welcome, Exceptional Taste</h1>
            <p>
                Claudi Hotel blends elegant rooms with memorable dining. Enjoy fresh fish,
                tropical drinks, and attentive service in the heart of Kigali.
            </p>
            <div class="hero-actions">
                <a href="order.php" class="btn btn-primary">Order Food</a>
                <a href="menu.php" class="btn btn-outline">View Menu</a>
            </div>
        </div>
        <div class="hero-card">
            <h3>Today Special</h3>
            <p class="hero-special-title">Grilled Tilapia Platter</p>
            <p>Served with seasoned vegetables and fresh passion juice.</p>
            <span class="badge">8,000 RWF</span>
        </div>
    </div>
</section>

<section class="container section-block">
    <h2 class="section-title">Why Guests Choose Us</h2>
    <div class="feature-grid">
        <div class="feature-box">
            <h3>Fresh Ingredients</h3>
            <p>Every meal is prepared with carefully selected local produce and spices.</p>
        </div>
        <div class="feature-box">
            <h3>Comfortable Spaces</h3>
            <p>Relax in clean rooms and a peaceful atmosphere designed for rest.</p>
        </div>
        <div class="feature-box">
            <h3>Friendly Team</h3>
            <p>Our staff is always available to make your stay smooth and enjoyable.</p>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
