<?php
include_once("views/Template.class.php");

class ClassView {
    public function render($data) {
        $no = 1;
        $table = '';

        if (isset($_GET['status']) && $_GET['status'] === 'added') {
            $table .= "<div class='alert alert-success'>Kelas berhasil ditambahkan!</div>";
        } elseif (isset($_GET['status']) && $_GET['status'] === 'updated') {
            $table .= "<div class='alert alert-success'>Kelas berhasil diperbarui!</div>";
        }

        $table .= "<div class='text-start mb-3'>
            <a href='class.php?add=true' class='btn btn-success'>Tambah Kelas</a>
        </div>";

        $table .= "<table class='table table-striped'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Pembimbing</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>";

        foreach ($data as $row) {
            $table .= "<tr>
                <td>" . $no++ . "</td>
                <td>{$row['class_name']}</td>
                <td>{$row['advisor']}</td>
                <td>
                    <a href='class.php?id_edit={$row['id']}' class='btn btn-warning'>Edit</a>
                    <a href='class.php?id_hapus={$row['id']}' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus kelas {$row['class_name']}?')\">Hapus</a>
                </td>
            </tr>";
        }

        $table .= "</tbody></table>";

        $tpl = new Template("templates/index.html");
        $tpl->replace("JUDUL", "Daftar Kelas");
        $tpl->replace("DATA_TABEL", $table);
        $tpl->replace("ACTIVE_STUDENT", "");
        $tpl->replace("ACTIVE_CLASS", "active");
        $tpl->replace("ACTIVE_ENROLL", "");
        $tpl->write();
    }

    public function renderAddForm() {
        $form = "<form action='class.php' method='POST' onsubmit='return confirm(\"Yakin ingin menambahkan kelas ini?\");'>
            <div class='mb-3'>
                <label class='form-label'>Nama Kelas</label>
                <input type='text' name='class_name' class='form-control' required>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Nama Pembimbing</label>
                <input type='text' name='advisor' class='form-control' required>
            </div>
            <button type='submit' name='submit' class='btn btn-primary'>Tambah</button>
            <a href='class.php' class='btn btn-secondary ms-2'>Batal</a>
        </form>";

        $tpl = new Template("templates/form.html");
        $tpl->replace("JUDUL", "Tambah Kelas");
        $tpl->replace("DATA_TABEL", $form);
        $tpl->write();
    }

    public function renderEditForm($data) {
        list($id, $class_name, $advisor) = $data;
        $form = "<form action='class.php' method='POST' onsubmit='return validateForm();'>
            <input type='hidden' name='id' value='$id'>
            <div class='mb-3'>
                <label class='form-label'>Nama Kelas</label>
                <input type='text' name='class_name' class='form-control' value='$class_name' required>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Nama Pembimbing</label>
                <input type='text' name='advisor' class='form-control' value='$advisor' required>
            </div>
            <button type='submit' name='submit_edit' class='btn btn-primary'>Simpan</button>
            <a href='class.php' class='btn btn-secondary ms-2'>Batal</a>
        </form>
        <script>
            function validateForm() {
                return confirm('Yakin ingin menyimpan perubahan?');
            }
        </script>";
    
        $tpl = new Template("templates/form.html");
        $tpl->replace("JUDUL", "Edit Kelas");
        $tpl->replace("DATA_TABEL", $form);
        $tpl->write();
    }    
}