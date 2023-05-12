<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    use HasFactory;
    protected $fillable = [
        'modul_name',
        'system_name',
        'description',
        'ordering',
        'file_name',
        'class_name',
    ];

    protected $guarded = ['id'];

    public function system()
    {
        return $this->belongsTo(system::class,'system_name');
    }
    public function action()
    {
        return $this->belongsTo(action::class);
    }

    protected $table =
        'module';
}
