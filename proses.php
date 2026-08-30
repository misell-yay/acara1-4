<?php 
$keyword = $_GET['keyword'] ?? '';  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI AKADEMIK</title>
    <style>
        h1 {
            color: blueviolet;
        }
        h2 {
            color: #2b0d0d;
        }
    </style>
</head>
<body>
    <h1 align="center">Selamat datang di SI Akademik</h1>

    <h2 align="center"><?php echo "Mahasiswa yang kamu cari: " .htmlspecialchars($keyword) ?></h2>
</body>
</html> 