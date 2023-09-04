<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    public function list() : JsonResponse
    {
        return response()->json([
            'data' => Book::all()
        ], 200);
    }

    public function byId($id) : JsonResponse
    {
        return response()->json([
            'data' => Book::find($id)
        ], 200);
    }

    public function update(BookRequest $request) : JsonResponse
    {
        $validated = $request->validated();

        return response()->json([
            'data' => Book::query()->updateOrCreate([
                'name' => $validated['name'],
                'author_id' => $validated['author_id']
            ])
        ], 200);
    }

    public function destroy($id) : JsonResponse
    {
        Book::find($id)->delete();
        return response()->json([], 204);
    }
}
