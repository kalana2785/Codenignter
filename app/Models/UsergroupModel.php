<?php


namespace App\Models;
use CodeIgniter\Model;

class UsergroupModel extends Model{

    protected $table ='user_group';
    protected $primaryKey ='ugroup_id';
    protected $allowedFields =
    [
        'Usergroup_name'
      
   
 
    ];
}