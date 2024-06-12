<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            '#',
            'First name',
            'Last name',
            'Email',
        ];
    }
    public function collection()
    {
        return User::select('id', 'first_name', 'last_name', 'email')->get();
    }
}
