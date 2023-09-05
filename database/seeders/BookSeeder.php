<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $author = Author::create([
            'name' => 'Пушкин'
        ]);
        Book::create([
            'name' => 'Золотая рыбка',
            'author_id' => $author->id
        ]);
        Book::create([
            'name' => 'Евгений Онегин',
            'author_id' => $author->id
        ]);
        Book::create([
            'name' => 'Дубровский',
            'author_id' => $author->id
        ]);

        $author = Author::create([
            'name' => 'Достоевский'
        ]);
        Book::create([
            'name' => 'Преступление и наказание',
            'author_id' => $author->id
        ]);
        Book::create([
            'name' => 'Идиот',
            'author_id' => $author->id
        ]);
        Book::create([
            'name' => 'Белые ночи',
            'author_id' => $author->id
        ]);

        $author = Author::create([
            'name' => 'Гоголь'
        ]);
        Book::create([
            'name' => 'Тарас Бульба',
            'author_id' => $author->id
        ]);
        Book::create([
            'name' => 'Мёртвые души',
            'author_id' => $author->id
        ]);
        Book::create([
            'name' => 'Ревизор',
            'author_id' => $author->id
        ]);
    }
}
