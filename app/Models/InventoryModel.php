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
        'C_id',
       'Sn_number',
       'BN_number',
       'Med_date',
       'Exp_date',
       'W_start',
       'W_end',
       'In_quntity',
       'Approval_status'

  

   ];

   public function getDashboardData($category = null)
   {
      
       $query = $this->select('*')
       ->join('items', 'inventory_items.item_id = items.id');
           
          
      
       if ($category !== null) {
           $query->where('inventory_items.C_id', $category);
           
       }

      
       return $query->findAll();
   }
}