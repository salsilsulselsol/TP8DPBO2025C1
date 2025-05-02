<?php
if (isset($_GET['file'])) {
    switch ($_GET['file']) {
        case 'student':
            include('student.php');
            break;
        case 'class':
            include('class.php');
            break;
        case 'enrollment':
            include('enrollment.php');
            break;
        default:
            echo "<h3>Modul tidak ditemukan.</h3>";
            break;
    }
} else {
    echo "<h3>Selamat datang di Manajemen Perkuliahan</h3>";
    echo "<a href='index.php?file=student'>Mahasiswa</a> | ";
    echo "<a href='index.php?file=class'>Kelas</a> | ";
    echo "<a href='index.php?file=enrollment'>Enrollment</a>";
}