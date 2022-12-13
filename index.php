<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://img.icons8.com/color/48/000000/source-code.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/3378f9e169.js"></script>
    <style>
        body {
            background: #292E40;
        }

        .font-login {
            color: #2A4365;
        }

        .form-control {
            background: #EDF2F7;
            border-radius: 5px;
            border: none;
            height: 45px;
        }

        .btn-purple {
            background: #7E6AF9;
            color: white;
            transition-duration: 0.1s;
            margin-top: 20px;
            width: 120px;
            overflow: hidden;
        }

        .btn-purple:hover {
            background: #473D84;
        }
    </style>
</head>
<body>
    <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'gagal') {
                echo '<script>alert("Login gagal. Cek kembali username/password")</script>';
            }
            
            else if ($_GET['pesan'] == 'logout') {
                echo '<script>alert("Berhasil logout")</script>';
            }
            
            else if ($_GET['pesan'] == 'belum_login') {
                echo '<script>alert("Silahkan login terlebih dahulu.")</script>';
            }
        }
    ?>
    <div class="container mt-5">
        <h1 class="text-center font-weight-bold"><span style="color: #7E6AF9">SMA</span> <span class="text-white">Suzuran</span></h1>
        
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 mt-4">  
                <form action="cek_login.php" method="POST" enctype="multipart/form-data">
                    <div class="card px-5 py-5">
                        <div class="form-group">
                            <i style="position: relative; margin-right: 5px;" class="fa fa-envelope" aria-hidden="true"></i>
                            <label class="font-login">Username</label>
                            <input class="form-control" type="text" name="username" required>
                        </div>

                        <div class="form-group">
                            <i style="position: relative; margin-right: 12px" class="fa fa-lock" aria-hidden="true"></i>
                            <label class="font-weight-normal font-login">Password</label>
                            <input class="form-control" type="password" name="password" required>
                        </div>

                        <button class="btn btn-purple submit" type="submit" value="login" name="login">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>