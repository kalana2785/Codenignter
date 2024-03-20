<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public $session; 
    public $dbmodel;
    public function __construct()
    {
        $this->session = session(); 
        $this->dbmodel = new UserModel();
    }

    public function index()
    {
        $data = [];
        //$this->dbmodel = new UserModel();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password'=> 'required|min_length[6]|max_length[16]',
            ];

            if ($this->validate($rules)) { 
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');

                $userData = $this->dbmodel->verifyEmail($email);

                if ($userData) {
                
                    if (password_verify($password, $userData['Password'])) {

                        if($userData['usergroup_id']== 1){
                         
                         $loginInfo =[

                            'User_id' => $userData['User_id'],
                             'Agent'  =>$this->getUserAgentInfo(),
                              'Ip'    =>$this->request->getIPAddress(),
                           'Login_time' => date('y-m-d h:i:s'),

                         ];
                                    
                         $la_id= $this->dbmodel->saveLoginInfo($loginInfo);
                         
                         if($la_id)
                         {
                            $this->session->set('logged_info',$la_id);

                         }


                        $this->session->set('logged_user',$userData['User_id']);
                        return redirect()->to(base_url().'/Admin');

                        }
                        else if($userData['usergroup_id']== 2)
                        {
                          

                              
                         $loginInfo =[

                            'User_id' => $userData['User_id'],
                             'Agent'  =>$this->getUserAgentInfo(),
                              'Ip'    =>$this->request->getIPAddress(),
                           'Login_time' => date('y-m-d h:i:s'),

                         ];
                                    
                         $la_id= $this->dbmodel->saveLoginInfo($loginInfo);
                         
                         if($la_id)
                         {
                            $this->session->set('logged_info',$la_id);

                         }


                            
                           $this->session->set('logged_user',$userData['User_id']);
                       
                            return redirect()->to(base_url().'dashboard');

                        }
                       else{
                        return redirect()->back()->with('errormessage', 'Sorry! you not assign any usergroup');
                       }
                    }
                     else {
                       
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

    public function getUserAgentInfo()
    {
        $agent = $this->request->getUserAgent();
        if($agent -> isBrowser())
        {
            $currentAgent = $agent->getBrowser();
        }
        elseif($agent -> isRobot())
        {
            $currentAgent =$this-> $agent->robot();
        }
        elseif($agent -> isMobile())
        {
            $currentAgent = $agent->getMobile();
        }
        else
        {
            $currentAgent='unidentified User Agent';
        }

        return $currentAgent;

    }


}
