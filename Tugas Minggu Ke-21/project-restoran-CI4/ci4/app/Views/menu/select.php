<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php
if (isset($_GET['page_page'])) {
    $page = $_GET['page_page'];
    $jumlah = 3;
    $no = ($jumlah * $page) - $jumlah + 1;
} else {
    $no = 1;
}

?>


<div class="row">

    <div class="col-4">
        <a class="btn btn-primary" href="<?= base_url('/admin/menu/create') ?>" role="button">TAMBAH DATA</a>
    </div>

    <div class="col">
        <h2> <?= $judul; ?> </h2>
    </div>

</div>

<div class="row mt-2">
    <div class="col-4">
        <form action="<?= base_url('/Admin/Menu/read') ?>" method="get">
            <?= view_cell('App\Controllers\Admin\Menu::option') ?>
        </form>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Gambar</th>
                    <th>Harga</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <?php $no = $no ?>
            <?php foreach ($menu as $key => $value) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['menu'] ?></td>
                    <td><img style="width:100px" src="<?= base_url('/upload/' . $value['gambar'] . '') ?>" alt=""></td>
                    <td><?= number_format($value['harga']) ?></td>

                    <td class="text-center"><a class="btn btn-danger" href="<?= base_url('/Admin/Menu/delete/' . $value['idmenu'] . '') ?>">
                            <img src="<?= base_url('/icon/trash.svg') ?>"></a>
                        <a class="btn btn-warning" href="<?= base_url('/Admin/Menu/find/' . $value['idmenu'] . '') ?>">
                            <img src="<?= base_url('/icon/pencil.svg') ?>"></a></td>
                </tr>
            <?php endforeach; ?>

        </table>


        <?= $pager->links('page', 'bootstrap') ?>

    </div>
</div>

<?= $this->endSection() ?>