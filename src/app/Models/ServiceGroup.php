<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ServiceGroup extends Model
{
    use HasFactory;
    protected $table = 'service_groups';

    protected $fillable = [
        'slug',
        'name',
        'image',
        'status',
        'description',
        'icon'
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
        self::created(function ($model) {
            Cache::forget(GUEST_SERVICE_GROUP);
            Cache::forget(GUEST_SERVICE_GROUP_SHORT);
        });
        self::updated(function ($model) {
            Cache::forget(GUEST_SERVICE_GROUP);
            Cache::forget(GUEST_SERVICE_GROUP_SHORT);
        });
        self::deleted(function ($model) {
            Cache::forget(GUEST_SERVICE_GROUP);
            Cache::forget(GUEST_SERVICE_GROUP_SHORT);
            if ($model->image) {
                delete_file($model->image);
            }
            if ($model->icon) {
                delete_file($model->icon);
            }
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

    public function scopeOfSlug($query, $slug)
    {
        return $query->where('service_groups.slug', $slug);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('service_groups.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('service_groups.name', 'LIKE', "%$search%");
        });
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'group_id');
    }
}
