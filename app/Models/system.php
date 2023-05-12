<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class system extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'ordering',
        'description',
    ];

    protected $guarded = ['id'];

    public function module()
    {
        return $this->belongsTo(module::class);
    }

    // public function action()
    // {
    //     return $this->belongsTo(action::class);
    // }


    protected $table =
        'system';
}
