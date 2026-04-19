<?php
require_once 'config.php';

$pageTitle = 'Order';
$activePage = 'order';
$statusMessage = '';
$statusClass = '';
$selectedMenuItem = isset($_GET['menu_item']) ? trim($_GET['menu_item']) : '';

$menuOptions = array(
    'Grilled Tilapia',
    'Fried Fish',
    'Fish Curry',
    'Soda',
    'Mango Juice',
    'Passion Juice'
);

if (!in_array($selectedMenuItem, $menuOptions, true)) {
    $selectedMenuItem = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim(isset($_POST['full_name']) ? $_POST['full_name'] : '');
    $email = trim(isset($_POST['email']) ? $_POST['email'] : '');
    $phone = trim(isset($_POST['phone']) ? $_POST['phone'] : '');
    $menuItem = trim(isset($_POST['menu_item']) ? $_POST['menu_item'] : '');
    $address = trim(isset($_POST['address']) ? $_POST['address'] : '');
    $orderDate = trim(isset($_POST['order_date']) ? $_POST['order_date'] : '');

    if ($fullName === '' || $email === '' || $phone === '' || $menuItem === '' || $address === '' || $orderDate === '') {
        $statusMessage = 'Please fill in all required fields.';
        $statusClass = 'error';
        $selectedMenuItem = $menuItem;
    } else {
        $connection = getDbConnection();
        $sql = 'INSERT INTO food_orders (full_name, email, phone, menu_item, address, order_date) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = mysqli_prepare($connection, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ssssss', $fullName, $email, $phone, $menuItem, $address, $orderDate);
            $saved = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($saved) {
                $statusMessage = 'Order placed successfully. Thank you!';
                $statusClass = 'success';
                $selectedMenuItem = '';
            } else {
                $statusMessage = 'Could not save order. Please try again.';
                $statusClass = 'error';
                $selectedMenuItem = $menuItem;
            }
        } else {
            $statusMessage = 'Could not prepare database request.';
            $statusClass = 'error';
            $selectedMenuItem = $menuItem;
        }

        mysqli_close($connection);
    }
}

include 'header.php';
?>
<section class="container section-block">
    <h1 class="section-title">Order Food Online</h1>
    <div class="panel">
        <form action="order.php" method="post" class="form-grid-large">
            <div class="form-field">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" required />
            </div>
            <div class="form-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div class="form-field">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" required />
            </div>
            <div class="form-field">
                <label for="menu_item">Select Menu</label>
                <select id="menu_item" name="menu_item" required>
                    <option value="" <?php echo $selectedMenuItem === '' ? 'selected' : ''; ?>>Choose menu item</option>
                    <?php foreach ($menuOptions as $option): ?>
                        <option value="<?php echo htmlspecialchars($option); ?>" <?php echo $selectedMenuItem === $option ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($option); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-field form-span-2">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required />
            </div>
            <div class="form-field">
                <label for="order_date">Date</label>
                <input type="date" id="order_date" name="order_date" required />
            </div>
            <div class="form-field form-align-end">
                <button type="submit" class="btn btn-primary">Submit Order</button>
            </div>
        </form>
        <?php if ($statusMessage !== ''): ?>
            <p class="form-status <?php echo $statusClass; ?>"><?php echo htmlspecialchars($statusMessage); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php include 'footer.php'; ?>
