<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    protected $fillable = [
        'slug',
        'name',
        'image',
        'description',
        'content',
        'status',
        'price',
        'dinh_kem',
        'cam_ket',
        'group_id'
    ];

    protected $hidden = [];
    protected $casts = [];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->slug = $model->slug ?? Str::slug($model->name);
            $model->status = $model->status ?? self::STATUS_ACTIVE;
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

    public function scopeOfSlug($query, $slug)
    {
        return $query->where('services.slug', $slug);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('services.status', $status);
    }

    public function scopeGroupId($query, $group_id)
    {
        return $query->where('services.group_id', $group_id);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('services.name', 'LIKE', "%$search%");
        });
    }

    public function group()
    {
        return $this->belongsTo(ServiceGroup::class, 'group_id');
    }
}
