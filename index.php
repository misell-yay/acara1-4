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
        form {
            color: #2b0d0d;
            font-family: Impact;
        }
    </style>
</head>
<body>
    <h1 align="center">Selamat datang di SI Akademik</h1>
    </br>
     <div class="Form" align="center">
        <!-- form-get.html -->
        <form action="proses.php" method="GET"> 
            <label>Cari Mahasiswa:</label> 
            <input type="text" name="keyword"> 
            <button type="submit">Cari</button> 
        </form>
    </br>

    <h2 ali>Login</h2>
        <!-- form-post.html --> 
        <form action="login.php" method="POST"> 
            <label>Username:</label> 
            <input type="text" name="username"> 
            <br>
            <label>Password:</label> 
            <input type="password" name="password">
            <br>
            <button type="submit">Login</button> 
        </form>  
     </div>
</body>
</html>