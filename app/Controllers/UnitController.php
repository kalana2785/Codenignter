<?php


namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\UserModel;
use App\Models\UnitinventoryModel;
use App\Models\UnitrequestModel;

class UnitController extends BaseController
{
   

    private $userData;
    public function index(): string
    {      if (!session()->has('logged_user')) {
        return redirect()->to(route_to('index'));
    } else {
        $dashboardModel = new DashboardModel();
        $usermodel= new UserModel();
        $userinventory = new UnitinventoryModel();
        
// Fetch User_id based on Unit_id

$userIds = session()->get('logged_user');
$userData = [];

foreach ($userIds as $unitId) {
    $userData[] = $userinventory->join('items','unit_inventory.item_id = items.id')->where('Unit_id', $unitId)->findAll();
}

$data['userData'] = $userData;


$catogory=2;
$userData[] = $userinventory->join('items','unit_inventory.item_id = items.id')
                             ->where('Unit_id', $unitId)
                             ->where('C_id', $catogory)
                             ->findAll();



$data['SugicalData'] = $userData;



// create user session
$Unituserid = session()->get('login_user');
       
            
$this->userData =$usermodel->getlogindata($Unituserid);
$data['unituserdata'] = $this->userData;


return view('Unit/dashboard', $data);
    }


    
  }

// items request page

public function req($id = null)
{

    $userinventory = new UnitinventoryModel();
 
    $data['unititems'] = $userinventory->join('items','unit_inventory.item_id = items.id')->find($id);
    
   
    return view('Unit/req.php', $data);
}




public function request()
{

  $unitrequest = new UnitrequestModel(); 

  $existingItem = $unitrequest->where([
    'item_id' => $this->request->getPost('item_id'),
    'req_unit' => $this->request->getPost('unit')
])->first();

if ($existingItem) {
    
    return redirect()->back()->with('error', 'Item request already exists.');
}

else{

$data = [
    'item_id' => $this->request->getPost('item_id'),
    'req_unit' => $this->request->getPost('unit'),
    'req_quntity' => $this->request->getPost('Quntity')

  
];

$unitrequest->save($data);
return redirect()->back()->withInput()->with('status', 'Item Request Successfully');

}
}


}
