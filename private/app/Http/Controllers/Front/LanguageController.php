<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    /**
     * Change language.
     *
     * @param  string $lang
     * @return \Illuminate\Http\Response
     */
    public function __invoke($lang)
    {
        $language = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');        
        session()->set('locale', $language);
        app()->setLocale(session()->get('locale'));
        return back();
    }
}
