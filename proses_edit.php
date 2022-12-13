<?php
    include("config.php");

    if (isset($_POST['edit_siswa'])) {
        $id = $_POST['id'];
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
        
        if (empty($foto)) {
            $sql = "UPDATE siswa SET nama='$nama', kelas='$kelas', jenis_kelamin='$gender', nomor_induk='$nomor_induk', alamat='$alamat', nomor_hp='$nomor_hp', agama='$agama' WHERE id_siswa=$id";
            $query = mysqli_query($db, $sql);

            if ($query) {
                ?> <script> 
                    alert("Data telah disimpan.");
                    window.location.href='./list-siswa.php';
                    </script> <?php
            }

            else {
                die("Gagal menyimpan.");
            }
        }

        else {
            if (move_uploaded_file($tmp, $path)) {
                $sql = "SELECT fotodiri FROM siswa WHERE id_siswa=$id";
                $query = mysqli_query($db, $sql);
                $data = mysqli_fetch_array($query);
    
                if (is_file("uploads/siswa/" . $data['fotodiri'])) {
                    unlink("uploads/siswa/" . $data['fotodiri']);
                }
    
                $sql = "UPDATE siswa SET nama='$nama', kelas='$kelas', jenis_kelamin='$gender', nomor_induk='$nomor_induk', alamat='$alamat', nomor_hp='$nomor_hp', agama='$agama', fotodiri='$fotobaru' WHERE id_siswa=$id";
                $query = mysqli_query($db, $sql);
    
                if ($query) {
                    ?> <script> 
                        alert("Data telah disimpan.");
                        window.location.href='./list-siswa.php';
                        </script> <?php
                }
    
                else {
                    die("Gagal menyimpan.");
                }
            }
    
            else {
                ?> <script>
                        alert("Foto gagal disimpan.");
                        window.location.href='./list-siswa.php';
                    </script> <?php
            }
        }
    }

    else if (isset($_POST['edit_guru'])) {
        $id = $_POST['id'];
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

        if (empty($foto)) {
            $sql = "UPDATE guru SET nama='$nama', mata_pelajaran='$mata_pelajaran', jenis_kelamin='$gender', nip='$nip', alamat='$alamat', nomor_hp='$nomor_hp' WHERE id_guru=$id";
            $query = mysqli_query($db, $sql);

            if ($query) {
                ?> <script> 
                    alert("Data telah disimpan.");
                    window.location.href='./list-guru.php';
                    </script> <?php
            }

            else {
                die("Gagal menyimpan.");
            }
        }

        else {
            if (move_uploaded_file($tmp, $path)) {
                $sql = "SELECT fotodiri FROM guru WHERE id_guru=$id";
                $query = mysqli_query($db, $sql);
                $data = mysqli_fetch_array($query);
    
                if (is_file("uploads/guru/" . $data['fotodiri'])) {
                    unlink("uploads/guru/" . $data['fotodiri']);
                }
                
                $sql = "UPDATE guru SET nama='$nama', mata_pelajaran='$mata_pelajaran', jenis_kelamin='$gender', nip='$nip', alamat='$alamat', nomor_hp='$nomor_hp', fotodiri='$fotobaru' WHERE id_guru=$id";
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
    }

    else if (isset($_POST['edit_peminjaman'])) {
        $id = $_POST['id'];
        $kategori = $_POST['kategori'];
        $nama_buku = $_POST['nama_buku'];
        $nama_peminjam = $_POST['nama_peminjam'];
        $tanggal_pinjam = $_POST['tanggal_pinjam'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $nama_admin = $_POST['nama_admin'];
        $sql = "UPDATE peminjaman SET kategori='$kategori', nama_buku='$nama_buku', nama_peminjam='$nama_peminjam', tanggal_pinjam='$tanggal_pinjam', tanggal_kembali='$tanggal_kembali', nama_admin='$nama_admin' WHERE id_peminjaman=$id";
        $query = mysqli_query($db, $sql);
    }

    else {
        die("Akses dilarang!");
    }
?>