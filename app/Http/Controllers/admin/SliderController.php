<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Gallery::where('type', 1)->paginate(16);

        return view('pages.admin.sliders.index', compact('sliders'));
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
            $request->validate([
                'files' => 'required',
            ]);

            $input=$request->all();
            if($files=$request->file('files')){
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $fileextention =$file->getClientOriginalExtension();  //get Extention of Image
                    $file_to_store=time().'_'.explode('.',$name)[0].'_.'.$fileextention;

                    $file->move('image/gallery/slider',$file_to_store);
                    Gallery::create([
                        'name' => $file_to_store,
                        'path' => 'image/gallery/slider/'.$file_to_store,
                        'type' => $request->type,
                    ]);
                }
            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('sliders.index');
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
            $slider = Gallery::findOrFail($request->id);

            if($slider->status == '0'){
                $slider->update([
                    $slider->status = '1',
                ]);
            }elseif($slider->status == '1'){
                $slider->update([
                    $slider->status = '0',
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('sliders.index');
        }
        catch (\Exception $e){
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
        try {
            $slider = Gallery::findOrFail($request->id);

            if($slider)
            {
                if (File::exists('image/gallery/slider/' .$slider->name) ) {
                    unlink('image/gallery/slider/'.$slider->name);
                }
                $slider->delete();

                toastr()->error(trans('messages.Delete'));
                return redirect()->back();
            }
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
