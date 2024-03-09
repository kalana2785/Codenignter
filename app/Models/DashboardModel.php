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
       'quntity'
  

   ];
   // join the catogory table and items table
   public function getDashboardData()
   {
       
       $this->join('category', 'items.catogory = category.Cid');
       $query = $this->select('items.id, items.`item_name` as item_name, items.catogory, items.quntity, items.Date, category.Cid, category.`Category Name` as category_name');
       return $query->findAll();
   }
}

?>
