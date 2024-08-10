<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogGroup extends Model
{
    use HasFactory;
    protected $table = 'blog_groups';

    protected $fillable = [
        'slug',
        'code',
        'name',
        'image',
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
            $model->slug = $model->slug ?? Str::slug($model->name);
            $model->status = $model->status ?? self::STATUS_ACTIVE;
        });
        self::created(function ($model) {});
        self::updated(function ($model) {});
        self::deleted(function ($model) {});
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

    public function scopeOfSlug($query, $slug)
    {
        return $query->where('blog_groups.slug', $slug);
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('blog_groups.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('blog_groups.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('blog_groups.code', 'LIKE', "%$search%")
                ->orWhere('blog_groups.name', 'LIKE', "%$search%");
        });
    }
}
