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
                       
                         // collect the user login info
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

                        // redirct Path 
                        $this->session->set('logged_user',$userData['User_id']);
                        return redirect()->to(base_url().'/Admin');

                        }
                        else if($userData['usergroup_id']== 2)
                        {
                          

                             // collect the user login info   
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
                          
                         // redirct Path in inventory Manger

                            
                           $this->session->set('logged_user',$userData['User_id']);
                       
                            return redirect()->to(base_url().'dashboard');

                        }
                        elseif ($userData['usergroup_id'] == 3) {
                            $loginInfo = [
                                'User_id' => $userData['User_id'],
                                'Agent'   => $this->getUserAgentInfo(),
                                'Ip'      => $this->request->getIPAddress(),
                                'Login_time' => date('y-m-d h:i:s'),
                            ];
                        
                            $la_id = $this->dbmodel->saveLoginInfo($loginInfo);
                        
                            if ($la_id) {
                                $this->session->set('logged_info', $la_id);
                            }
                           
                            $this->session->set('login_user',$userData['User_id']);
                            // Fetch Unit_id based on User_id
                            $unitId = $this->dbmodel->getUnitIdByUserId($userData['User_id']);
                        
                            // Set logged_user session with Unit_id
                            $this->session->set('logged_user', $unitId);
                        
                            return redirect()->to(base_url().'/Unit');
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
        // Save Logout time
         if(session()->has('logged_info'))
         {
            $la_id = session()->get('logged_info');
            $this->dbmodel->updateLogoutTime($la_id);
         }

     
        // Session destroy
        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(route_to('index'));
    }


     // find browser or agent 
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

// recrtive Froget password form
   public function forgotview()
   {
       
       return view('forgot');
   }

// reset link   
   public function Forgotpassword()
{
    if ($this->request->getMethod() == 'post') {
        // Validation rules for the email field
        $rules = [
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} field required',
                    'valid_email' => 'Valid {field} required',
                ]
            ],
        ];

        // Validate the input data
        if ($this->validate($rules)) {
           
            $useremail = $this->request->getPost('email');

            
            $userData = $this->dbmodel->verifyEmail($useremail);
            if ($userData) {
               
                if ($this->dbmodel->updateAt($userData['User_id'])) {
                    // Prepare email data
                    $to = $useremail;
                    $subject = 'Reset Password Link';
                    $token = $userData['User_id'];
                   $message = 'Hello ' . $userData['User_id'] . '<br><br>'
               . '<a href="' . base_url('LoginController/resetpassword/' . $token) . '">Click me</a>';

 

                 
                    $email = \Config\Services::email();

               
                    $email->setTo($to);
                    $email->setFrom('info@hhims.in', 'HHIMS');
                    $email->setSubject($subject);
                    $email->setMessage($message);

                    // Send the email
                    if ($email->send()) {
                        return redirect()->back()->with('status', 'Password reset link sent successfully');
                    } else {

                         $data = $email->printDebugger(['header']);
                         print_r($data);

                    }
                } else {
                    // Handle database update failure
                    return redirect()->back()->with('errormessage', 'Failed to update password reset information');
                }
            } else {
                // Email does not exist in the database
                return redirect()->back()->with('errormessage', 'Sorry! Email does not exist');
            }
        } else {
            // Validation failed
            return redirect()->back()->withInput()->with('errormessage', $this->validator->listErrors());
        }
    }
}


  
public function resetpassword($token = null)
{
    $data = []; // Initialize data array

    if (!empty($token)) {
        $userData = $this->dbmodel->verifytoken($token); 
        if (!empty($userData)) {
            if ($this->cheakexpirydata($userData['update_at'])) {
                // Check if form is submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Retrieve new password and confirm password from the form
                    $newPassword = $_POST['NPassword'];
                    $confirmPassword = $_POST['CPassword'];

                    // Validate if new password and confirm password match
                    if ($newPassword === $confirmPassword) {
                        // Update password in the database
                        $this->dbmodel->updatePassword($userData['User_id'], $newPassword);

                        // Optionally, you can redirect the user to a success page
                        return redirect()->to('password_reset_success')->with('success', 'Password updated successfully.');
                    } else {
                        $data['error'] = 'New Password and Confirm Password do not match.';
                    }
                }
            } else {
                $data['error'] = 'Reset Password Link has expired.';
            }
        } else {
            $data['error'] = 'Unable to find account.';
        }
    } else {
        $data['error'] = 'Sorry! Unauthorized Access.';
    }

 
    return view('reset_password', $data);
}

    


// validate link time 
public function cheakexpirydata($time)
{

  $timediffent=strtotime(date("y-m-d h:i:s"))- strtotime($time);
  if($timediffent<900)
  {
    return true;
  } 
  else
  {
     return false;
  }
}



}
