<?php
class Controller {
    protected function view($viewName, $data = []) {
        extract($data);
        $contentView = __DIR__ . '/../Views/' . $viewName . '.php';
        if (file_exists($contentView)) {
            require_once __DIR__ . '/../Views/layouts/main.php';
        } else {
            die("View $viewName tidak ditemukan!");
        }
    }

    protected function redirect($url) {
        header("Location: /si-akademik/public" . $url);
        exit();
    }
}