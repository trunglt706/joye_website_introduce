<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';

    protected $fillable = [
        'code',
        'name',
        'description',
        'status',
        'numering',
    ];

    protected $hidden = [];

    protected $casts = [];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = $model->code ?? generateRandomString();
            $model->status = $model->status ?? self::STATUS_ACTIVE;
            $model->numering = $model->numering ?? self::getOrder();
        });
        self::created(function ($model) {
            Cache::forget('guest-faq');
        });
        self::updated(function ($model) {
            Cache::forget('guest-faq');
        });
        self::deleted(function ($model) {
            Cache::forget('guest-faq');
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
        return $query->where('questions.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('questions.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('questions.code', 'LIKE', "%$search%")
                ->orWhere('questions.name', 'LIKE', "%$search%");
        });
    }

    public static function getOrder()
    {
        $max = Question::max('numering') ?? 0;
        return $max + 1;
    }
}
