<?php
require 'db.php';

$cities = view($connection);
?>

<?php require 'header.php' ?>
    <div class="overlay show">
        <h3 class="text-white">Loading...</h3>
    </div>
    <div class="container" style="margin-top: 100px">
        <div class="card shadow" style="border-radius: 19px; padding: 50px;">
            <h3 class="text-center mb-5">Daftar Kota Di Dunia dan Populasinya</h3>
            <table id="city-table" class="table table-bordered table-hover">
                <thead class='text-center'>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kota</th>
                        <th>Kode Negara</th>
                        <th>Wilayah</th>
                        <th>Populasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    <?php foreach ($cities as $city) { ?> 
                    <tr>
                        <td><?= $index ?></td>
                        <td><?= $city->Name?></td>
                        <td><?= $city->CountryCode?></td>
                        <td><?= $city->District?></td>
                        <td><?= $city->Population?></td>
                        <td class="text-center">
                            <a href="/uts/edit.php?id=<?= $city->ID ?>">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="/uts/delete.php?id=<?= $city->ID ?>">
                                <i class="fa fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr class="text-center">
                    <?php $index++; } ?>
                </tbody>
            </table>
            <a href="/uts/create.php" class="btn btn-success mt-3" style="max-width: 200px">Tambah Data</a>
        </div>
    </div>
    <script>
        const loading = () => {
            console.log('loaded');
            document.querySelector('.overlay.show').classList.remove('show');
        }
    </script>
<?php require 'footer.php' ?>