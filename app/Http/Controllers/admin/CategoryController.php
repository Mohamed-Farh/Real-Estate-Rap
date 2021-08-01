<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Property;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('pages.admin.categories.index', compact('categories'));
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

            $category = new Category();
            $category->name_ar = $request->name_ar;
            $category->name_en = $request->name_en;
            $category->Notes = $request->Notes;
            $category->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('categories.index');
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

            $category = Category::findOrFail($request->id);
            $category->update([
                $category->name_ar = $request->name_ar,
                $category->name_en = $request->name_en,
                $category->Notes   = strip_tags($request->Notes),
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('categories.index');
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
        $related_property = Property::where('category_id', $request->id)->pluck('category_id');

        if($related_property->count() == 0){
            $categories = Category::findOrFail($request->id)->delete();
            toastr()->error(trans('messages.Delete'));
            return redirect()->route('categories.index');
        }else{
            toastr()->error(trans('category_trans.delete_category_Error'));
            return redirect()->route('categories.index');
        }
    }
}
