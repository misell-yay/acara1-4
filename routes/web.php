<?php
return [ 
    'GET' => [ 
        '/'                     => ['HomeController', 'index'], 
        
        // Rute Dashboard
        '/dashboard'            => ['HomeController', 'dashboard', 'AuthMiddleware'], 
        
        // Rute Mahasiswa
        '/mahasiswa'            => ['MahasiswaController', 'index', 'AuthMiddleware'], 
        '/mahasiswa/create'     => ['MahasiswaController', 'create', 'AuthMiddleware'], 
        '/mahasiswa/([0-9]+)'   => ['MahasiswaController', 'show', 'AuthMiddleware'], 
        
        // Rute Prodi
        '/prodi'                => ['ProdiController', 'index', 'AuthMiddleware'], 
        '/prodi/create'         => ['ProdiController', 'create', 'AuthMiddleware'],

        '/matakuliah'                => ['MatakuliahController', 'index', 'AuthMiddleware'],
        '/matakuliah/create'         => ['MatakuliahController', 'create', 'AuthMiddleware'],
        
        // Rute Auth (Publik)
        '/login'                => ['AuthController', 'loginForm'], 
        '/logout'               => ['AuthController', 'logout'],
    ], 
    
    'POST' => [ 
        // Rute Proses Mahasiswa
        '/mahasiswa'                 => ['MahasiswaController', 'store', 'AuthMiddleware'],
        '/mahasiswa/([0-9]+)/delete' => ['MahasiswaController', 'delete', 'AuthMiddleware'],
        
        // Rute Proses Prodi
        '/prodi'                     => ['ProdiController', 'store', 'AuthMiddleware'],
        '/prodi/([0-9]+)/delete'     => ['ProdiController', 'delete', 'AuthMiddleware'],

        '/matakuliah'                    => ['MatakuliahController', 'store', 'AuthMiddleware'],
        '/matakuliah/([0-9]+)/delete'    => ['MatakuliahController', 'delete', 'AuthMiddleware'],
        
        // Rute Proses Auth
        '/login'                     => ['AuthController', 'login'], 
    ], 
];