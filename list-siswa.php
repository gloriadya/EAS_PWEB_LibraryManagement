<?php
    session_start();
    
    error_reporting(0);
    
    include("config.php");
    
    if ($_SESSION["status_login"] != "true") {
        header("Location: index.php?pesan=belum_login");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Data Siswa</title>
    <link rel="icon" type="image/png" href="https://img.icons8.com/color/48/000000/source-code.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/3378f9e169.js"></script>
    <style>    
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
<body class="nav-md">
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
                    <a href="list-peminjaman.php">Data Peminjaman</a>
                </li>

                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'list-pembayaran.php'){echo 'active'; }else { echo ''; } ?>">
                    <a href="list-pembayaran.php">Pembayaran SPP</a>
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
                <button class="btn btn-success" style="float: right" data-toggle="modal" data-target="#myModal">Tambah Data</button>
                <h2 style="color: #0092FF">Daftar Siswa</h2>
                <p>SMA Negeri Suzuran</p>

                <div class="line"></div>

                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Nomor Induk</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $batas = 5;
        				    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
		        		    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                            
                            $previous = $halaman - 1;
				            $next = $halaman + 1;

                            $sql = "SELECT * FROM siswa";
                            $query = mysqli_query($db, $sql);
                            $jumlah_data = mysqli_num_rows($query);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $sql2 = "SELECT * FROM siswa LIMIT $halaman_awal, $batas";
                            $query2 = mysqli_query($db, $sql2);

                            $nomor = $halaman_awal + 1;

                            while ($siswa = mysqli_fetch_array($query2)) {
                                echo "<tr>";

                                echo "<td>".$nomor++."</td>";
                                echo "<td>".($siswa['fotodiri'] == null ? "" : "<img src='uploads/siswa/" . $siswa['fotodiri'] . "' width='120' height='160'>")."</td>";
                                echo "<td>".$siswa['nama']."</td>";
                                echo "<td>".$siswa['kelas']."</td>";
                                echo "<td>".$siswa['jenis_kelamin']."</td>";
                                echo "<td>".$siswa['nomor_induk']."</td>";

                                echo "<td>";
                                echo "<button class='btn btn-warning' style='margin-bottom: 5px' onclick=window.location.href='form-edit-siswa.php?id_siswa=".$siswa['id_siswa']."'>Edit</button>";
                                echo "<br />";
                                echo "<button class='btn btn-danger' onclick=window.location.href='hapus.php?id_siswa=".$siswa['id_siswa']."'>Hapus</button>";
                                echo "</td>";

                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>

                <h5 style="margin-top: 20px">Total: <?php echo mysqli_num_rows($query) ?></h5>

                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?> tabindex="-1">Previous</a>
                        </li>
                        
                        <?php 
                            for ($i = 1; $i <= $total_halaman; $i++){
                                ?> 
                                <li <?php if ($_GET['halaman'] == $i) echo "class='page-item active'"?> ><a class="page-link" href="?halaman=<?php echo $i ?>"><?php echo $i; ?></a></li>
                                <?php
                            }
                        ?>
                        
                        <li class="page-item">
                            <a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title font-weight-bold">Form Input Data Siswa</h4>
                            
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                <div class="modal-body">
                    <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama</label>
                                    <input class="form-control" type="text" name="nama" placeholder="Masukkan nama lengkap" required>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-control">
                                        <option selected disabled>Pilih Kelas</option>
                                        <option>X</option>
                                        <option>XI</option>
                                        <option>XII</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" checked>
                                        <label class="form-check-label" for="jenis_kelamin">
                                            Laki-laki
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">
                                        <label class="form-check-label" for="jenis_kelamin">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Nomor Induk</label>
                                    <input class="form-control" type="text" name="nomor_induk" placeholder="Masukkan nomor induk" required>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Nomor HP</label>
                                    <input class="form-control" type="text" name="nomor_hp" placeholder="Masukkan nomor HP" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="font-weight-bold">Agama</label>
                                    <select class="form-control" name="agama" id="agama">
                                        <option disabled selected>Pilih agama</option>
                                        <option>Islam</option>
                                        <option>Kristen Katolik</option>
                                        <option>Kristen Protestan</option>
                                        <option>Hindu</option>
                                        <option>Buddha</option>
                                        <option>Kong Hu Cu</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Unggah Foto Diri</label>
                                    <input type="file" class="form-control-file" id="fotodiri" name="fotodiri">
                                </div>

                                <div class="line"></div>

                                <button style="float: right;" class="btn btn-success submit" type="submit" name="tambah_siswa" value="tambah_siswa">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>