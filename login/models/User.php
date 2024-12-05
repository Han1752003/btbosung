<?php
class User {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public static function register($username, $password) {
        $filePath = __DIR__ . '/users.json'; 
        $users = json_decode(file_get_contents($filePath), true) ?? [];
        
        if (isset($users[$username])) {
            return false; 
        }
        
        $users[$username] = (new User($username, $password))->password;
        return file_put_contents($filePath, json_encode($users, JSON_PRETTY_PRINT)) !== false;
    }

    public static function login($username, $password) {
        $filePath = __DIR__ . '/users.json'; //
        $users = json_decode(file_get_contents($filePath), true);
        
        return isset($users[$username]) && password_verify($password, $users[$username]);
    }
}
?>