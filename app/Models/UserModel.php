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
        'usergroup_id',
        'Unit_id',
        'update_at'
   
 
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
        $ui = $this->db->table('user');
        $ui->where('User_id', $id);
        $result = $ui->get();
    
        if ($result->getNumRows() == 1) {
            return $result->getRow();
        } else {
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
  public function updateAt($id)
  {
    $ui=$this->db->table('user');
        
    $ui->where('User_id',$id);

    $ui->update(['update_at'=>date('y-m-d h:i:s')]);

    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }



  public function verifytoken($token)
  {
      $ve = $this->db->table('user');
      $ve->select("User_id,Username,Password,update_at");
      $ve->where('User_id',$token);
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

    public function updatePassword($userId, $newPassword)
    {
        $data = [
            'Password' => password_hash($newPassword, PASSWORD_DEFAULT) 
        ];
    
        $this->where('User_id', $userId)
             ->set($data)
             ->update();
    
        return $this->db->affectedRows() > 0; 
    }
    public function verifyunit($unitid=null)
{
    $query = $this->select('*')
        ->join('unit', 'user.Unit_id = unit.Unit_id');

    if ($unitid !== null) {
        $query->where('user.Unit_id', $unitid);
    }

    $results = $query->get()->getResultArray();

    // Extracting 'Unit_id' values from the result array
    $unitIds = array_column($results, 'Unit_id');

    return $unitIds;
}


public function getUnitIdByUserId($unitId)
    {
        $query = $this->db->table('user')
                    ->select('Unit_id')
                    ->where('User_id', $unitId)
                    ->get()
                    ->getResultArray();

        $userIds = array_column($query, 'Unit_id');

        return $userIds;
    }

    
}

?>