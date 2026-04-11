<?php
require_once 'auth.php';
requireLogin();

$pageTitle = 'Customer Orders';
$activePage = 'orders';

$connection = getDbConnection();
$orderResult = mysqli_query($connection, 'SELECT id, full_name, email, phone, menu_item, address, order_date, created_at FROM food_orders ORDER BY id DESC');

include 'header.php';
?>
<section class="container section-block">
    <h1 class="section-title">Customer Order Information</h1>
    <p class="section-subtitle">Logged in as <?php echo htmlspecialchars($_SESSION['user_username']); ?>.</p>

    <div class="table-wrap">
        <table class="menu-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Select Menu</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($orderResult && mysqli_num_rows($orderResult) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($orderResult)): ?>
                        <tr>
                            <td><?php echo (int) $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['menu_item']); ?></td>
                            <td><?php echo htmlspecialchars($row['address']); ?></td>
                            <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No orders found yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <a href="logout.php" class="btn btn-outline">Logout</a>
</section>
<?php
mysqli_close($connection);
include 'footer.php';
?>
