<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DesKelModel;
use App\Models\IndividuModel;
use CodeIgniter\HTTP\Request;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->db = db_connect();
        $this->desKel = new DesKelModel();
    }

    public function register()
    {
        // $data = [];
        helper(['form']);


        $data = [
            'title' => 'Registration',
            'desKels' => $this->desKel->orderBy('NamaDesa', 'asc')->findAll(),

        ];

        if ($this->request->getMethod() == 'post') {
            // let's do the validation here
            $rules = [
                'firstname' => [
                    'label' => 'Nama Depan',
                    'rules' => 'required|min_length[3]|max_length[25]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'min_length' => '{field} terlalu pendek',
                        'max_length' => '{field} terlalu panjang',
                    ]
                ],
                'nik' => [
                    'label' => 'NIK',
                    'rules' => 'required|numeric|min_length[16]|max_length[16]|is_unique[tb_users.nik]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'numeric' => '{field} harus berupa angka',
                        'min_length' => '{field} terlalu pendek',
                        'max_length' => '{field} terlalu panjang',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'desa_id' => [
                    'label' => 'Nama Desa',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi',
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tb_users.email]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'min_length' => '{field} terlalu pendek',
                        'max_length' => '{field} terlalu panjang',
                        'valid_email' => '{field} tidak valid',
                        'is_unique' => '{field} sudah terdaftar',

                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[6]|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'min_length' => '{field} terlalu pendek',
                        'max_length' => '{field} terlalu panjang',
                    ]
                ],
                'password_confirm' => [
                    'label' => 'Ulangi Password',
                    'rules' => 'matches[password]',
                    'errors' => [
                        'matches' => '{field} tidak sama'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return view('auth/index', [
                    "validation" => $this->validator,
                    'title' => 'Register',
                    'desKels' => $this->desKel->orderBy('NamaDesa', 'asc')->findAll(),

                ]);
            } else {
                //strore the user to database
                $model = new UserModel();

                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'nik' => $this->request->getVar('nik'),
                    'desa_id' => $this->request->getVar('desa_id'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                // dd($newData);
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Registrasi Berhasil, silahkan hubungi Admin untuk aktivasi');
                return redirect()->to('login');
            }
        }

        return view('auth/index', $data);
    }

    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            // var_dump($this->request->getvar());
            // $nik = $this->request->getVar('nik');

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[6]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email atau Password tidak sesuai",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('auth/index', [
                    "validation" => $this->validator,
                    "title" => 'Login',
                ]);
            } else {

                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))->first();

                $this->setUserSession($user);
                // Redirecting to dashboard after login
                if ($user['status'] == 0) {
                    $session = session();
                    $session->setFlashdata('message', 'User Non-Aktif, Silakan kontak Admin!');
                    return redirect()->to('login');
                } elseif ($user['status'] == 1) {
                    return redirect()->to(base_url('dashboard'));
                }
                // }
                // } else {
                //     $session = session();
                //     $session->setFlashdata('message', 'User Non-Aktif, Silakan kontak Admin!');
                //     return redirect()->to('login');
                // }
            }
        }
        // echo 'test';
        $data = [
            'title' => 'Sign In',
            'desKels' => $this->desKel->orderBy('NamaDesa', 'asc')->findAll(),

        ];

        return view('auth/index', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'nik' => $user['nik'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'desa_id' => $user['desa_id'],
            "role" => $user['role'],
            "status" => $user['status'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function setting()
    {
        $this->User = new UserModel();
        $desKels = $this->desKel->getDesKels();

        $data = [
            'title' => 'Profile',
            'users' => $this->User->getUser()->getResultArray(),
            'desKels' => $desKels->getResultArray(),

        ];
        // var_dump($data['users']);
        // die;
        return view('user/setting', $data);
        // echo 'test';
    }


    public function updatedata()
    {
        $this->User = new UserModel();
        // echo 'Function updateData';
        // die;

        if ($this->request->isAJAX()) {
            $nik = $this->request->getVar('nik');
            $firstname = $this->request->getVar('firstname');
            $lastname = $this->request->getVar('lastname');
            $email = $this->request->getVar('email');
            $id = $this->request->getVar('id');

            $validation = \Config\Services::validation();

            $doValid = $this->validate([
                'firstname' => [
                    'label' => 'Nama Depan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi!',
                    ]
                ],
                'lastname' => [
                    'label' => 'Nama Belakang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi!',
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'valid_email',
                    'errors' => [
                        'required' => '{field} harus di isi!',
                        'valid_email' => '{field} tidak valid!',
                    ]
                ],

                // 'gambar' => [
                //     'label' => 'Foto',
                //     'rules' => 'mime_in[gambar,image/png,image/jpg]|ext_in[gambar,png,jpg,jpeg]|is_image[gambar]',
                // ]
            ]);

            if (!$doValid) {
                $msg = [
                    'error' => [
                        'errornik' => $validation->getError('nik'),
                        'errorfirstname' => $validation->getError('firstname'),
                        'errorlastname' => $validation->getError('lastname'),
                        'erroremail' => $validation->getError('email'),
                    ]
                ];
            } else {
                // $fileGambar = $_FILES['gambar']['name'];

                // if ($fileGambar != null) {
                //     $namaGambar = "$keterangan" . "_" . "$akun_id";
                //     $fileUpload = $this->request->getFile('gambar');
                //     $fileUpload->move('dist/img/trx/in', $namaGambar . '.' . $fileUpload->getExtension());

                //     $pathGambar = 'dist/img/trx/in/' . $fileUpload->getName();
                // } else {
                //     $pathGambar = '';
                // }
                $data = [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'nik' => $nik,
                    'email' => $email,
                ];
                // var_dump($data);
                $this->User->update($id, $data);

                $msg = [
                    'sukses' => 'Data Berhasil di Update!',
                ];
            }

            echo json_encode($msg);
        } else {
            echo view('denied');
            exit;
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
