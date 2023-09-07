<?php

namespace App\Http\Controllers\Export;

use App\Exports\BooksExport;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class BookExportController extends Controller
{
    public function csv()
    {
        return Excel::download(new BooksExport(), 'books.csv');
    }

    public function xls()
    {
        return Excel::download(new BooksExport(), 'books.xls');
    }

    public function pdf()
    {
        $books = Book::all();

        return PDF::loadView('pdf.books', compact('books'))->download('books.pdf');
    }
}
