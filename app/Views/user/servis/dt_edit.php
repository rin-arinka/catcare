<?php
    $tt = "Service";
?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"><?=$tt?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit <?=$tt?></li>
                        </ol>
                        <!-- <div class="row"> -->
                            <form action="<?= base_url('user/updateservice') ?>" method="post" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <input type="hidden" value="<?= $dt->id_service ?>" name="idservice">
                                    <div class="form-group">
                                        <label for="date">Nama <?=$tt?></label>
                                        <input type="text" value="<?= $dt->nama_service ?>" name="namaservice" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Deskripsi <?=$tt?></label>
                                        <input type="text" value="<?= $dt->deskripsi_service ?>" name="deskripsiservice" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Harga <?=$tt?></label>
                                        <input type="number" value="<?= $dt->harga_service ?>" name="hargaservice" class="form-control">
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

