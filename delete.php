<?php 
    require 'db.php';

    if (!empty($_GET['id']) && empty($_GET['delete'])) {
        $id = $_GET['id'];
        $city = fetchOne($connection, $id);
    } elseif (!empty($_GET['delete']) && $_GET['delete'] == true) {
        $id = $_GET['id'];
        echo $id;
        delete($connection, $id);
        header('location: /uts/');
        exit();
    } else {
        header('location: /uts/');
        exit();
    }
?>

<?php require 'header.php' ?>
    <?php if (!empty($_GET['id'])) { ?>
    <div class="container" style="margin-top: 100px; max-width: 500px;">
        <div class="card shadow" style="border-radius: 19px; padding: 50px;">
            <h4 class="text-center mb-5">Apakah anda yakin ingin menghapus</h4>
            <h3 class="text-center mb-5 text-danger"><?= $city->Name ?></h3>
            <h4 class="text-center mb-5">dari daftar kota?</h4>
            <div class="row">
                <a href="/uts/delete.php?id=<?= $_GET['id'] ?>&delete=true" class="btn col-12">Ya</a>
                <a href="/uts/" class="btn btn-danger col-12">Tidak</a>
            </div>
        </div>
    </div>
    <?php } ?>
<?php require 'footer.php' ?>