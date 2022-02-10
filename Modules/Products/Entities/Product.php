<?php

namespace Modules\Products\Entities;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Wildside\Userstamps\Userstamps;

class Product extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, Userstamps;

    protected $fillable = [
        'id',
        'cat_id',
        'price',
        'created_at',
        'updated_at'
    ];

    protected $append = [
        'default_name',
        'name'
    ];

    protected static function newFactory()
    {
        return \Modules\Products\Database\factories\ProductFactory::new();
    }

    /**
     * get the default name of the product dependent on the default language
     */
    public function getDefaultNameAttribute()
    {
        $product = $this->translations->where('language_id', Language::where('code', config('app.default_locale'))->select('id')->first()->id)->first();
        return $product ? $product->name : null;
    }

    /**
     * get the name of the product dependent on the current language
     */
    public function getNameAttribute()
    {
        $product = $this->translations->where('language_id', Language::where('code', App::getLocale())->select('id')->first()->id)->first();
        return $product ? $product->name : null;
    }

    /**
     * get the category of the product
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    /**
     * get the translations of the product
     */
    public function translations()
    {
        return $this->hasMany(ProductTranslation::class, 'product_id');
    }
}
