<?php

namespace App\Controllers;

use App\Models\SigninModel;
use CodeIgniter\Controller;
use Config\Services;
use CodeIgniter\Cookie\Cookie;
use CodeIgniter\Cookie\CookieStore;

class Signin extends BaseController
{

    public function index()
    {
        $session = session('status');

        if (isset($session)) {
            return redirect()->route('/');
        }
        // var_dump($session);
        echo view('signin/signin-view');
    }

    public function in()
    {

        $model = new SigninModel();

        $input = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        $query = $model->checking($input['username']);
        $data = $query->getResult();

        if ($data) {
            
            // username correct check password
            $data = $query->getRowArray();
            // var_dump($data['password']);die();

            $config         = new \Config\Encryption();
            $config->key    = 'janGan_tanyA_Saya_Passwordnya_Ya';
            $config->driver = 'OpenSSL';

            $encrypter = \Config\Services::encrypter($config);

            // decode process
            $plaintext = $encrypter->decrypt(base64_decode($data['password']));
            // var_dump($plaintext);die();

            if ($plaintext === $input['password']) {

                //sessioning
                $session = \Config\Services::session();
                $login = [
                    'status' => true
                ];
                $session->set($login);

                // create cookie
                $this->startCookie($username = $input['username']);

                // $store = $store->get('username')->getValue();
                return redirect()->route('signin');
            } else {
                return redirect()->route('signin');
            }

        } else {
            echo "username salah";
        }

    }

    public function register()
    {
        $model = new SigninModel();

        if ($this->request->getMethod() === 'post') {
            // catch input username and password
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
    
            // check if username is available or already used
            $query = $model->getWhere(['username' => $username]);
            $uname = $query->getResult();

            if ($uname) {
                // if username already used will back to register form
                return redirect()->route('register');
            } else {
                // encrypting password

                $config         = new \Config\Encryption();
                $config->key    = 'janGan_tanyA_Saya_Passwordnya_Ya';
                $config->driver = 'OpenSSL';

                $encrypter = \Config\Services::encrypter($config);

                $encode = base64_encode($encrypter->encrypt($password));
                // echo 'chiper:'.$encode.'<br>';
                // $decodeResult = base64_decode($encode);
                // $plaintext = $encrypter->decrypt($decodeResult);
                // var_dump($plaintext);die();

                // save input and password encrypt to $input
                $input = [
                    'username' => $username,
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'password' => $encode,
                ];

                $model->insert($input);
                // var_dump($input);
                
            }
        } else {
            echo view('signin/register-view');
        }
    }

    public function signout()
    {
        // destroy session
        $session = session();
        $session->remove('status');
        // delete cookie
        setcookie("username", 'false');

        return redirect()->route('/');
    }

    public function startCookie($username)
    {
        // Passing an array of `Cookie` objects in the constructor
        // $cookieStore = Services::response()->getCookieStore();
        // Passing an array of `Cookie` objects in the constructor
        // $store = cookies([new Cookie('username', $username)], true);
        setcookie("username", $username);
    }
}