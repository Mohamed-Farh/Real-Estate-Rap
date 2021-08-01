<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Feature;
use App\Models\Property;
use Prophecy\Prophet;

class FeatureController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::all();

        return view('pages.admin.features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         try {
            $rules = [
                'name_ar' => 'required|string|min:3|max:30',
                'name_en' => 'required|string|min:3|max:30',
            ];
            $this->validate($request, $rules);

            $feature = new Feature();
            $feature->name_ar = $request->name_ar;
            $feature->name_en = $request->name_en;
            $feature->Notes = $request->Notes;
            $feature->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('features.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $rules = [
                'name_ar' => 'required|string|min:3|max:30',
                'name_en' => 'required|string|min:3|max:30',
            ];
            $this->validate($request, $rules);

            $feature = Feature::findOrFail($request->id);
            $feature->update([
                $feature->name_ar = $request->name_ar,
                $feature->name_en = $request->name_en,
                $feature->Notes   = strip_tags($request->Notes),
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('features.index');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $related_property = Property::findOrFail(1)->features()->where('feature_id', $request->id)->pluck('feature_id');

        if($related_property->count() == 0){
            $features = Feature::findOrFail($request->id)->delete();
            toastr()->error(trans('messages.Delete'));
            return redirect()->route('features.index');
        }else{
            toastr()->error(trans('feature_trans.delete_feature_Error'));
            return redirect()->route('features.index');
        }
    }
}
