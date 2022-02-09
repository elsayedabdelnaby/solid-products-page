<?php

namespace App\Http\Controllers\Actions\Languages;

use App\Http\Resources\LanguageResource;
use App\Models\Language;

class GetAllLanuagesAction
{
    /**
     * return all languages
     */
    public function execute()
    {
        return LanguageResource::collection(Language::all());
    }
}
