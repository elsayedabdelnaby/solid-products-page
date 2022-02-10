<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Category extends Model
{
    use HasFactory, LogsActivity, Userstamps, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];

    protected static function newFactory()
    {
        return \Modules\Products\Database\factories\CategoryFactory::new();
    }

    /**
     * return all products of the category
     */
    public function products(){
        return $this->hasMany(Product::class, 'cat_id', 'id');
    }
}
