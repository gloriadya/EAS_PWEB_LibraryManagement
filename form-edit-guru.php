<?php
    session_start();
    
    error_reporting(0);
    
    include("config.php");
    
    if ($_SESSION["status_login"] != "true") {
        header("Location: index.php?pesan=belum_login");
    }

    if (!isset($_GET['id_guru'])) {
        header('Location: list-guru.php');
    }

    $id = $_GET['id_guru'];

    $sql = "SELECT * FROM guru WHERE id_guru=$id";
    $query = mysqli_query($db, $sql);
    $guru = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) < 1) {
        die("Data tidak ditemukan.");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Edit Data Guru</title>
    <link rel="icon" type="image/png" href="https://img.icons8.com/color/48/000000/source-code.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/3378f9e169.js"></script>
    <style>
        .submit {
            width: 80px;
            margin: 10px 0;
            font-size: 17px;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #FAFAFA;
        }

        p {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar {
            padding: 15px 10px;
            background: #FFF;
            border: none;
            border-radius: 0;
            margin-bottom: 40px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }

        .line {
            width: 100%;
            height: 1px;
            border-bottom: 1px solid #DDD;
            margin: 20px 0;
        }

        /* ---------------------------------------------------
            SIDEBAR STYLE
        ----------------------------------------------------- */

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
            position: relative;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #292E40;
            color: #FFF;
            transition: all 0.3s;
            position: fixed;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 25px;
            background: #3B4152;
            margin-bottom: 10px;
        }

        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748B;
        }

        #sidebar ul p {
            color: #FFF;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #7386D5;
            background: #FFF;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #FFF;
            background: #3B4152;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #6D7FCC;
        }

        ul.CTAs {
            padding: 175px 0px;
            text-align: center;
        }

        ul.CTAs a {
            text-align: center;
            font-size: 0.9em !important;
            display: block;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        a.download {
            background: #FFF;
            color: #7386D5;
        }

        a.article,
        a.article:hover {
            background: #6D7FCC !important;
            color: #FFF !important;
        }

        /* ---------------------------------------------------
            CONTENT STYLE
        ----------------------------------------------------- */

        #content {
            width: 100%;
            padding-left: 250px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        textarea {
            resize: none;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>SMA Suzuran</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'dashboard.php'){echo 'active'; }else { echo ''; } ?>">
                    <a href="dashboard.php">Beranda</a>
                </li>
                
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'list-siswa.php'){echo 'active'; }else { echo ''; } ?>">
                    <a href="list-siswa.php">Data Siswa</a>
                </li>
                
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'list-guru.php'){echo 'active'; }else { echo ''; } ?>">
                    <a href="list-guru.php">Data Guru</a>
                </li>
                
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'list-orangtua.php'){echo 'active'; }else { echo ''; } ?>">
                    <a href="list-orangtua.php">Data Orang Tua Murid</a>
                </li>

                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'list-pembayaran.php'){echo 'active'; }else { echo ''; } ?>">
                    <a href="#">Pembayaran SPP</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <h6>© 2021 SMA Suzuran</h6>
            </ul>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="btn btn-danger text-white" href="logout.php">Sign Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div style="margin: 0 30px">
                <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" name="id" value="<?php echo $guru['id_guru'] ?>">

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input class="form-control" type="text" name="nama" value="<?php echo $guru['nama'] ?>" placeholder="Masukkan nama lengkap" required>
                            </div>

                            <div class="form-group">
                                <?php $mata_pelajaran = $guru['mata_pelajaran']; ?>
                                <label class="font-weight-bold">Mata Pelajaran</label>
                                <select name="mata_pelajaran" id="mata_pelajaran" class="form-control">
                                    <option selected disabled>Pilih Mata Pelajaran</option>
                                    <option <?php echo ($mata_pelajaran == 'Biologi') ? "selected": "" ?>>Biologi</option>
                                    <option <?php echo ($mata_pelajaran == 'Fisika') ? "selected": "" ?>>Fisika</option>
                                    <option <?php echo ($mata_pelajaran == 'Matematika') ? "selected": "" ?>>Matematika</option>
                                    <option <?php echo ($mata_pelajaran == 'Kimia') ? "selected": "" ?>>Kimia</option>
                                    <option <?php echo ($mata_pelajaran == 'Sejarah') ? "selected": "" ?>>Sejarah</option>
                                    <option <?php echo ($mata_pelajaran == 'Sosiologi') ? "selected": "" ?>>Sosiologi</option>
                                    <option <?php echo ($mata_pelajaran == 'Ekonomi') ? "selected": "" ?>>Ekonomi</option>
                                    <option <?php echo ($mata_pelajaran == 'Bahasa Inggris') ? "selected": "" ?>>Bahasa Inggris</option>
                                    <option <?php echo ($mata_pelajaran == 'Bahasa Indonesia') ? "selected": "" ?>>Bahasa Indonesia</option>
                                    <option <?php echo ($mata_pelajaran == 'Agama') ? "selected": "" ?>>Agama</option>
                                    <option <?php echo ($mata_pelajaran == 'Bahasa Daerah') ? "selected": "" ?>>Bahasa Daerah</option>
                                    <option <?php echo ($mata_pelajaran == 'Pendidikan Jasmani, Olahraga, dan Kesehatan') ? "selected": "" ?>>Pendidikan Jasmani, Olahraga, dan Kesehatan</option>
                                    <option <?php echo ($mata_pelajaran == 'Seni Budaya') ? "selected": "" ?>>Seni Budaya</option>
                                    <option <?php echo ($mata_pelajaran == 'Prakarya dan Kewirausahaan') ? "selected": "" ?>>Prakarya dan Kewirausahaan</option>
                                    <option <?php echo ($mata_pelajaran == 'Pendidikan Kewarganegaraan') ? "selected": "" ?>>Pendidikan Kewarganegaraan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <?php $gender = $guru['jenis_kelamin']; ?>
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" <?php echo ($gender == 'Laki-laki') ? "checked": "" ?>>
                                    <label class="form-check-label" for="jenis_kelamin">
                                        Laki-laki
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" <?php echo ($gender == 'Perempuan') ? "checked": "" ?>>
                                    <label class="form-check-label" for="jenis_kelamin">
                                        Perempuan
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NIP</label>
                                <input class="form-control" type="text" name="nip" value="<?php echo $guru['nip'] ?>" placeholder="Masukkan NIP" required>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat" required><?php echo $guru['alamat'] ?></textarea>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nomor HP</label>
                                <input class="form-control" type="text" name="nomor_hp" value="<?php echo $guru['nomor_hp'] ?>" placeholder="Masukkan nomor HP" required>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Unggah Foto Diri</label>
                                <input type="file" class="form-control-file" id="fotodiri" name="fotodiri">
                            </div>

                            <div class="line"></div>

                            <button style="float: right;" class="btn btn-success submit" type="submit" name="edit_guru" value="edit_guru">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>