<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseOrderModel extends Model
{
    protected $table = 'purchase_order_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['item_id','purchase_id'];

  
}