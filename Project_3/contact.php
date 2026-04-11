<?php
require_once 'config.php';

$pageTitle = 'Contact Us';
$activePage = 'contact';
$statusMessage = '';
$statusClass = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim(isset($_POST['full_name']) ? $_POST['full_name'] : '');
    $email = trim(isset($_POST['email']) ? $_POST['email'] : '');
    $phone = trim(isset($_POST['phone']) ? $_POST['phone'] : '');
    $location = trim(isset($_POST['location']) ? $_POST['location'] : '');
    $message = trim(isset($_POST['message']) ? $_POST['message'] : '');

    if ($fullName === '' || $email === '' || $phone === '' || $location === '' || $message === '') {
        $statusMessage = 'Please complete all contact fields.';
        $statusClass = 'error';
    } else {
        $connection = getDbConnection();
        $sql = 'INSERT INTO contact_messages (full_name, email, phone, location, message) VALUES (?, ?, ?, ?, ?)';
        $stmt = mysqli_prepare($connection, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'sssss', $fullName, $email, $phone, $location, $message);
            $saved = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($saved) {
                $statusMessage = 'Your message has been sent successfully.';
                $statusClass = 'success';
            } else {
                $statusMessage = 'Could not send your message. Try again.';
                $statusClass = 'error';
            }
        } else {
            $statusMessage = 'Could not prepare database request.';
            $statusClass = 'error';
        }

        mysqli_close($connection);
    }
}

include 'header.php';
?>
<section class="container section-block">
    <h1 class="section-title">Contact Us</h1>
    <div class="split-layout">
        <div class="panel">
            <h3>Visit Us</h3>
            <p><strong>Address:</strong> KG 7 Ave, Kigali, Rwanda</p>
            <p><strong>Phone:</strong> +250 788 000 000</p>
            <p><strong>Email:</strong> info@claudihotel.rw</p>
            <p><strong>Opening Hours:</strong> 7:00 AM - 10:00 PM (Daily)</p>
        </div>
        <div class="panel">
            <form action="contact.php" method="post" class="form-grid-large">
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
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" required />
                </div>
                <div class="form-field form-span-2">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <div class="form-field form-span-2">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
            <?php if ($statusMessage !== ''): ?>
                <p class="form-status <?php echo $statusClass; ?>"><?php echo htmlspecialchars($statusMessage); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
