<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitrequestModel extends Model
{
   protected $table ='unit_request';
   protected $primaryKey ='req_no';
   protected $allowedFields =
   [
       'item_id',
       'req_unit',
       'req_quntity',
       'status',
       'Date'
     

  

   ];
}