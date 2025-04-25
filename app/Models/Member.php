<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
    ];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_members')
            ->withPivot('borrowed_date', 'due_date')
            ->withTimestamps();
    }
}
