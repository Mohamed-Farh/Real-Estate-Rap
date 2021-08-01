<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;
use File;
// use Facade\FlareClient\Stacktrace\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::where('type', 0)->paginate(16);

        return view('pages.admin.galleries.index', compact('galleries'));
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

                    $file->move('image/gallery/blog',$file_to_store);
                    Gallery::create([
                        'name' => $file_to_store,
                        'path' => 'image/gallery/blog/'.$file_to_store,
                        'type' => $request->type,
                    ]);
                }
            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('galleries.index');
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
            $gallery = Gallery::findOrFail($request->id);

            if($gallery->status == '0'){
                $gallery->update([
                    $gallery->status = '1',
                ]);
            }elseif($gallery->status == '1'){
                $gallery->update([
                    $gallery->status = '0',
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('galleries.index');
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
            $gallery = Gallery::findOrFail($request->id);

            if($gallery)
            {
                if (File::exists('image/gallery/blog/' .$gallery->name) ) {
                    unlink('image/gallery/blog/'.$gallery->name);
                }
                $gallery->delete();

                toastr()->error(trans('messages.Delete'));
                return redirect()->route('galleries.index');
            }
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
