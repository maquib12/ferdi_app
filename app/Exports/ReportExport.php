<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;
class ReportExport implements  WithMapping,
 WithHeadings,ShouldAutoSize,FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
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
    	if(isset($user->user_name)){
        return [
            $user->user_name,
            $user->user_type,
            $user->earned_commission,
            $user->reg_credit_points,
            $user->earned_credit_points,
        ];
        }else{
            return[];
        }
    }

     public function headings(): array
    {
        return [
            'Users',
            'Users Types',
            'Commissions',
            'Loyalty Bonus Given',
            'Loyalty Bonus Earn',
        ];
    }
}
