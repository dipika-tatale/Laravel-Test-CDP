<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];
    protected $guarded = []; // YOLO

    protected $dates = ['deleted_at'];

    protected $appends = ['status_name'];

    public function  getStatusNameAttribute()
    {
        return ((int) $this->status == 1) ? "Active" : "InActive";
    }
}
