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
        'name',
        'image',
        'description',
        'content',
        'background',
        'status',
        'muc_luc',
    ];

    protected $hidden = [];
    protected $casts = [];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->slug = $model->slug ?? Str::slug($model->name);
            $model->status = $model->status ?? self::STATUS_UN_ACTIVE;
        });
        self::created(function ($model) {});
        self::updated(function ($model) {});
        self::deleted(function ($model) {
            if ($model->image) {
                delete_file($model->image);
            }
            if ($model->background) {
                delete_file($model->background);
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
            $query->where('blogs.name', 'LIKE', "%$search%");
        });
    }

    public function group()
    {
        return $this->belongsTo(BlogGroup::class, 'group_id');
    }
}
