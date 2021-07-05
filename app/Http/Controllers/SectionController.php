<?php

namespace App\Http\Controllers;

use App\Settings\MissionSettings;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $tab)
    {
        if ($request->isMethod('GET')) {
            return view('admin.sections');
        }

        $settings = resolve('App\\Settings\\'.ucfirst($tab).'Settings');
        $settings->fill($request->all())->save();
        $this->banner('Successfully Saved The Data.');
        return back();
    }
}
