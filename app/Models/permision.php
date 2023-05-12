<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permision extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'action_name',
        'description',
    ];

    protected $guarded = ['id'];

    public function action()
    {
        return $this->belongsTo(action::class,'action_name');
    }


    protected $table =
        'Permissions';
}
