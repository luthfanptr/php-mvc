<?php

// kelas yg bertugas mengelola flash message dan menampilkannya
class Flasher
{

    // method $tipe untuk kelas bootstrap
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    // method utk menampilkan pesan
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                    Data Mahasiswa <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['flash']); // hanya berlaku sekali menggunakan function unset (hanya tampil sekali lalu hapus, jd klo refresh/pindah halaman sessionnya cuma muncul sekali)
        }
    }
}
