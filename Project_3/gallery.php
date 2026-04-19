<?php
$pageTitle = 'Gallery';
$activePage = 'gallery';
include 'header.php';
?>
<section class="container section-block">
    <h1 class="section-title">Food & Drink Gallery</h1>
    <p class="section-subtitle">Each image opens the order form with the selected menu item.</p>

    <div class="gallery-grid">
        <a href="order.php?menu_item=Grilled+Tilapia" class="gallery-card"><img src="assets/Grilled_Tilapia.png" alt="Grilled Tilapia" /></a>
        <a href="order.php?menu_item=Fried+Fish" class="gallery-card"><img src="assets/Fried_Fish.png" alt="Fried Fish" /></a>
        <a href="order.php?menu_item=Fish+Curry" class="gallery-card"><img src="assets/Fish_Curry.png" alt="Fish Curry" /></a>
        <a href="order.php?menu_item=Mango+Juice" class="gallery-card"><img src="assets/Mango_Juice.png" alt="Mango Juice" /></a>
        <a href="order.php?menu_item=Passion+Juice" class="gallery-card"><img src="assets/Passion_Juice.png" alt="Passion Juice" /></a>
        <a href="order.php?menu_item=Soda" class="gallery-card"><img src="assets/soda.png" alt="Soda" /></a>
    </div>
</section>
<?php include 'footer.php'; ?>
