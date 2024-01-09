            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Order History</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Order History</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Order History Data</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th><center>No</th>
                                                <th><center>Tanggal Transaksi</th>
                                                <th><center>Status</th>
                                                <th><center>Address</th>
                                                <th><center>Delivery</th>
                                                <th><center>Note</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th><center>No</th>
                                                <th><center>Tanggal Transaksi</th>
                                                <th><center>Status</th>
                                                <th><center>Address</th>
                                                <th><center>Delivery</th>
                                                <th><center>Note</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php $no=1; foreach ($transaksi as $t) : ?>

                                            <tr>
                                                <td><center><?php echo $no; ?></td>
                                                <td><?php echo $t->tgl_transaksi; ?></td>
                                                <td><?php echo $t->status; ?></td>
                                                <td><?php echo $t->alamat; ?></td>
                                                <td><?php echo $t->delivery; ?></td>
                                                <td><?php echo $t->catatan; ?></td>
                                            </tr>

                                            <?php $no++; endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>