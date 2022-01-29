<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        .login-container{
            width:350px;
            margin:300px auto auto auto;
            padding:30px;
            background:transparent;
        }
        .title{
            text-align:center;
        }
        .input-label{
            width:400px;
            display:block;
            color:white;
        }
        .input{
            padding 5px 0px;
        }
        input{
            width:100%;
        }
        button{
            width:100px;
            padding:10px;
            cursor:pointer;
            transition-duration: 0.4s;
            background: black;
            border: solid 2px white;
            color:white;
            
        }
        button:hover{
            background-color: green;
            color:white;
        }
        h1{
            font-family: 'Fruktur', cursive;
            color:white;
        }
        #background-video {
    width: 100vw;
    height: 100vh;
    object-fit: cover;
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    z-index: -1;
    }
    </style>
</head>
<body>
<video id="background-video" autoplay loop muted>
  <source src="m.mp4" type="video/mp4">
</video>
    <div class="login-container">
    <div class="title">
        <h1>LOGIN USER</h1>
    </div>
        <form action="" method="post">
            <div class="input">
                <label for="username" class="input-label">Nama Pengguna</label>
                    <input type="text" id="username" name="username" placeholder="Nama Pengguna" >
            </div>
            <br>
            <div class="input">
                <label for="password" class="input-label">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Sandi">
            </div>
            <div class="input"><br>
                <center><button type="submit" class="button" name="login" >LOGIN</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
include('koneksi.php');

    // $user ="joko";
    // $katasandi="1234";
    
    


    if (isset($_POST['login'])) {
        $username= $_POST['username'];
        $password=$_POST['password'];

        $query= mysqli_query($koneksi,"SELECT * from petugas where username= '$username'");
        foreach ($query as $row){
            $nama = $row['nama'];
            $jabatan = $row['jabatan'];
            $hash = $row['password'];
        }
        
        
        // if(($user == $_POST['username'])&& ($katasandi == $_POST['password'])){
        if(mysqli_num_rows($query)>0){
            /////////////////
            if (password_verify($password, $hash)) {
                session_start();
                $_SESSION['status']= "login";
                $_SESSION['nama']= $nama;
                $_SESSION['jabatan']= $jabatan;
                ?>
                <script>
                alert('Anda berhasil login!!!')
                window.location.href='http://localhost/16_mywebsite_12RPL2/admin.php';
                </script>
                <?php
            } else {
                echo 'Invalid password.';
            }

            //////////////////
           
        }else{
            ?>
            <script>
                alert("username/password salah")
            </script>
            <?php
            
        } 
    }
?>
 
        