<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    use HasFactory;
    protected $table = 'admin_menus';

    protected $fillable = [
        'parent_id',
        'name',
        'status',
        'route_name',
        'icon',
        'numering',
        'active_route_name',
        'roles'
    ];

    protected $hidden = [];

    protected $casts = [
        'parent_id' => 'integer',
        'numering' => 'integer',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_ACTIVE;
            $parent_id = $model->parent_id ?? null;
            $model->parent_id = $parent_id;
            $model->numering = $model->numering ?? self::getOrder($parent_id);
        });
        self::created(function ($model) {
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
            self::STATUS_ACTIVE => ['Đang kích hoạt', 'success', COLOR_SUCCESS],
            self::STATUS_BLOCKED => ['Đã bị khóa', 'danger', COLOR_DANGER],
        ];
        return $status == '' ? $_status : $_status["$status"];
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('admin_menus.status', $status);
    }

    public function scopeParentId($query, $parent_id)
    {
        return $query->where('admin_menus.parent_id', $parent_id);
    }

    public function scopeSearch($query, $search)
    {
        return $query->whereAny(['admin_menus.code', 'admin_menus.name'], 'like', "%$search%");
    }

    public function parent()
    {
        return $this->belongsTo(AdminMenu::class, 'parent_id');
    }

    public function menus()
    {
        return $this->hasMany(AdminMenu::class, 'parent_id', 'id')->ofStatus(AdminMenu::STATUS_ACTIVE)->orderBy('numering', 'asc');
    }

    public function menusSettings()
    {
        return $this->hasMany(AdminMenu::class, 'parent_id', 'id')->orderBy('numering', 'asc');
    }

    public static function getOrder($parent_id)
    {
        $max = AdminMenu::parentId($parent_id)->max('numering') ?? 0;
        return $max + 1;
    }
}
