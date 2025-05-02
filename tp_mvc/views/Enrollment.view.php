<?php
include_once("views/Template.class.php");

class EnrollmentView {
    public function render($data) {
        $currentClass = '';
        $table = '';

        if (isset($_GET['status']) && $_GET['status'] === 'added') {
            $table .= "<div class='alert alert-success'>Mahasiswa berhasil enroll ke kelas.</div>";
        } elseif (isset($_GET['status']) && $_GET['status'] === 'deleted') {
            $table .= "<div class='alert alert-success'>Berhasil unenroll data.</div>";
        }
        
        $table .= "<a href='enrollment.php?add=true' class='btn btn-success'>Tambah Enroll</a>";

        foreach ($data as $row) {
            if ($currentClass !== $row['class_name']) {
                if ($currentClass !== '') $table .= "</tbody></table><br>";
                $currentClass = $row['class_name'];
                $table .= "<h5>Kelas: {$currentClass}</h5>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>";
            }
            $table .= "<tr>
                <td>{$row['student_name']}</td>
                <td>{$row['nim']}</td>
                <td><a href='enrollment.php?id_hapus={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin Unenroll?')\">Unenroll</a></td>
            </tr>";
        }

        if ($currentClass !== '') {
            $table .= "</tbody></table>";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("JUDUL", "Enrollment");
        $tpl->replace("DATA_TABEL", $table);
        $tpl->replace("ACTIVE_STUDENT", "");
        $tpl->replace("ACTIVE_CLASS", "");
        $tpl->replace("ACTIVE_ENROLL", "active");
        $tpl->write();
    }

    public function renderAddForm($students, $classes) {
        $form = "<form action='enrollment.php' method='POST'>
            <div class='mb-3'>
                <label class='form-label'>Mahasiswa</label>
                <select name='student_id' class='form-select' required>
                    <option value='' disabled selected>Pilih Mahasiswa</option>";
        foreach ($students as $s) {
            $form .= "<option value='{$s[0]}'>{$s[2]} ({$s[1]})</option>";
        }
        $form .= "</select>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Kelas</label>
                <select name='class_id' class='form-select' required>
                    <option value='' disabled selected>Pilih Kelas</option>";
        foreach ($classes as $c) {
            $form .= "<option value='{$c['id']}'>{$c['class_name']}</option>";
        }
        $form .= "</select>
            </div>
            <button type='submit' name='submit' class='btn btn-primary'>Tambah</button>
            <a href='enrollment.php' class='btn btn-secondary ms-2'>Batal</a>
        </form>";
    
        $tpl = new Template("templates/form.html");
        $tpl->replace("JUDUL", "Tambah Enroll Mahasiswa");
        $tpl->replace("DATA_TABEL", $form);
        $tpl->write();
    }
}