<?php
require_once 'config.php';

$allowedRedirects = array('order.php', 'orders.php');

$redirectTarget = isset($_GET['redirect']) ? trim($_GET['redirect']) : '';
if ($redirectTarget === '' && isset($_POST['redirect_target'])) {
    $redirectTarget = trim($_POST['redirect_target']);
}
if (!in_array($redirectTarget, $allowedRedirects, true)) {
    $redirectTarget = 'orders.php';
}

$selectedMenuItem = isset($_GET['menu_item']) ? trim($_GET['menu_item']) : '';
if ($selectedMenuItem === '' && isset($_POST['selected_menu_item'])) {
    $selectedMenuItem = trim($_POST['selected_menu_item']);
}

if (!empty($_SESSION['admin_logged_in'])) {
    $redirectUrl = $redirectTarget;
    if ($selectedMenuItem !== '' && $redirectTarget === 'order.php') {
        $redirectUrl .= '?menu_item=' . urlencode($selectedMenuItem);
    }
    header('Location: ' . $redirectUrl);
    exit;
}

$pageTitle = 'Login';
$activePage = 'login';
$statusMessage = '';
$statusClass = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim(isset($_POST['username']) ? $_POST['username'] : '');
    $password = trim(isset($_POST['password']) ? $_POST['password'] : '');

    if ($username === '' || $password === '') {
        $statusMessage = 'Please enter username and password.';
        $statusClass = 'error';
    } else {
        $connection = getDbConnection();
        $sql = 'SELECT id, username, password FROM admins WHERE username = ? LIMIT 1';
        $stmt = mysqli_prepare($connection, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
            mysqli_stmt_close($stmt);

            if ($user && $password === $user['password']) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = $user['username'];
                $redirectUrl = $redirectTarget;
                if ($selectedMenuItem !== '' && $redirectTarget === 'order.php') {
                    $redirectUrl .= '?menu_item=' . urlencode($selectedMenuItem);
                }
                header('Location: ' . $redirectUrl);
                exit;
            }
        }

        mysqli_close($connection);
        $statusMessage = 'Invalid login credentials.';
        $statusClass = 'error';
    }
}

include 'header.php';
?>
<section class="container section-block">
    <h1 class="section-title">Admin Login</h1>
    <div class="panel login-panel">
        <p class="section-subtitle">Login to view customer order information.</p>
        <form action="login.php" method="post" class="form-grid-large">
            <input type="hidden" name="redirect_target" value="<?php echo htmlspecialchars($redirectTarget); ?>" />
            <input type="hidden" name="selected_menu_item" value="<?php echo htmlspecialchars($selectedMenuItem); ?>" />
            <div class="form-field form-span-2">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div class="form-field form-span-2">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required />
            </div>
            <div class="form-field form-span-2">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <?php if ($statusMessage !== ''): ?>
            <p class="form-status <?php echo $statusClass; ?>"><?php echo htmlspecialchars($statusMessage); ?></p>
        <?php endif; ?>
        <p class="hint-text">Default login: admin / admin123</p>
    </div>
</section>
<?php include 'footer.php'; ?>
