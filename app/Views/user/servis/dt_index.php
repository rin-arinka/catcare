            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Service</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Cat Service</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Service Cat</div>

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
                            <a href="<?=site_url('/user/service_insert/')?>" class="btn btn-primary" style="color: white; width: 15%">Tambah Service</a>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%"><center>No</th>
                                                <th style="width: 15%"><center>Nama Service</th>
                                                <th><center>Deskripsi Service</th>
                                                <th style="width: 8%"><center>Harga</th>
                                                <th><center>Foto</th>
                                                <th style="width: 8%"><center>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $no=1; foreach ($dt as $t) : ?>

                                            <tr>
                                                <td><center><?php echo $no; ?></td>
                                                <td><?php echo $t->nama_service; ?></td>
                                                <td><?php echo $t->deskripsi_service; ?></td>
                                                <td><?php echo $t->harga_service; ?></td>
                                                <td><?php echo $t->foto; ?></td>
                                                <td style="text-align:center">
                                                    <a href="<?=site_url('/user/editservice/'.$t->id_service)?>"><i class="fa fa-edit"></i></a>&nbsp;
                                                    <a href="<?=site_url('/user/delete/'.$t->id_service.'/service')?>"><i class="fa fa-trash"></i></a>
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