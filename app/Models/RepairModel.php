<?php

namespace App\Models;

use CodeIgniter\Model;

class RepairModel extends Model
{
   protected $table ='repair';
   protected $primaryKey ='Re_id';
   protected $allowedFields =
   [
       'item_id',
       'Unit_id',
       'Comment',
       'status_id'
      

  

   ];



}