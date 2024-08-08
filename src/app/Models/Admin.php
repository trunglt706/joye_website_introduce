<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'admins';

    protected $fillable = [
        'code',
        'name',
        'phone',
        'email',
        'password',
        'description',
        'status',
        'last_login',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'last_login' => 'timestamp'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_ACTIVE;
            $model->code = $model->code ?? generateRandomString(8, true);
        });
        self::created(function ($model) {
        });
        self::updating(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';

    public static function get_status($status = '')
    {
        $_status = [
            self::STATUS_ACTIVE => ['Đang kích hoạt', 'success'],
            self::STATUS_BLOCKED => ['Đã bị khóa', 'danger'],
        ];
        return $status == '' ? $_status : $_status["$status"];
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('admins.code', $code);
    }

    public function scopeOfEmail($query, $email)
    {
        return $query->where('admins.email', $email);
    }

    public function scopeOfPhone($query, $phone)
    {
        return $query->where('admins.phone', $phone);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('admins.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->whereAny(['admins.code', 'admins.name', 'admins.phone', 'admins.email'], 'like', "%$search%");
    }
}
