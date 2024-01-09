<?php

namespace App\Controllers;

use CodeIgniter\Controller;
// use CodeIgniter\Config\Services;
// use BaconQrCode\Encoder\QrCode;
use BaconQrCode\Encoder\QrCode;
use BaconQrCode\Common\Mode;

class PaymentController extends Controller
{
    public function index()
    {
        // $data['qrcode'] = $this->generateQRCode('YOUR_PAYMENT_DATA'); // Ganti dengan data pembayaran sesuai kebutuhan
        $data['qrcode'] = $this->generateQRCode([
            'order_id' => $this->request->getPost("nama"),
            'gross_amount' => $this->request->getPost("harga"),
            'payment_type' => 'qris',
            // 'customer_name' => 'nama', //session('username')
        ]);

        return view('payment/payment_page', $data);
    }

    private function generateQRCode($data)
{
    // Ubah array data menjadi string JSON untuk QR Code
    $jsonString = json_encode($data);

    $encoder = new QrCode();
    $encoder->setText($jsonString);  // Perbaikan di sini
    $encoder->setMode(new Mode\Byte());  // Set mode, bisa byte atau mode lainnya
    $encoder->setVersion(10);  // Set versi QR Code

    $qrCode = $encoder->encode();

    return $qrCode->getContentType();
}

}
