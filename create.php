<?php 
    require 'db.php';

    $countries = loadCountry($connection);

    function checkEmpty($data) {
        foreach ($data as $i) {
            if (empty($i)) {
                return false;
            }
        }

        return true;
    }

    if (!empty($_POST)) {
        $nama = $_POST['nama'];
        $kode = $_POST['kode'];
        $wilayah = $_POST['wilayah'];
        $populasi = $_POST['populasi'];

        $check = [$nama, $kode, $wilayah, $populasi];


        if (checkEmpty($check) != false) {
            create($connection, $nama, $kode, $wilayah, $populasi);
            header('location: /uts/');
            exit();
        } else {
            echo '<script>alert("Semua field harus diisi!")</script>';
        }
    }
?>

<?php require 'header.php' ?>
    <div class="container" style="margin-top: 100px; max-width: 600px;">
        <div class="card shadow" style="border-radius: 19px; padding: 50px;">
            <h3 class="text-center mb-5">Tambah Data Kota</h3>
            <form action="/uts/create.php" method="POST">
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="nama-kota" class="form-label">Nama kota</label>
                        <input name="nama" type="text" class="form-control" id="nama-kota" value="<?= empty($nama) ? '' : $nama ?>">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="kode-negara" class="form-label">Kode negara</label>
                        <select class="form-select" aria-label="Kode negara" id="kode-negara" name="kode">
                            <?php
                            foreach ($countries as $country) { echo $country->kode;?>
                                <?php if ($country->Code == $kode) { ?>
                                    <option selected value="<?= $country->Code ?>"><?= $country->Name ?></option>
                                <?php } else {?>
                                    <option value="<?= $country->Code ?>"><?= $country->Name ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="wilayah" class="form-label">Wilayah</label>
                        <input name="wilayah" type="text" class="form-control" id="wilayah" value="<?= empty($wilayah) ? '' : $wilayah ?>">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="populasi" class="form-label">Populasi</label>
                        <input name="populasi" type="number" class="form-control" id="populasi" value="<?= empty($populasi) ? '' : $populasi ?>">
                    </div>
                <button class="btn btn-success mt-3 mx-auto" type="submit">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
<?php require 'footer.php' ?>