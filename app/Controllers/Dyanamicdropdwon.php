<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class  Dyanamicdropdwon extends BaseController

{

 function index()
 {
    $catogoryModel = new CategoryModel();
    $data['catogory'] = $catogoryModel->orderby('Category_Name','ASC')->findAll();
    return view('iManger/Add_items.php', $data);

 }



}







?>