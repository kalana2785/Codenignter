<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public $session; 

    public function __construct()
    {
        $this->session = session(); 
    }

    public function index()
    {
        $data = [];
        $userModel = new UserModel();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password'=> 'required|min_length[6]|max_length[16]',
            ];

            if ($this->validate($rules)) { 
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');

                $userData = $userModel->verifyEmail($email);

                if ($userData) {
                
                    if ($password == $userData['Password']) {
                        $this->session->set('logged_user',$userData['User_id']);
                        return redirect()->to(base_url().'dashboard');
                       
                    } else {
                       
                        return redirect()->back()->with('errormessage', 'Sorry! Wrong Password Entered for that Account');
                    }
                } else {
                    
                    return redirect()->back()->with('errormessage', 'Sorry! Email does not exist');
                }
            } else {
               
                $data['validation'] = $this->validator;
            }
        }

        return view('index', $data);
    }

    public function logout()
    {
        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(route_to('index'));
    }
}
