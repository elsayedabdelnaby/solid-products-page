<?php

namespace Modules\Products\Entities;

use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;

class ProductTranslation extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, Userstamps;

    protected $table = 'product_translations';
    protected $fillable = [
        'product_id',
        'language_id',
        'name',
        'created_at',
        'updated_at'
    ];

    protected static function newFactory()
    {
        return \Modules\Products\Database\factories\ProductTranslationFactory::new();
    }

    /**
     * get the product of the translation
     */
    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * get the language of the translation
     */
    public function language(){
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
