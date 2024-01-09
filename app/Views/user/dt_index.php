<?php
    $tt = "";
    $ttk = "";
    if (service('uri')->getSegment(3) == "food") {
        $tt = "Makanan";
        $ttk = "makanan";
    } else if (service('uri')->getSegment(3) == "shampoo") {
        $tt = "Shampoo";
        $ttk = "shampo";
    } else if (service('uri')->getSegment(3) == "toolkit") {
        $tt = "Toolkit";
        $ttk = "toolkit";
    }
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"><?=$tt?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Cat <?=service('uri')->getSegment(3)?></li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i><?=service('uri')->getSegment(3)?> Cat</div>
                            
                            <?php
                            // Menampilkan pesan sukses
                            if (session()->has('success_message')) {

                                echo '<div class="alert alert-success">' . session('success_message') . '</div>';
                            }

                            // Menampilkan pesan gagal
                            if (session()->has('error_message')) {
                                echo '<div class="alert alert-danger">' . session('error_message') . '</div>';
                            }
                            ?>
                            <br>
                            <a href="<?=site_url('/user/dt_insert/'.service('uri')->getSegment(3))?>" class="btn btn-primary" style="color: white; width: 15%">Tambah <?=service('uri')->getSegment(3)?></a>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%"><center>No</th>
                                                <th><center>Nama <?=$tt?></th>
                                                <th style="width: 10%"><center>Stok</th>
                                                <th style="width: 15%"><center>Harga</th>
                                                <th><center>Foto</th>
                                                <th style="width: 8%"><center>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $no=1; foreach ($dt as $t) : ?>

                                            <tr>
                                                <td><center><?php echo $no; ?></td>
                                                <td><?php echo $t->{'nama_' . $ttk}; ?></td>
                                                <td><?php echo $t->stok; ?></td>
                                                <td><?php echo $t->harga; ?></td>
                                                <td><?php echo $t->foto; ?></td>
                                                <td style="text-align:center">
                                                    <a href="<?=site_url('/user/edit/'.$t->{'id_' . $ttk}.'/'.service('uri')->getSegment(3))?>"><i class="fa fa-edit"></i></a>&nbsp;
                                                    <a href="<?=site_url('/user/delete/'.$t->{'id_' . $ttk}.'/'.service('uri')->getSegment(3))?>"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <?php $no++; endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>