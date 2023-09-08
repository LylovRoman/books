<?php

namespace App\Http\Controllers\Export;

use App\Exports\BooksExport;
use App\Exports\BookUserExport;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookUser;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class BookUserExportController extends Controller
{
    public function csv()
    {
        return Excel::download(new BookUserExport(), 'books.csv');
    }

    public function xls()
    {
        return Excel::download(new BookUserExport(), 'books.xls');
    }

    public function pdf()
    {
        $bookusers = BookUser::all();

        return PDF::loadView('pdf.bookuser', compact('bookusers'))->download('bookuser.pdf');
    }
}
