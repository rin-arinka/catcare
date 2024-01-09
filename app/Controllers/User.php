<?php

namespace App\Controllers;

use App\Models\ShampoModel;
use App\Models\ToolkitModel;
use App\Models\HistModel;
use App\Models\MakananModel;
use App\Models\ServiceModel;
use App\Models\TransaksiModel;
use App\Models\OrderModel;

class User extends BaseController
{

	protected $session;
    protected $db;

    public function __construct()
    {
        $this->session = session();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function dt_insert() {
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman Admin.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/login");
        }

        $header = view('template/user/header');
        $mainContent = view('user/dt_insert');
        $footer = view('template/user/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function service_insert() {
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman Admin.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/login");
        }

        $header = view('template/user/header');
        $mainContent = view('user/servis/dt_insert');
        $footer = view('template/user/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function edit()
    {
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman Admin.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/login");
        }

        $url = service('uri')->getSegment(4);
        $data['dt'] = "";

        if($url == "food") {
            $MakananModel = new MakananModel();
            $data['dt'] = $MakananModel->find($this->request->uri->getSegment(3));
        } else if($url == "shampoo") {
            $ShampoModel = new ShampoModel();
            $data['dt'] = $ShampoModel->find($this->request->uri->getSegment(3));
        } else if($url == "toolkit") {
            $ToolkitModel = new ToolkitModel();
            $data['dt'] = $ToolkitModel->find($this->request->uri->getSegment(3));
        }

        $header = view('template/user/header');
        $mainContent = view('user/dt_edit', $data);
        $footer = view('template/user/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function editservice()
    {
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman Admin.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/login");
        }

        $ServiceModel = new ServiceModel();
        $data['dt'] = $ServiceModel->find($this->request->uri->getSegment(3));

        $header = view('template/user/header');
        $mainContent = view('user/servis/dt_edit', $data);
        $footer = view('template/user/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function delete()
    {
        $id_ = $this->request->uri->getSegment(3);
        
        $url = service('uri')->getSegment(4);
        $MDL = NULL;
        $idd = "";

        if($url == "food") {
            $idd = "makanan";
            $MDL = new MakananModel();
        } else if($url == "shampoo") {
            $idd = "shampo";
            $MDL = new ShampoModel();
        } else if($url == "toolkit") {
            $idd = "toolkit";
            $MDL = new ToolkitModel();
        } else if($url == "service") {
            $idd = "service";
            $MDL = new ServiceModel();
        }

        try {
            // Menghapus data
            $MDL->where('id_'.$idd, $id_)->delete();

            // Jika berhasil, set pesan sukses
            $this->session->setFlashdata('success_message', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, set pesan gagal
            $this->session->setFlashdata('error_message', 'Gagal menghapus data: ' . $e->getMessage());
        }

        // Redirect ke halaman tertentu, misalnya halaman utama
        if($url != "service") {
            return redirect()->to(base_url("user/menu/".$url));
        } else {
            return redirect()->to(base_url("user/service/"));
        }
    }

    public function update()
    {
        
        $url = service('uri')->getSegment(3);
        $MDL = NULL;
        $idd = "";

        if($url == "food") {
            $idd = "makanan";
            $MDL = new MakananModel();
        } else if($url == "shampoo") {
            $idd = "shampo";
            $MDL = new ShampoModel();
        } else if($url == "toolkit") {
            $idd = "toolkit";
            $MDL = new ToolkitModel();
        }

        $id_ = $this->request->getPost("idfood");
        $gt = $MDL->find($id_);

        // if ($gt) {
            $uploadConfig = [
                'upload_path' => './demos/pet/images/products/', // Ganti dengan path direktori tempat menyimpan file
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size' => 2048, // Ukuran maksimum file (dalam kilobyte)
                'encrypt_name' => true // Enkripsi nama file
            ];

            $upload = \Config\Services::upload($uploadConfig);

            // Mengecek apakah file berhasil diupload
            if ($file = $this->request->getFile('foto')) {
                if ($file->isValid() && $file->move($uploadConfig['upload_path'])) {
                    $foto = $file->getName();

                    $dataToUpdate = [
                        'nama_'.$idd=>$this->request->getPost("namafood"),
                        'stok'=>$this->request->getPost("jumlahfood"),
                        'harga'=>$this->request->getPost("hargafood"),
                        'foto' => $foto
                    ];
        
                    $MDL->update($id_, $dataToUpdate);

                    // Redirect setelah pembaruan
                    return redirect()->to("user/menu/".$url);
                } else {
                    
                    $dataToUpdate = [
                        'nama_'.$idd=>$this->request->getPost("namafood"),
                        'stok'=>$this->request->getPost("jumlahfood"),
                        'harga'=>$this->request->getPost("hargafood")
                    ];

                    $MDL->update($id_, $dataToUpdate);
                    return redirect()->to("user/menu/".$url);
                }
            } else {
                $dataToUpdate = [
                    'nama_'.$idd=>$this->request->getPost("namafood"),
                    'stok'=>$this->request->getPost("jumlahfood"),
                    'harga'=>$this->request->getPost("hargafood")
                ];

                $MDL->update($id_, $dataToUpdate);
                return redirect()->to("user/menu/".$url);
            }
        // =======================
    }

    public function updateservice()
    {
        $MDL = new ServiceModel();

        $id_ = $this->request->getPost("idservice");
        $gt = $MDL->find($id_);

        // if ($gt) {
            $uploadConfig = [
                'upload_path' => './demos/pet/images/services/', // Ganti dengan path direktori tempat menyimpan file
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size' => 2048, // Ukuran maksimum file (dalam kilobyte)
                'encrypt_name' => true // Enkripsi nama file
            ];

            $upload = \Config\Services::upload($uploadConfig);

            // Mengecek apakah file berhasil diupload
            if ($file = $this->request->getFile('foto')) {
                if ($file->isValid() && $file->move($uploadConfig['upload_path'])) {
                    $foto = $file->getName();

                    $dataToUpdate = [
                        'nama_service'=>$this->request->getPost("namaservice"),
                        'deskripsi_service'=>$this->request->getPost("deskripsiservice"),
                        'harga_service'=>$this->request->getPost("hargaservice"),
                        'foto' => $foto
                    ];
        
                    $MDL->update($id_, $dataToUpdate);

                    // Redirect setelah pembaruan
                    return redirect()->to("user/service/");
                } else {
                    
                    $dataToUpdate = [
                        'nama_service'=>$this->request->getPost("namaservice"),
                        'deskripsi_service'=>$this->request->getPost("deskripsiservice"),
                        'harga_service'=>$this->request->getPost("hargaservice")
                    ];

                    $MDL->update($id_, $dataToUpdate);
                    return redirect()->to("user/service/");
                }
            } else {
                $dataToUpdate = [
                    'nama_service'=>$this->request->getPost("namaservice"),
                    'deskripsi_service'=>$this->request->getPost("deskripsiservice"),
                    'harga_service'=>$this->request->getPost("hargaservice")
                ];

                $MDL->update($id_, $dataToUpdate);
                return redirect()->to("user/service/");
            }
        // =======================
    }

    public function simpanservice() {   
        $servicemodel = new ServiceModel();

        // Konfigurasi upload file
        $uploadConfig = [
            'upload_path' => './demos/pet/images/services/', // Ganti dengan path direktori tempat menyimpan file
            'allowed_types' => 'jpg|jpeg|png|gif',
            'max_size' => 2048, // Ukuran maksimum file (dalam kilobyte)
            'encrypt_name' => true // Enkripsi nama file
        ];

        $upload = \Config\Services::upload($uploadConfig);

        // Mengecek apakah file berhasil diupload
        if ($file = $this->request->getFile('foto')) {
            if ($file->isValid() && $file->move($uploadConfig['upload_path'])) {
                $foto = $file->getName();

                $result = $servicemodel->insert([
                    'nama_service' => $this->request->getPost("namaservice"),
                    'deskripsi_service' => $this->request->getPost("deskripsiservice"),
                    'harga_service' => $this->request->getPost("harga"),
                    'foto' => $foto,
                    'id_user' => session('id_user'),
                    'type_user' => session('level')
                ]);

                // Redirect setelah pembaruan
                return redirect()->to("user/service/");
            } else {
                // Jika upload foto gagal
                $error = $file->getErrorString();
                echo "Gagal mengupload foto: " . $error;
                return redirect()->to("user/service_insert");
            }
        } else {
            echo "Tidak ada file yang diunggah.";
            return redirect()->to("user/service_insert");
        }
    }

    public function simpan() {   
        $url = service('uri')->getSegment(3);
        $usermodel = NULL;
        $idd = "";

        if($url == "food") {
            $idd = "makanan";
            $usermodel = new MakananModel();
        } else if($url == "shampoo") {
            $idd = "shampo";
            $usermodel = new ShampoModel();
        } else if($url == "toolkit") {
            $idd = "toolkit";
            $usermodel = new ToolkitModel();
        }

        // Konfigurasi upload file
        $uploadConfig = [
            'upload_path' => './demos/pet/images/products/', // Ganti dengan path direktori tempat menyimpan file
            'allowed_types' => 'jpg|jpeg|png|gif',
            'max_size' => 2048, // Ukuran maksimum file (dalam kilobyte)
            'encrypt_name' => true // Enkripsi nama file
        ];

        $upload = \Config\Services::upload($uploadConfig);

        // Mengecek apakah file berhasil diupload
        if ($file = $this->request->getFile('foto')) {
            if ($file->isValid() && $file->move($uploadConfig['upload_path'])) {
                $foto = $file->getName();

                $result = $usermodel->insert([
                    'nama_'.$idd => $this->request->getPost("namafood"),
                    'stok' => $this->request->getPost("jumlahfood"),
                    'harga' => $this->request->getPost("hargafood"),
                    'foto' => $foto,
                    'id_user' => session('id_user'),
                    'type_user' => session('level')
                ]);

                // Redirect setelah pembaruan
                return redirect()->to("user/menu/".$url);
            } else {
                // Jika upload foto gagal
                $error = $file->getErrorString();
                echo "Gagal mengupload foto: " . $error;
                return redirect()->to("user/dt_insert");
            }
        } else {
            echo "Tidak ada file yang diunggah.";
            return redirect()->to("user/dt_insert");
        }
    }

    public function index()
    {
        // Check if user is logged in
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman Admin.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/login");
        }

        $header = view('template/user/header');
        $mainContent = view('user/index');
        $footer = view('template/user/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function order()
    {
        // Check if user is logged in
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman Admin.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/login");
        }

        $MakananModel = new MakananModel();
        $data['makanan'] = $MakananModel->findAll();

        $header = view('template/user/header');
        $mainContent = view('user/order', $data);
        $footer = view('template/user/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function service() {
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman Admin.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/login");
        }

        $ServiceModel = new ServiceModel();
        $data['dt'] = $ServiceModel->findAll();

        $header = view('template/user/header');
        $mainContent = view('user/servis/dt_index', $data);
        $footer = view('template/user/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function history() {
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman Admin.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/login");
        }

        $HistModel = new HistModel();
        $data['dt'] = $HistModel->findAll();

        $header = view('template/user/header');
        $mainContent = view('user/dt_history', $data);
        $footer = view('template/user/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function menu() {
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman Admin.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/login");
        }

        $data['dt'] = "";
        if (service('uri')->getSegment(3) == "food") {
            $MakananModel = new MakananModel();
            $data['dt'] = $MakananModel->findAll();
        } else if (service('uri')->getSegment(3) == "shampoo") {
            $ShampoModel = new ShampoModel();
            $data['dt'] = $ShampoModel->findAll();
        } else if (service('uri')->getSegment(3) == "toolkit") {
            $ToolkitModel = new ToolkitModel();
            $data['dt'] = $ToolkitModel->findAll();
        } 

        $header = view('template/user/header');
        $mainContent = view('user/dt_index', $data);
        $footer = view('template/user/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function order_history()
    {
        // Check if user is logged in
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman Admin.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/login");
        }

        $TransaksiModel = new TransaksiModel();
        $id_user = session()->get('id_user');
        $data['transaksi'] = $TransaksiModel->where('id_user', $id_user)->findAll();

        $header = view('template/user/header');
        $mainContent = view('user/order_history', $data);
        $footer = view('template/user/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function submit_order()
{
    if (!$this->isLoggedIn()) {
        $session = session();
        $session->setFlashdata('belumlogin', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman Admin.<br>Silahkan Coba Login.</a>
                        </div>');
        return redirect()->to("home/login");
    }

    $session = session();

    // Get the form input values
    $id_user = $this->request->getPost('id_user');
    $makanan = $this->request->getPost('makanan');
    $alamat = $this->request->getPost('alamat');
    $tgl_transaksi = $this->request->getPost('tgl_transaksi');
    $catatan = $this->request->getPost('catatan');
    $delivery = $this->request->getPost('delivery');

    // Create an instance of the OrderModel
    $orderModel = new OrderModel();

    // Prepare the data to be inserted
    $data = [
        'id_service' => '1',
        'id_user' => $id_user,
        'tgl_transaksi' => $tgl_transaksi,
        'status' => 'Pending',
        'alamat' => $alamat,
        'catatan' => $catatan,
        'delivery' => $delivery
    ];
 

    // Insert the data into the database
    if ($orderModel->insert($data)) {
        return redirect()->to('user/order');
    } else {
        $errors = $orderModel->errors();
        log_message('error', print_r($errors, true)); // Log the errors
        // Redirect to an error page or display an error message
        return redirect()->to('gagal');
    }
}



    private function isLoggedIn()
    {
        $session = session();

        // Check if the 'logged_in' session variable exists and is true
        if ($session->logged_in) {
            return true;
        }

        return false;
    }

    public function logout()
    {
        session()->destroy(); // Clear all session data

        return redirect()->to(base_url()); // Redirect to the login page or any other page
    }
}

?>