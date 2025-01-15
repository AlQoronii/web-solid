<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $keyType = 'string';  
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($categories) {
            $categories->category_id = UuidV4::uuid4()->toString();
        });
    }

    protected $fillable = [
        'category_name',
        'category_description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

}
