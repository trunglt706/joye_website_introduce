<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    use HasFactory;
    protected $table = 'admin_logs';

    protected $fillable = [
        'admin_id',
        'ip',
        'link',
        'content',
        'payload',
        'code',
    ];

    protected $hidden = [];

    protected $casts = [
        'admin_id' => 'integer',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->admin_id = $model->admin_id ?? (auth('admin')->check() ? auth('admin')->user()->id : null);
            $model->ip = $model->ip ?? request()->ip();
            $model->payload = $model->payload ?? json_encode(request()->all());
            $model->code = $model->code ?? generateRandomString();
        });
        self::created(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    public function scopeAdminId($query, $admin_id)
    {
        return $query->where('admin_logs.admin_id', $admin_id);
    }

    public function scopeOfMe($query)
    {
        return $query->where('admin_logs.admin_id', auth('admin')->user()->id);
    }

    public function scopeOfIp($query, $ip)
    {
        return $query->where('admin_logs.ip', $ip);
    }

    public function scopeSearch($query, $search)
    {
        return $query->whereAny(['admin_logs.ip', 'admin_logs.content'], 'like', "%$search%");
    }

    public function scopeOfDate($query, $date)
    {
        return $query->whereDate('admin_logs.created_at', Carbon::parse($date)->format('Y-m-d'));
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
