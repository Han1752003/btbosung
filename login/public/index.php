<?php

require_once '../controllers/UserController.php';
$userController = new UserController();
$content = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        if ($userController->register($_POST['username'], $_POST['password'])) {
            $content = "<p>Đăng ký thành công!</p>";
        } else {
            $content = "<p>Đăng ký thất bại!</p>";
        }
    } elseif (isset($_POST['login'])) {
        if ($userController->login($_POST['username'], $_POST['password'])) {
            header("Location: index.php");
            exit();
        } else {
            $content = "<p>Đăng nhập thất bại!</p>";
        }
    } elseif (isset($_POST['logout'])) {
        $userController->logout();
    } elseif (isset($_SESSION['username'])) {

        $content .= include '../views/layout.php';
        exit();
    }
}

if (!isset($_SESSION['username'])) {
    $content .= include '../views/register.php';
    $content .= include '../views/login.php';
}

include '../views/layout.php';