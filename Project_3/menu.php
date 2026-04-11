<?php
$pageTitle = 'Menu';
$activePage = 'menu';
include 'header.php';
?>
<section class="container section-block">
    <h1 class="section-title">Restaurant Menu</h1>
    <p class="section-subtitle">Menu presented in HTML table format as requested.</p>

    <div class="table-wrap">
        <table class="menu-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Price (RWF)</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>1</td><td>Fish</td><td>Grilled Tilapia</td><td>Whole fish with lemon herb sauce</td><td>8000</td></tr>
                <tr><td>2</td><td>Fish</td><td>Fried Fish</td><td>Crispy fish served with salad</td><td>7000</td></tr>
                <tr><td>3</td><td>Fish</td><td>Fish Curry</td><td>Mild coconut curry fish</td><td>8500</td></tr>
                <tr><td>4</td><td>Drink</td><td>Water</td><td>Still bottled water</td><td>500</td></tr>
                <tr><td>5</td><td>Drink</td><td>Soda</td><td>Fanta, Coke, or Sprite</td><td>1000</td></tr>
                <tr><td>6</td><td>Drink</td><td>Coffee</td><td>Fresh hot Rwandan coffee</td><td>1500</td></tr>
                <tr><td>7</td><td>Fresh Juice</td><td>Mango Juice</td><td>Fresh mango blend</td><td>2000</td></tr>
                <tr><td>8</td><td>Fresh Juice</td><td>Passion Juice</td><td>Fresh passion fruit juice</td><td>1800</td></tr>
                <tr><td>9</td><td>Fresh Juice</td><td>Pineapple Juice</td><td>Cold pineapple juice</td><td>1800</td></tr>
            </tbody>
        </table>
    </div>
</section>
<?php include 'footer.php'; ?>
