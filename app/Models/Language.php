<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'languages';
    protected $fillable = [
        'id', 'code', 'created_at', 'updated_at'
    ];
}
