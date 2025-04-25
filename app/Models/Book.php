<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'category_id',
        'publisher_id',
        'pages',
        'language',
        'isbn',
        'cover',
        'available',
        'description',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'book_members')
            ->withPivot('borrowed_date', 'due_date')
            ->withTimestamps();
    }
}
