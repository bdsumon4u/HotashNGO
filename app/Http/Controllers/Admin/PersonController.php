<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

class PersonController extends Controller
{
    private string $collection = 'people';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Media::with('media')
            ->firstOrCreate(['collection' => $this->collection])
            ->media()
            ->where('collection_name', $this->collection)
            ->latest('id')
            ->paginate(12);

        return view('admin.people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.people.editor', [
            'person' => new SpatieMedia(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image',
            'name' => 'required|string|max:35',
            'designation' => 'required|string|max:35',
            'facebook' => 'nullable|string|max:100',
            'twitter' => 'nullable|string|max:100',
            'instagram' => 'nullable|string|max:100',
            'youtube' => 'nullable|string|max:100',
        ]);

        $this->personMaker($data);

        $this->banner('New Person is Added.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SpatieMedia $person
     * @return \Illuminate\Http\Response
     */
    public function edit(SpatieMedia $person)
    {
        return view('admin.people.editor', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param SpatieMedia $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpatieMedia $person)
    {
        $data = $request->validate([
            'image' => 'nullable|image',
            'name' => 'required|string|max:35',
            'designation' => 'required|string|max:35',
            'facebook' => 'nullable|string|max:100',
            'twitter' => 'nullable|string|max:100',
            'instagram' => 'nullable|string|max:100',
            'youtube' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            $this->personMaker($data);
            $person->delete();
        } else {
            $person->setCustomProperty('name', $data['name']);
            $person->setCustomProperty('designation', $data['designation']);
            $person->setCustomProperty('facebook', $data['facebook']);
            $person->setCustomProperty('twitter', $data['twitter']);
            $person->setCustomProperty('instagram', $data['instagram']);
            $person->setCustomProperty('youtube', $data['youtube']);
            $person->save();
        }

        $this->banner('The Person is Updated.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SpatieMedia $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpatieMedia $person)
    {
        $person->delete();

        $this->banner('The Person is Deleted.');

        return back();
    }

    private function getFileName($file)
    {
        return Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
    }

    private function personMaker(array $data)
    {
        return Media::firstOrCreate(['collection' => $this->collection])
            ->addMedia($data['image'])
            ->usingFileName($this->getFileName($data['image']))
            ->withCustomProperties([
                'name' => $data['name'],
                'designation' => $data['designation'],
                'facebook' => $data['facebook'],
                'twitter' => $data['twitter'],
                'instagram' => $data['instagram'],
                'youtube' => $data['youtube'],
            ])
            ->toMediaCollection($this->collection);
    }
}
