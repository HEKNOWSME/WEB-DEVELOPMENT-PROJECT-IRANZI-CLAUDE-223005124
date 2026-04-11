<?php
$pageTitle = 'Gallery';
$activePage = 'gallery';
include 'header.php';
?>
<section class="container section-block">
    <h1 class="section-title">Food & Drink Gallery</h1>
    <p class="section-subtitle">Each image is a link that redirects to the Order page.</p>

    <div class="gallery-grid">
        <a href="order.php" class="gallery-card"><img src="https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&w=1200&q=80" alt="Grilled fish plate" /></a>
        <a href="order.php" class="gallery-card"><img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=1200&q=80" alt="Restaurant fish meal" /></a>
        <a href="order.php" class="gallery-card"><img src="https://images.unsplash.com/photo-1562967916-eb82221dfb92?auto=format&fit=crop&w=1200&q=80" alt="Fresh tropical drinks" /></a>
        <a href="order.php" class="gallery-card"><img src="https://images.unsplash.com/photo-1559847844-5315695dadae?auto=format&fit=crop&w=1200&q=80" alt="Juice glasses" /></a>
        <a href="order.php" class="gallery-card"><img src="https://images.unsplash.com/photo-1466978913421-dad2ebd01d17?auto=format&fit=crop&w=1200&q=80" alt="Dessert and beverage" /></a>
    </div>
</section>
<?php include 'footer.php'; ?>
