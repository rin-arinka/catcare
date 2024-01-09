            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Order</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Order Product</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="<?= base_url('user/submit_order') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Select Product</label>
                                            <select class="form-control" name="makanan" required="">
                                                <?php foreach ($makanan as $m) : ?>
                                                <option value="tes"><?php echo $m->nama_makanan." - ".$m->harga; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="text"  value="<?php echo session('id_user'); ?>" name="id_user" hidden>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <textarea class="form-control" name="alamat" style="height: 100px;" required=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Pilihan Pengiriman</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="delivery" id="courier" value="courier" required>
                                            <label class="form-check-label" for="courier">
                                                Pengiriman melalui kurir
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="delivery" id="self" value="self" required>
                                            <label class="form-check-label" for="self">
                                                Pickup
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">Tanggal</label>
                                        <input type="date" name="tgl_transaksi" id="tgl_transaksi" class="form-control" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Catatan (Optional)</label>
                                        <textarea class="form-control" name="catatan" style="height: 100px;"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">Order</button>
                            </form>
                        </div>
                    </div>
                </main>

