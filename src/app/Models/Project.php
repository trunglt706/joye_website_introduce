<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';

    protected $fillable = [
        'code',
        'name',
        'image',
        'description',
        'content',
        'status',
        'link',
        'project',
        'customer'
    ];

    protected $hidden = [];
    protected $casts = [];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_ACTIVE;
            $model->code = $model->code ?? Str::slug($model->name);
            $model->project = $model->project ?? 1;
            $model->customer = $model->customer ?? 1;
        });
        self::created(function ($model) {});
        self::updated(function ($model) {});
        self::deleted(function ($model) {
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

    public function scopeOfCustomer($query, $customer)
    {
        return $query->where('projects.customer', $customer);
    }

    public function scopeOfProject($query, $project)
    {
        return $query->where('projects.project', $project);
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('projects.code', $code);
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
}
