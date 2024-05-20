<?php


namespace App\Models;
use CodeIgniter\Model;

class UseraccessModel extends Model{

    protected $table ='user_access';
    protected $primaryKey ='id';
    protected $allowedFields =
    [
        'User_id', 
        'Agent',
        'Ip',
        'Login_time',
        'Logout_time'
        
   
 
    ];


}