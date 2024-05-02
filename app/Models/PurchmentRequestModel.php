<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchmentRequestModel extends Model
{
    protected $table = 'purchment_request';
    protected $primaryKey = 'id';
    protected $allowedFields = ['item_id', 'purchase_id'];

    // Optionally, you can define validation rules for the fields here
   
}
