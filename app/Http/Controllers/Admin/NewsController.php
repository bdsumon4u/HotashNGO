<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('media', 'translations')
            ->latest('id')
            ->paginate(12);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.editor', [
            'news' => new News,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        News::create($request->validationData())
            ->addMedia($request->thumbnail)
            ->toMediaCollection('thumbnail');

        $this->banner('New News is Created.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.editor');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsRequest $request
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        $news->update($request->validationData());
        if ($request->hasFile('thumbnail')) {
            $news->clearMediaCollection('thumbnail');
            $news->addMedia($request->thumbnail)
                ->toMediaCollection('thumbnail');
        }

        $this->banner('The News is Updated.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        $this->banner('The News is Deleted.');

        return redirect()->action([static::class, 'index']);
    }
}
