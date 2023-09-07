<?php

namespace App\Http\Controllers\Export;

use App\Exports\AuthorsExport;
use App\Http\Controllers\Controller;
use App\Models\Author;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class AuthorExportController extends Controller
{
    public function csv()
    {
        return Excel::download(new AuthorsExport(), 'authors.csv');
    }

    public function xls()
    {
        return Excel::download(new AuthorsExport(), 'authors.xls');
    }

    public function pdf()
    {
        $authors = Author::query()->withCount('books')->get();

        return PDF::loadView('pdf.authors', compact('authors'))->download('authors.pdf');
    }
}
