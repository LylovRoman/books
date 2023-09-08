<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookUser extends Model
{
    use HasFactory;

    protected $table = "book_user";

    protected $guarded = false;

    public function book() : BelongsTo {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
