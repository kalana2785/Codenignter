<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
   protected $table ='inventory_items';
   protected $primaryKey ='Inventory_id';
   protected $allowedFields =
   [
       'item_id',
    
       'Sn_number',
       'BN_number',
       'Med_date',
       'Exp_date',
       'W_start',
       'W_end',
       'In_quntity',
       'Approval_status'

  

   ];


}