<?php


namespace App\Models;
use CodeIgniter\Model;

class AdminitemrequestModel extends Model{

    protected $table ='admin_itemreq';
    protected $primaryKey ='Adminreq_id';
    protected $allowedFields =
    [
        'item_id',
        'req_unitid',
        'SN_number',
        'Approval_status'
       
   
 
    ];

}



?>