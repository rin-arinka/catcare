<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Config\Services;
use App\Models\TransModel;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\ShampoModel;
use App\Models\ToolkitModel;
use App\Models\MakananModel;

class MidtransController extends Controller
{

    public function __construct()
    {
        Config::$serverKey = "SB-Mid-server-auTl9LHRurVWOqffTfGPre_v";
        $clientKey = "SB-Mid-client-eb2QJIH_yqjtsGRW";
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index() {

        $clientKey = "SB-Mid-client-eb2QJIH_yqjtsGRW";
		date_default_timezone_set('Asia/Jakarta');
		$idtrs = "TRS".date('mdhis');

        // =================================
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $this->request->getPost("harga"), // no decimal allowed for creditcard
        );
        
        // Optional
        $item1_details = array(
            'id' => $this->request->getPost("jenis").$this->request->getPost("id_m"),
            'price' => $this->request->getPost("harga"),
            'quantity' => 1,
            'name' => $this->request->getPost("nama")
        );
        
        // $item2_details = array(
        //     'id' => 'a2',
        //     'price' => 180000,
        //     'quantity' => 1,
        //     'name' => "Ebook Belajar Laravel 8 at qadrLabs"
        // );
        
        // $item_details = array($item1_details, $item2_details);
        $item_details = array($item1_details);

        $customer_details = array(
            'first_name'    => session('nama'),
            'last_name'     => session('nama'),
            'email'         => session('username').'@gmail.com',
            'phone'         => '081234567890'
        );

        $enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel');

        // Fill transaction details
        $transaction = array(
            // 'enabled_payments' => $enable_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );

        $snapToken = Snap::getSnapToken($transaction);
        // echo "snapToken = ".$snapToken;
        $base = $_SERVER['REQUEST_URI'];

        $dat['snapToken'] = $snapToken;
        $dat['clientKey'] = $clientKey;
        $dat['item']      = $item1_details;

        $data1 = [
            'id_transaksi' => $idtrs,
            'id_user' => session('id_user'),
            'tgl_transaksi' => date('Y-m-d'),
            'jenis_produk' => $this->request->getPost("jenis"),
            'id_produk' => $this->request->getPost("id_m"),
            'harga' => $this->request->getPost("harga"),
        ];
        
        $dat['data1']      = $data1;

        $header = view('template/header');
        $mainContent = view('payment/pay', $dat);
        $footer = view('template/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function showTransactions()
    {
        Config::$serverKey = config('Midtrans')->serverKey;
        Config::$isProduction = config('Midtrans')->isProduction;

        $transactions = $this->getMidtransTransactions();

        // return view('payment/index', ['transactions' => $transactions]);

        $header = view('template/header');
        $mainContent = view('payment/index', ['transactions' => $transactions]);
        $footer = view('template/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    private function getMidtransTransactions()
    {
        $transactions = \Midtrans\Transaction::status('TRS12280441');

        return $transactions;
    }

    // MidtransController.php

    public function updateStock() {
        $jenis = $this->request->getPost("jenis");
        $id_m = $this->request->getPost("id_m");
        $id_transaksi = $this->request->getPost("id_transaksi");
        $id_user = $this->request->getPost("id_user");
        $tgl_transaksi = $this->request->getPost("tgl_transaksi");
        $harga = $this->request->getPost("harga");

        $MDL = NULL;

        if ($jenis == "makanan") {
            $MDL = new MakananModel();
        } else if ($jenis == "shampo") {
            $MDL = new ShampoModel();
        } else if ($jenis == "toolkit") {
            $MDL = new ToolkitModel();
        }

        $currentStok = $MDL->find($id_m);
        $newStok = $currentStok->stok - 1;
        $dataToUpdate = [
            'stok' => $newStok
        ];
        $MDL->update($id_m, $dataToUpdate);

        $trsmdl = new TransModel();
        $result = $trsmdl->insert([
            'id_transaksi' => $id_transaksi,
            'id_user' => $id_user,
            'tgl_transaksi' => $tgl_transaksi,
            'jenis_produk' => $jenis,
            'id_produk' => $id_m,
            'harga' => $harga
        ]);
        // return $this->response->setJSON(['status' => 'success']);
    }

}
