<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = [
        'code',
        'name',
        'email',
        'description',
        'status',
        'group_id'
    ];
    protected $hidden = [];
    protected $casts = [];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = $model->code ?? generateRandomString();
            $model->status = $model->status ?? self::STATUS_UN_ACTIVE;
        });
        self::created(function ($model) {});
        self::updated(function ($model) {});
        self::deleted(function ($model) {});
    }

    const STATUS_UN_ACTIVE = 'un_active';
    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';

    public static function get_status($status = '')
    {
        $_status = [
            self::STATUS_UN_ACTIVE => ['Chưa duyệt', 'dark'],
            self::STATUS_ACTIVE => ['Đã xử lý', 'success'],
            self::STATUS_BLOCKED => ['Không xử lý', 'danger'],
        ];
        return $status == '' ? $_status : $_status["$status"];
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('contacts.status', $status);
    }

    public function scopeOfCode($query, $status)
    {
        return $query->where('contacts.status', $status);
    }

    public function scopeOfEmail($query, $email)
    {
        return $query->where('contacts.email', $email);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('contacts.code', 'LIKE', "%$search%")
                ->orWhere('contacts.name', 'LIKE', "%$search%")
                ->orWhere('contacts.email', 'LIKE', "%$search%");
        });
    }

    public function group()
    {
        return $this->belongsTo(ServiceGroup::class, 'group_id');
    }
}
