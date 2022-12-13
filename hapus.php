<?php
    include("config.php");

    if (isset($_GET['id_siswa'])) {
        $id_siswa = $_GET['id_siswa'];
        
        $sql = "SELECT fotodiri FROM siswa WHERE id_siswa=$id_siswa";
        $query = mysqli_query($db, $sql);
        $data = mysqli_fetch_array($query);

        if (is_file("uploads/siswa/" . $data['fotodiri'])) {
            unlink("uploads/siswa/" . $data['fotodiri']);
        }

        $sql = "DELETE FROM siswa WHERE id_siswa=$id_siswa";
        $query = mysqli_query($db, $sql);
        
        if ($query) {
            header('Location: list-siswa.php');
        }

        else {
            die("Gagal menghapus.");
        }
    }

    else if (isset($_GET['id_guru'])) {
        $id_guru = $_GET['id_guru'];
        
        $sql = "SELECT fotodiri FROM guru WHERE id_guru=$id_guru";
        $query = mysqli_query($db, $sql);
        $data = mysqli_fetch_array($query);

        if (is_file("uploads/guru/" . $data['fotodiri'])) {
            unlink("uploads/guru/" . $data['fotodiri']);
        }

        $sql = "DELETE FROM guru WHERE id_guru=$id_guru";
        $query = mysqli_query($db, $sql);
        
        if ($query) {
            header('Location: list-guru.php');
        }

        else {
            die("Gagal menghapus.");
        }
    }
    else if (isset($_GET['id_peminjaman'])) {
        $id_peminjaman = $_GET['id_peminjaman'];

        $sql = "DELETE FROM peminjaman WHERE id_peminjaman=$id_peminjaman";
        $query = mysqli_query($db, $sql);
        
        if ($query) {
            header('Location: list-peminjaman.php');
        }

        else {
            die("Gagal menghapus.");
        }
    }

    else {
        die("Akses dilarang!");
    }
?>