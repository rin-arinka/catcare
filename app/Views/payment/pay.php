<section id="content">
    <div class="content-wrap pt-0 clearfix">

        <div class="section m-0 clearfix" style="background-color: #eef2f5;">
            <div class="container clearfix">

                <div class="heading-block center border-bottom-0 bottommargin topmargin-sm mx-auto" style="max-width: 640px">
                    <h4 class="nott font-secondary font-weight-normal" style="font-size: 36px;">Lakukan Pembayaran</h4>
                    
                    <div class="fbox-content border-0">
                        <h4 class="nott ls0 font-weight-bold">
                            <?= $item['name'] ?><br>
                            <span class="subtitle font-weight-light ls0" style="color: black;"><b><?= 'Rp ' . number_format($item['price'], 0, ',', '.') ?></b></span>
                        </h4><br>
                    </div>

                    <button id="pay-button" class="btn btn-primary">Bayar!</button>

                    <!-- <pre><div id="result-json"><br></div></pre>  -->
                </div>
            </div>
        </div>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo $clientKey; ?>"></script>
<!-- ... -->
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        snap.pay('<?php echo $snapToken?>', {
            onSuccess: function(result){
                updateStock();
                showResultModal(result.transaction_status, result.payment_type);
            },
            onPending: function(result){
                showResultModal(result.transaction_status, result.payment_type);
            },
            onError: function(result){
                showResultModal(result.transaction_status, result.payment_type);
            }
        });
    };

    function updateStock() {
        $.ajax({
            url: '<?php echo base_url('midtranscontroller/updateStock'); ?>',
            type: 'POST',
            data: {
                jenis: '<?php echo $data1['jenis_produk']; ?>',
                id_m: '<?php echo $data1['id_produk']; ?>',
                id_transaksi: '<?php echo $data1['id_transaksi']; ?>',
                id_user: '<?php echo $data1['id_user']; ?>',
                tgl_transaksi: '<?php echo $data1['tgl_transaksi']; ?>',
                harga: '<?php echo $data1['harga']; ?>'
            },
            success: function(response) {
                // Proses respons dari server jika diperlukan
                console.log(response);
            },
            error: function(error) {
                // Tangani kesalahan jika terjadi
                console.log(error);
            }
        });
    }

    function showResultModal(status, paymentType) {
        // Buat modal HTML di sini
        var modalHTML = '<div id="result-modal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border: 1px solid #ccc; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); z-index: 1000;">';

        // Tambahkan konten modal berdasarkan status dan tipe pembayaran
        modalHTML += '<p>Status : ' + status + '</p>';
        modalHTML += '<p>Tipe Pembayaran: ' + paymentType + '</p>';

        modalHTML += '<button onclick="closeResultModal()" class="btn btn-success" >Tutup</button>';
        modalHTML += '</div>';

        // Tambahkan modal ke dalam dokumen
        var modalWrapper = document.createElement('div');
        modalWrapper.innerHTML = modalHTML;
        document.body.appendChild(modalWrapper);

        // Tampilkan modal
        document.getElementById('result-modal').style.display = 'block';
    }

    function closeResultModal() {
        // Tutup modal
        var modal = document.getElementById('result-modal');
        modal.parentNode.removeChild(modal);
    }
</script>
<!-- ... -->
