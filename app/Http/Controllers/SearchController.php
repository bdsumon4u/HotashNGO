<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $news = News::whereTranslationLike('title', '%'.$request->q.'%')->paginate(8);
        $events = Event::whereTranslationLike('title', '%'.$request->q.'%')->paginate(8);

        return view('pages.search', compact('news', 'events'));
    }
}
