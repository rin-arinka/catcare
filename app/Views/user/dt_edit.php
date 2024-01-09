<?php
    $tt = "";
    $ttk = "";
    if (service('uri')->getSegment(4) == "food") {
        $tt = "Makanan";
        $ttk = "makanan";
    } else if (service('uri')->getSegment(4) == "shampoo") {
        $tt = "Shampoo";
        $ttk = "shampo";
    } else if (service('uri')->getSegment(4) == "Toolkit") {
        $tt = "Toolkit";
        $ttk = "toolkit";
    }
?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"><?=$tt?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit <?=$tt?></li>
                        </ol>
                        <!-- <div class="row"> -->
                            <form action="<?= base_url('user/update/'.service('uri')->getSegment(4)) ?>" method="post" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <input type="hidden" value="<?= $dt->{'id_' . $ttk} ?>" name="idfood">
                                    <div class="form-group">
                                        <label for="date">Nama <?=$tt?></label>
                                        <input type="text" value="<?= $dt->{'nama_' . $ttk} ?>" name="namafood" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Jumlah <?=$tt?></label>
                                        <input type="number" value="<?= $dt->stok ?>" name="jumlahfood" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Harga <?=$tt?></label>
                                        <input type="number" value="<?= $dt->harga ?>" name="hargafood" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Foto <?=$tt?></label>
                                        <input type="file" name="foto" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                            </form>
                        <!-- </div> -->
                    </div>
                </main>

