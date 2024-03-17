<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController  extends BaseController
{
    public $session; 

    public function __construct()
    {
        $this->session = session(); 
    }

    public function index()
    {
        $data = [];


        $usermodel = new UserModel();

        if($this->request->getMethod() == 'post')
        {
            $rules =[
                'email' => 'required|valid_email',
                'password'=> 'required|min_length[6]|max_length[16]',
            ];
            if($this->validate($rules))
            { 
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');

               $userdata=$usermodel->verifyEmail($email);
               if($userdata)
               {
                  if(password_verify($password,$userdata['Password']))
                  {
                      
                  }
                  else
                  {
                    return redirect()->back()->with('errormessage', 'Sorry! Wrong Password Enter for that Account');
                  }
               }
               else
               {
                
                 return redirect()->back()->with('errormessage', 'Sorry! Email does not exist');
               }
            }
            else
            {
              $data['validation'] = $this->validator;
            }
        }

        
    }
}
