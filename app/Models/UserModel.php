<?php


namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{

    protected $table ='user';
    protected $primaryKey ='User_id';
    protected $allowedFields =
    [
        'Username', 
        'Email',
        'Password',
        'usergroup_id'
   
 
    ];
   
    public function verifyEmail($email)
    {
        $ve = $this->db->table('user');
        $ve->select("User_id,Username,Password,usergroup_id");
        $ve->where('Email',$email);
        $result = $ve->get();
        if(count($result->getResultArray())==1)
       {
        return $result->getRowArray();
       }
       else
       {
         return false;
       }
    }
  


 
}

?>