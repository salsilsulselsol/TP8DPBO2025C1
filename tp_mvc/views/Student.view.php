<?php
include_once("views/Template.class.php");

class StudentView {
    public function render($data) {
        $no = 1;
        $dataStudent = '';

        if (isset($_GET['status']) && $_GET['status'] === 'updated') {
            $dataStudent .= "<div class='alert alert-success'>Data berhasil diperbarui!</div>";
        } elseif (isset($_GET['status']) && $_GET['status'] === 'added') {
            $dataStudent .= "<div class='alert alert-success'>Mahasiswa berhasil ditambahkan!</div>";
        }

        $dataStudent .= "<div class='text-start mb-3'>
            <a href='student.php?add=true' class='btn btn-success'>Tambah Mahasiswa</a>
        </div>";

        $dataStudent .= "<table class='table'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>No. HP</th>
                    <th>Tanggal Gabung</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>";

        foreach ($data as $val) {
            list($id, $nim, $name, $phone, $join_date) = $val;
            $dataStudent .= "<tr>
                <td>$no</td>
                <td>$name</td>
                <td>$nim</td>
                <td>$phone</td>
                <td>$join_date</td>
                <td>
                    <a href='student.php?id_edit=$id' class='btn btn-warning'>Edit</a>
                    <a href='student.php?id_hapus=$id' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus $name?')\">Hapus</a>
                </td>
            </tr>";
            $no++;
        }

        $dataStudent .= "</tbody></table>";

        $tpl = new Template("templates/index.html");
        $tpl->replace("JUDUL", "Daftar Mahasiswa");
        $tpl->replace("DATA_TABEL", $dataStudent);
        $tpl->replace("ACTIVE_STUDENT", "active");
        $tpl->replace("ACTIVE_CLASS", "");
        $tpl->replace("ACTIVE_ENROLL", "");
        $tpl->write();
    }

    public function renderEditForm($data) {
        list($id, $nim, $name, $phone, $join_date) = $data;
        $form = "<form action='student.php' method='POST' onsubmit='return validateForm();'>
            <input type='hidden' name='id' value='$id'>
            <div class='mb-3'>
                <label class='form-label'>NIM</label>
                <input type='text' name='nim' class='form-control' value='$nim' required>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Nama</label>
                <input type='text' name='name' class='form-control' value='$name' required>
            </div>
            <div class='mb-3'>
                <label class='form-label'>No. HP</label>
                <input type='text' name='phone' class='form-control' value='$phone' required>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Tanggal Bergabung</label>
                <input type='date' name='join_date' class='form-control' value='$join_date' required>
            </div>
            <button type='submit' name='submit_edit' class='btn btn-primary'>Simpan</button>
            <a href='student.php' class='btn btn-secondary ms-2'>Batal</a>
        </form>
        <script>
            function validateForm() {
                return confirm('Yakin ingin menyimpan perubahan?');
            }
        </script>";

        $tpl = new Template("templates/form.html");
        $tpl->replace("JUDUL", "Edit Mahasiswa");
        $tpl->replace("DATA_TABEL", $form);
        $tpl->write();
    }

    public function renderAddForm() {
        $form = "<form action='student.php' method='POST' onsubmit='return validateForm();'>
            <div class='mb-3'>
                <label class='form-label'>NIM</label>
                <input type='text' name='nim' class='form-control' required>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Nama</label>
                <input type='text' name='name' class='form-control' required>
            </div>
            <div class='mb-3'>
                <label class='form-label'>No. HP</label>
                <input type='text' name='phone' class='form-control' required>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Tanggal Bergabung</label>
                <input type='date' name='join_date' class='form-control' required>
            </div>
            <button type='submit' name='submit' class='btn btn-primary'>Tambah</button>
            <a href='student.php' class='btn btn-secondary ms-2'>Batal</a>
        </form>
        <script>
            function validateForm() {
                return confirm('Yakin ingin menambahkan mahasiswa ini?');
            }
        </script>";

        $tpl = new Template("templates/form.html");
        $tpl->replace("JUDUL", "Tambah Mahasiswa");
        $tpl->replace("DATA_TABEL", $form);
        $tpl->write();
    }
}