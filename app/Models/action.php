<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class action extends Model
{
    use HasFactory;
    protected $fillable = [
        'action_name',
        'system_name',
        'description',
        'ordering',
        'route',
        'function',
    ];

    protected $guarded = ['id'];

    public function module()
    {
        return $this->belongsTo(module::class,'system_name');
    }

    public function permision()
    {
        return $this->belongsTo(permision::class);
    }


    protected $table =
        'actions';
}
