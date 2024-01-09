<?php
    $tt = "History";
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"><?=$tt?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Cat Order History</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Order History Cat</div>
                            
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%"><center>No</th>
                                                <th><center>ID <?=$tt?></th>
                                                <th><center>Tgl Transaksi</th>
                                                <th><center>Jenis Produk</th>
                                                <th><center>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $no=1; foreach ($dt as $t) : ?>

                                            <tr>
                                                <td><center><?php echo $no; ?></td>
                                                <td><?php echo $t->id_transaksi; ?></td>
                                                <td><?php echo $t->tgl_transaksi; ?></td>
                                                <td><?php echo $t->jenis_produk; ?></td>
                                                <td><?php echo $t->harga; ?></td>
                                            </tr>

                                            <?php $no++; endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>