<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;
class UsersExport implements  WithMapping,
 WithHeadings,ShouldAutoSize,FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return User::with('userdetails.city')->get();
    // }
    protected $userdata;

    public function __construct(array $userdata)
    {
        $this->userdata = $userdata;
    }

    public function array(): array
    {
        return $this->userdata;
    }

    public function map($user): array
    {
    	
  
        return [
            $user['name'],
            $user['email'],
            $user['userdetails']['city']['name'],
           UsersExport::usertype($user['user_type_id']),
            UsersExport::userstatus($user['status']),
        ];
    }

     public function headings(): array
    {
        return [
            'Name',
            'Email',
             'City',
            'User Type',
            'Status',
        ];
    }


     static function usertype($usertype)
    {
        switch ($usertype) {
  case 1:
        return 'Super Admin';

    break;
  case 2:
    return 'Admin';
    break;
  case 3:
  return 'Mentor';
    break;
     case 4:
    return 'Facilitator';
    break;
  case 5:
    return 'Sponsor';
    break;
  case 6:
    return 'Student';
    break;
    case 7:
     return 'Sub Admin';
    break;
 
}

    }

static function userstatus($userstatus){
     switch ($userstatus) {
  case 0:
        return 'InActive';

    break;
  case 1:
    return 'active';
    break;
  case 2:
  return 'Requested';
    break;
     case 3:
    return 'Rejected';
    break;
  case 5:
    return 'Blocked	';
    break;
   
                      }
     }
}
