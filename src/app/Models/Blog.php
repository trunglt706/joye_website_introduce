<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';

    protected $fillable = [
        'group_id',
        'slug',
        'code',
        'name',
        'image',
        'description',
        'content',
        'tags',
        'status',
        'important',
    ];

    protected $hidden = [];
    protected $casts = [];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = $model->code ?? generateRandomString();
            $model->slug = $model->slug ?? Str::slug($model->name);
            $model->status = $model->status ?? self::STATUS_UN_ACTIVE;
            $model->important = $model->important ?? 0;
        });
        self::created(function ($model) {});
        self::updated(function ($model) {});
        self::deleted(function ($model) {
            if ($model->image) {
                delete_file($model->image);
            }
        });
    }

    const STATUS_UN_ACTIVE = 'draft';
    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';

    public static function get_status($status = '')
    {
        $_status = [
            self::STATUS_UN_ACTIVE => ['Bản nháp', 'dark'],
            self::STATUS_ACTIVE => ['Đang kích hoạt', 'success'],
            self::STATUS_BLOCKED => ['Đã khóa', 'danger'],
        ];
        return $status == '' ? $_status : $_status["$status"];
    }

    public function scopeOfImportant($query, $important)
    {
        return $query->where('blogs.important', $important);
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('blogs.code', $code);
    }

    public function scopeOfSlug($query, $slug)
    {
        return $query->where('blogs.slug', $slug);
    }

    public function scopeGroupId($query, $group_id)
    {
        return $query->where('blogs.group_id', $group_id);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('blogs.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('blogs.code', 'LIKE', "%$search%")
                ->orWhere('blogs.name', 'LIKE', "%$search%")
                ->orWhereJsonContains('blogs.tags', $search);
        });
    }

    public function group()
    {
        return $this->belongsTo(BlogGroup::class, 'group_id');
    }
}
