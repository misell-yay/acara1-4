<?php
// public/index.php

// 1. Mulai session untuk flash message
session_start();

// 2. Load file konfigurasi rute, database, dan dependencies
$routes = require_once __DIR__ . '/../routes/web.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Repositories/MahasiswaRepository.php';
require_once __DIR__ . '/../app/Repositories/ProdiRepository.php';
require_once __DIR__ . '/../app/Controllers/MahasiswaController.php';
require_once __DIR__ . '/../app/Controllers/ProdiController.php';
require_once __DIR__ . '/../app/Controllers/MatakuliahController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Core/Middleware/AuthMiddleware.php';

// 3. Ambil URL dan Method yang sedang diakses
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = '/si-akademik/public';
$path = str_replace($basePath, '', $requestUri);
$method = $_SERVER['REQUEST_METHOD'];

// Normalisasi path kosong
if ($path === '' || $path === false) {
    $path = '/';
}

// 4. Cari rute yang cocok
$handler = null;
if (isset($routes[$method])) {
    foreach ($routes[$method] as $routePattern => $routeInfo) {
        $pattern = "@^" . preg_replace('/\([0-9]+\)/', '([0-9]+)', $routePattern) . "$@D";
        if (preg_match($pattern, $path, $matches)) {
            array_shift($matches); // Hapus elemen pertama (full match)
            $handler = $routeInfo;
            break;
        }
    }
}

// 5. Jalankan Middleware Auth jika terdaftar di rute
if ($handler && isset($handler[2])) {
    $middlewareClass = $handler[2];
    if (class_exists($middlewareClass)) {
        $middleware = new $middlewareClass();
        if (method_exists($middleware, 'handle')) {
            $middleware->handle();
        }
    }
}

// 6. Eksekusi Controller dengan Dependency Injection
if ($handler) {
    $controllerName = $handler[0];
    $actionName = $handler[1];
    $dbConnection = Database::getInstance()->getConnection();
    $controller = null;
    if ($controllerName === 'MahasiswaController') {
        $mahasiswaRepo = new MahasiswaRepository($dbConnection);
        $controller = new MahasiswaController($mahasiswaRepo);
    } elseif ($controllerName === 'ProdiController') {
        $prodiRepo = new ProdiRepository($dbConnection);
        $controller = new ProdiController($prodiRepo);
    } else {
        if (class_exists($controllerName)) {
            $controller = new $controllerName();
        }
    }

    if ($controller && method_exists($controller, $actionName)) {
        // Panggil method dengan membawa parameter ID (jika ada dari regex route)
        call_user_func_array([$controller, $actionName], $matches ?? []);
    } else {
        http_response_code(500);
        echo "Method $actionName tidak ditemukan pada Controller $controllerName.";
    }
} else {
    http_response_code(404);
    echo "<h1>404 Not Found</h1><p>URL: <b>$path</b> tidak terdaftar.</p>";
}