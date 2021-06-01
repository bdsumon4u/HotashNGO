<?php

namespace JoeDixon\Translation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use JoeDixon\Translation\Drivers\Translation;
use JoeDixon\Translation\Http\Requests\LanguageRequest;

class LanguageController extends Controller
{
    private $translation;

    public function __construct(Translation $translation)
    {
        app()->setLocale('en');
        $this->translation = $translation;
    }

    public function index(Request $request)
    {
        app()->setLocale('en');
        $this->translation->saveMissingTranslations(false);
        return redirect()->action([LanguageTranslationController::class, 'index'], ['bn', 'group' => 'single']);

        $languages = $this->translation->allLanguages();

        return view('translation::languages.index', compact('languages'));
    }

    public function create()
    {
        app()->setLocale('en');
        return view('translation::languages.create');
    }

    public function store(LanguageRequest $request)
    {
        app()->setLocale('en');
        $this->translation->addLanguage($request->locale, $request->name);

        return redirect()
            ->route('languages.index')
            ->with('success', __('translation::translation.language_added'));
    }
}
