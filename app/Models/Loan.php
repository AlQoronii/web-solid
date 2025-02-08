<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

use Carbon\Carbon;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';
    protected $primaryKey = 'loan_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
        'return_date',
        'loan_status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Override getter loan_status untuk otomatis deteksi overdue
    public function getLoanStatusAttribute($value)
    {
        if ($value === 'returned') {
            return 'returned';
        }

        if ($this->return_date && Carbon::now()->gt($this->return_date)) {
            return 'overdue';
        }

        return $value;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'book_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($loans) {
            $loans->loan_id = UuidV4::uuid4()->toString();
        });
    }
}

