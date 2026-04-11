<?php

require_once 'config.php';

function requireLogin()
{
    if (empty($_SESSION['admin_logged_in'])) {
        header('Location: login.php');
        exit;
    }
}
