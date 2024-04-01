<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitinventoryModel extends Model
{
   protected $table ='unit_inventory';
   protected $primaryKey ='Uni_id';
   protected $allowedFields =
   [
       'item_id',
       'C_id',
       'Unit_id',
       'Quntity',
       'issue_date'
       

  

   ];
   public function getUnitDashboardData($userIds, int $categoryId = null)
   {  
       $query = $this->select('unit_inventory.*, items.*, unit.*')
                     ->join('items', 'unit_inventory.item_id = items.id')
                     ->join('unit', 'unit_inventory.Unit_id = unit.Unit_id')
                     ->whereIn('unit_inventory.User_id', $userIds);
   
       if ($categoryId !== null) {
           $query->where('unit_inventory.catogory', $categoryId);
       }
   
       return $query->findAll();
   }
   
  
}
?>