<?php 
    require 'db.php';

    if (!empty($_GET['id']) && empty($_POST)) {
        $id = $_GET['id'];
        $city = fetchOne($connection, $id);
        $countries = loadCountry($connection);
    } elseif (!empty($_POST)) {
        update($connection, $_POST['id'], $_POST['nama'], $_POST['kode'], $_POST['wilayah'], $_POST['populasi']);
        header('location: /uts/');
        exit();
    } else {
        header('location: /uts/');
        exit();
    }
?>

<?php require 'header.php' ?>
    <div class="container" style="margin-top: 100px">
        <div class="card shadow" style="border-radius: 19px; padding: 50px;">
        <h3 class="text-center mb-5">Tambah Data Kota</h3>
            <form action="/uts/edit.php" method="POST">
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="nama-kota" class="form-label">Nama kota</label>
                        <input name="nama" type="text" class="form-control" id="nama-kota" value="<?= $city->Name ?>">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="kode-negara" class="form-label">Kode negara</label>
                        <select name='kode' class="form-select" aria-label="Kode negara" id="kode-negara">
                            <?php
                            foreach ($countries as $country) { ?>
                                <?php if ($country->Code == $city->CountryCode) { ?>
                                    <option selected value="<?= $country->Code ?>"><?= $country->Name ?></option>
                                <?php } else {?>
                                    <option value="<?= $country->Code ?>"><?= $country->Name ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="wilayah" class="form-label">Wilayah</label>
                        <input name="wilayah" type="text" class="form-control" id="wilayah" value="<?= $city->District ?>">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="populasi" class="form-label">Populasi</label>
                        <input name="populasi" type="number" class="form-control" id="pupulasi" value="<?= $city->Population ?>">
                    </div>
                    <input type="text" name='id' style="visibility: hidden; display: none;" value="<?= $id ?>">
                <button class="btn btn-success mt-3 mx-auto" type="submit" style="max-width: 200px;">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
<?php require 'footer.php' ?>