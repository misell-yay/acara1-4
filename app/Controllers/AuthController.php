<?php
class AuthController {
    
    public function loginForm() {
        if (isset($_SESSION['user'])) {
            header("Location: /si-akademik/public/mahasiswa");
            exit();
        }
        $contentView = __DIR__ . '/../Views/auth/login.php';
        require_once __DIR__ . '/../Views/layouts/main.php';
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === 'admin' && $password === '12345') {
            // 1. Set sesi penanda user
            $_SESSION['user'] = $username;
            
            // 2. TUGAS MANDIRI: Buat flash message
            $_SESSION['flash_message'] = "Selamat datang, Admin!"; 
            
            header("Location: /si-akademik/public/mahasiswa");
            exit();
        } else {
            echo "<script>
                    alert('Username atau Password salah!');
                    window.location.href='/si-akademik/public/login';
                  </script>";
        }
    }

    public function logout() {
        // Hapus semua data sesi lama
        session_unset();
        session_destroy();
        
        // PENTING: Mulai sesi baru HANYA untuk menyimpan flash message
        session_start(); 
        $_SESSION['flash_message'] = "Anda telah logout.";
        
        header("Location: /si-akademik/public/login");
        exit();
    }
}