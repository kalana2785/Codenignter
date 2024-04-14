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
       $query = $this->select('unit_inventory.*, items.*')
                     ->join('items', 'unit_inventory.item_id = items.id')
                     ->whereIn('unit_inventory.Unit_id', $userIds);
   
       if ($categoryId !== null) {
           $query->where('unit_inventory.C_id', $categoryId);
       }
   
       return $query->findAll();
   }
   
   public function updateByUnitAndItem($unitId, $itemId, $data)
   {
       $builder = $this->db->table($this->table);
       $builder->where('Unit_id', $unitId);
       $builder->where('item_id', $itemId);
 
       if ($builder->update($data)) {
        // Return true if update was successful
        return true;
    } else {
        // Return false or an error message if update failed
        return 'Failed to update quantity.';
    }

  

       
   } 

      public function getUnitData ($category = null,$unitId = null)
    {
       
        $query = $this->select('*')
        ->join('items','unit_inventory.item_id = items.id');
            
           
       
        if ($category !== null) {
            
            $query->where('unit_inventory.C_id', $category);
            $query->where('unit_inventory. Unit_id', $unitId);
       

        }

       
        return $query->findAll();
    }
   
}
?>