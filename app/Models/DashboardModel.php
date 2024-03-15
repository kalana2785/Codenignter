<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
   protected $table ='items';
   protected $primaryKey ='id';
   protected $allowedFields =
   [
       'item_name',
       'catogory',
       'quntity',
       'type_name',
       'Sn_number',
       'BN_number',
       'Med_date',
       'Exp_date',
       'W_start',
       'W_end'

  

   ];
   // join the catogory table and items table
   public function getDashboardData($category = null)
    {
       
        $query = $this->select('*')
            ->join('category', 'items.catogory = category.Cid')
            ->join('type', 'items.type_name = type.type_id');
            
           
       
        if ($category !== null) {
            $query->where('items.catogory', $category);
        }

       
        return $query->findAll();
    }
   
    public function getAdminDashboardData($category = null)
    {
       
        $query = $this->select('*')
            ->join('category', 'items.catogory = category.Cid')
            ->join('type', 'items.type_name = type.type_id')
            ->join('demand','items.id = demand.Items_id');
            
           
       
        if ($category !== null) {
            $query->where('items.catogory', $category);
        }

       
        return $query->findAll();
    }
   
   // DashboardModel.php
  /*
   public function getDashboardData()
   {
    $this->join('type', 'items.type_name = type.type_id');
    $this->join('category', 'type.type_id = category.Cid');
    $query = $this->select('items.*, type.*, category.*');
    return $query->findAll();
   }
// ...
*/
}

?>
