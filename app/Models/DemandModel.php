<?php


namespace App\Models;
use CodeIgniter\Model;

class DemandModel extends Model{

    protected $table ='demand';
    protected $primaryKey ='Demand_id';
    protected $allowedFields =
    [
        'Items_id', 
        'overstock_value'
   
 
    ];
   
  


 
}

?>