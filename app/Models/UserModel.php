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
  public function getlogindata($id)
      {
        $ui=$this->db->table('user');
        
        $ui->where('User_id',$id);
        $result = $ui->get();
        if(count($result->getResultArray())==1)
        {
         return $result->getRow();
        }
        else
        {
          return false;
        }
      }

      // save login info
  public function saveLoginInfo($data)
  {
    $ui=$this->db->table('user_access');
        
    $ui->insert($data);

    if($this->db->affectedRows()==1)
    {
      return $this->db->insertID();
    }
    else
    {
      return false;
    }
  }
// save logout info
  public function updateLogoutTime($id)
  {
    $ui=$this->db->table('user_access');
        
    $ui->where('id',$id);

    $ui->update(['Logout_time'=>date('y-m-d h:i:s')]);

    if($this->db->affectedRows()==1)
    {
      return true;
    }
   
  }
 
}

?>