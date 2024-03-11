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
       
       $this->join('category', 'items.catogory = category.Cid');
       $this->join('type', 'category.Cid = type.Cid', 'left'); 
       $query = $this->select('items.id, items.`item_name` as item_name, items.catogory, items.quntity, items.Date, category.Cid, category.`Category_Name` as category_name,type.type_id, type.type_name');
       return $query->findAll();
   }

   // DashboardModel.php

// ...

}

?>
