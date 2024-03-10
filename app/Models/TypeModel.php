<?php


namespace App\Models;
use CodeIgniter\Model;

class TypeModel extends Model{

    protected $table ='type';
    protected $primaryKey ='type_id';
    protected $allowedFields =
    [
        'Cid', 
        'type_name'
   
 
    ];

}



?>