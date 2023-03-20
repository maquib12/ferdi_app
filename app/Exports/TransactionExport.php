<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;
class TransactionExport implements  WithMapping,
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
    	if(isset($user['user']['name'])){
        return [
            $user['user']['name'],
            $user['user']['user_type']['user_type'],
            $user['transaction_type'],
            $user['amount'],
        ];
        }else{
            return[];
        }
    }

     public function headings(): array
    {
        return [
            'User Name',
            'User Type',
            'Transaction Type',
            'Amount',
        ];
    }
}
