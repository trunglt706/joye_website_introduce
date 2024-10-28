<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';

    protected $fillable = [
        'name',
        'image',
        'description',
        'status',
        'link',
        'group_id',
        'truy_cap',
        'doanh_thu'
    ];

    protected $hidden = [];
    protected $casts = [];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_ACTIVE;
        });
        self::created(function ($model) {
            Cache::forget(GUEST_PROJECT);
        });
        self::updated(function ($model) {
            Cache::forget(GUEST_PROJECT);
        });
        self::deleted(function ($model) {
            Cache::forget(GUEST_PROJECT);
            if ($model->image) {
                delete_file($model->image);
            }
        });
    }

    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';

    public static function get_status($status = '')
    {
        $_status = [
            self::STATUS_ACTIVE => ['Đang kích hoạt', 'success'],
            self::STATUS_BLOCKED => ['Đã khóa', 'danger'],
        ];
        return $status == '' ? $_status : $_status["$status"];
    }

    public function scopeGroupId($query, $group_id)
    {
        return $query->where('projects.group_id', $group_id);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('projects.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('projects.description', 'LIKE', "%$search%")
                ->orWhere('projects.name', 'LIKE', "%$search%");
        });
    }

    public function group()
    {
        return $this->belongsTo(ServiceGroup::class, 'group_id');
    }
}
