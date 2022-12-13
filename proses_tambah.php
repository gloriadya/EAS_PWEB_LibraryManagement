<?php
    include("config.php");

    if (isset($_POST['tambah_siswa'])) {
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $gender = $_POST['jenis_kelamin'];
        $nomor_induk = $_POST['nomor_induk'];
        $alamat = $_POST['alamat'];
        $nomor_hp = $_POST['nomor_hp'];
        $agama = $_POST['agama'];
        $foto = $_FILES['fotodiri']['name'];
        $tmp = $_FILES['fotodiri']['tmp_name'];

        $fotobaru = date('dmYHis') . $foto;
        $path = "uploads/siswa/" . $fotobaru;

        if (move_uploaded_file($tmp, $path)) {
            $sql = "INSERT INTO siswa (nama, kelas, jenis_kelamin, nomor_induk, alamat, nomor_hp, agama, fotodiri) VALUE ('$nama', '$kelas', '$gender', '$nomor_induk', '$alamat', '$nomor_hp', '$agama', '$fotobaru')";
            $query = mysqli_query($db, $sql);

            if ($query) {
                ?> <script> 
                    alert("Data telah disimpan.");
                    window.location.href='./list-siswa.php?status=sukses';
                    </script> <?php
            }

            else {
                ?> <script>
                    alert("Data gagal disimpan.");
                    window.location.href='./list-siswa.php?status=gagal';
                    </script> <?php
            }
        }

        else {
            ?> <script>
                    alert("Foto gagal disimpan.");
                    window.location.href='./list-siswa.php';
                </script> <?php
        }
    }

    else if (isset($_POST['tambah_guru'])) {
        $nama = $_POST['nama'];
        $mata_pelajaran = $_POST['mata_pelajaran'];
        $gender = $_POST['jenis_kelamin'];
        $nip = $_POST['nip'];
        $alamat = $_POST['alamat'];
        $nomor_hp = $_POST['nomor_hp'];
        $foto = $_FILES['fotodiri']['name'];
        $tmp = $_FILES['fotodiri']['tmp_name'];

        $fotobaru = date('dmYHis') . $foto;
        $path = "uploads/guru/" . $fotobaru;

        if (move_uploaded_file($tmp, $path)) {
            $sql = "INSERT INTO guru (nama, mata_pelajaran, jenis_kelamin, nip, alamat, nomor_hp, fotodiri) VALUE ('$nama', '$mata_pelajaran', '$gender', '$nip', '$alamat', '$nomor_hp', '$fotobaru')";
            $query = mysqli_query($db, $sql);

            if ($query) {
                ?> <script> 
                    alert("Data telah disimpan.");
                    window.location.href='./list-guru.php?status=sukses';
                    </script> <?php
            }

            else {
                ?> <script>
                    alert("Data gagal disimpan.");
                    window.location.href='./list-guru.php?status=gagal';
                    </script> <?php
            }
        }

        else {
            ?> <script>
                    alert("Foto gagal disimpan.");
                    window.location.href='./list-guru.php';
                </script> <?php
        }
    }

    else {
        die("Akses dilarang!");
    }
?>