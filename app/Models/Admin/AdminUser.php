<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "admin_users";

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at', 'password', 'remember_token'
    ];
    protected $guarded = []; // YOLO

    protected $dates = ['deleted_at'];

    protected $appends = ['status_name'];

    public function  getStatusNameAttribute()
    {
        return ((int) $this->status == 1) ? "Active" : "InActive";
    }
}
