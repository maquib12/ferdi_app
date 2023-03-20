<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;
class LoyaltyExport implements  WithMapping,
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
            $user->credited,
            $user->debited,
            $user->total_point,
        ];
        }else{
            return[];
        }
    }

     public function headings(): array
    {
        return [
            'User name',
            'Total Credit',
            'Total Debit',
            'Total Points',
        ];
    }
}
