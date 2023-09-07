<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class BooksExport implements FromQuery
{
    use Exportable;

    public function query()
    {
        return Book::with('author');
    }
}
