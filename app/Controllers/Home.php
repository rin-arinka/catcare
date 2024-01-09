<?php

namespace App\Controllers;
use App\Models\MemberModel;
use App\Models\UserModel;
use App\Models\ShampoModel;
use App\Models\ServiceModel;
use App\Models\MakananModel;
use App\Models\ToolkitModel;
use App\Models\GroomingModel;
use App\Models\GalleryModel;
use App\Models\HargaGroomingModel;

class Home extends BaseController
{
    protected $session;
    protected $db;

    public function __construct(){
        $this->session = session();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $ServiceModel = new ServiceModel();
        $data['services'] = $ServiceModel->findAll();

        $header = view('template/header');
        $mainContent = view('index', $data);
        $footer = view('template/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function produk()
    {
        $ServiceModel = new ServiceModel();
        $data['services'] = $ServiceModel->findAll();
        $header = view('template/header');
        $mainContent = view('indexproduk', $data);
        $footer = view('template/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function servis()
    {
        $ServiceModel = new ServiceModel();
        $data['service'] = $ServiceModel->findAll();

        $GroomingModel = new GroomingModel();
        $data['grooming'] = $GroomingModel->findAll();

        $HargaGroomingModel = new HargaGroomingModel();
        $data2['harga_grooming'] = $HargaGroomingModel->findAll();

        $GalleryModel = new GalleryModel();
        $data3['gallery'] = $GalleryModel->findAll();

        $header = view('template/header');
        $mainContent = view('servis', $data);
        $hargaContent = view('harga_grooming', $data2);
        $galleryContent = view('gallery', $data3);
        $footer = view('template/footer');
        $fullView = $header . $mainContent . $hargaContent . $galleryContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function food()
    {
        $MakananModel = new MakananModel();
        $data['food'] = $MakananModel->findAll();

        $header = view('template/header');
        $mainContent = view('indexfood', $data);
        $footer = view('template/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function shampo()
    {
        $ShampoModel = new ShampoModel();
        $data['shampo'] = $ShampoModel->findAll();

        $header = view('template/header');
        $mainContent = view('shampo/index', $data);
        $footer = view('template/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function toolkit()
    {
        $ToolkitModel = new ToolkitModel();
        $data['toolkit'] = $ToolkitModel->findAll();

        $header = view('template/header');
        $mainContent = view('toolkit/index', $data);
        $footer = view('template/footer');
        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('registermember');
    }

    public function create() {
        $usermodel = new MemberModel();
  
        $plainPassword = $this->request->getPost("password");
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
  
        $result = $usermodel->insert([
           'nama_member'=>$this->request->getPost("nama"),
           'username'=>$this->request->getPost("username"),
           'no_hp'=>$this->request->getPost("no_hp"),
           'alamat_member'=>$this->request->getPost("alamat_member"),
           'level'=>$this->request->getPost("level"),
           'password'=> $hashedPassword
        ]);
  
        if($result==true) {
              $session = session();
              $session->setFlashdata('berhasilbuatakun', '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon-line-lock"></i>Selamat! Akun Berhasil Dibuat.<br>Silahkan Login.</a>
                          </div>');
              return redirect()->to("home/login");
          }else{
              $session = session();
              $session->setFlashdata('gagalbuatakun', '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon-line-lock"></i>Maaf! Akun Gagal Dibuat.<br>Silahkan Coba Lagi.</a>
                          </div>');
              return redirect()->to("home/login");
          }
     }

    public function masuk()
    {
        $users = new MemberModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();

        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'username' => $dataUser->username,
                    'nama' => $dataUser->nama_member,
                    'no_hp' => $dataUser->no_hp,
                    'alamat_member' => $dataUser->alamat_member,
                    'saldo' => $dataUser->saldo,
                    'level' => $dataUser->level,
                    'id_user' => $dataUser->id_member,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('home/index'));
            } else {
                $session = session();
                $session->setFlashdata('salahpw', '<div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <i class="icon-line-lock"></i>Maaf, Password Anda Salah<br>Silahkan coba kembali.</a>
                            </div>');
                return redirect()->to(base_url('home/login'));
            }
        } else {
            $session = session();
            $session->setFlashdata('salah', '<div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <i class="icon-line-lock"></i>Maaf, Username & Password Anda Salah<br>Silahkan coba kembali.</a>
                            </div>');
            return redirect()->to(base_url('home/login'));
        }        
    }

    public function logout(){
        $session = session();
        $session->destroy();

        return redirect()->to(base_url());
    }
}
