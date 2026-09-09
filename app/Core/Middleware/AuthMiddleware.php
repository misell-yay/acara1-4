<?php
class AuthMiddleware {
    public static function handle() {
        // Cek apakah user belum memiliki sesi login
        if (!isset($_SESSION['user'])) {
            // Redirect paksa ke halaman login
            header("Location: /si-akademik/public/login");
            exit(); 
        }
    }
}