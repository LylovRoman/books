<?php

namespace App\Exports;

use App\Models\Author;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class AuthorsExport implements FromQuery
{
    use Exportable;

    public function query()
    {
        return Author::query()->withCount('books');
    }
}
