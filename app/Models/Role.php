<?php

namespace App\Models;

use Faker\Core\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Ramsey\Uuid\Rfc4122\UuidV4;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'role_id';
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($roles) {
            $roles->role_id = UuidV4::uuid4()->toString();
        });
    }

    protected $fillable = [
        'role_name',
        'role_description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'role_id');
    }
}
