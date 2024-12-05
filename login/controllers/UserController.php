<?php
session_start();
require_once '../models/User.php';

class UserController {
    public function register($username, $password) {
        return User::register($username, $password);
    }

    public function login($username, $password) {
        if (User::login($username, $password)) {
            $_SESSION['username'] = $username;
            return true;
        }
        return false;
    }

    public function logout() {
        session_destroy();
        header("Location: /login/public/index.php");
        exit();
    }
}