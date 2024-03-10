<?php


namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model{

    protected $table ='category';
    protected $primaryKey ='Cid';
    protected $allowedFields =
    [
        'Category_Name'
       
   
 
    ];

}



?>