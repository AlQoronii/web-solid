<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'book_id';
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot(){
        parent::boot();

        static::creating(function ($books) {
            $books->book_id = UuidV4::uuid4()->toString();
        });
    }

    protected $fillable = [
        'category_id',
        'book_title',
        'book_author',
        'book_publisher',
        'book_year',
        'book_image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function loan()
    {
        return $this->hasMany(Loan::class, 'book_id', 'book_id');
    }

    

}
