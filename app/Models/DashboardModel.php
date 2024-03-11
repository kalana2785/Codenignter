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
       'type_name'
  

   ];
   // join the catogory table and items table
   public function getDashboardData()
   {
       $this->join('category category ', 'items.catogory = category.Cid');
       $this->join('type type', 'items.type_name = type.type_id');
       $query = $this->select('items.id, items.item_name, category.Category_Name AS category_name, type.type_name, items.quntity, items.Date');
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
