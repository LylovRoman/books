<?php

namespace App\Exports;

use App\Models\BookUser;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class BookUserExport implements FromQuery
{
    use Exportable;

    public function query()
    {
        return BookUser::with('book')->with('user');
    }
}
