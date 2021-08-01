<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Front\Aboutus;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.aboutus.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.aboutus.create');
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

            $aboutus = new Aboutus();
            $aboutus->aboutus_ar            =  strip_tags($request->aboutus_ar);
            $aboutus->aboutus_en            =  strip_tags($request->aboutus_en);
            $aboutus->experience_year       = $request->experience_year;
            $aboutus->previous_project      = $request->previous_project;
            $aboutus->under_construction    = $request->under_construction;
            $aboutus->client                = $request->client;
            $aboutus->message_ar            =  strip_tags($request->message_ar);
            $aboutus->message_en            =  strip_tags($request->message_en);
            $aboutus->vision_ar             =  strip_tags($request->vision_ar);
            $aboutus->vision_en             =  strip_tags($request->vision_en);
            $aboutus->whyus_ar              =  strip_tags($request->whyus_ar);
            $aboutus->whyus_en              =  strip_tags($request->whyus_en);
            $aboutus->save();

            toastr()->success(trans('messages.success'));
            return redirect()->route('aboutus.index');
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

        $aboutus = Aboutus::findOrFail($id);

        return view('pages.admin.aboutus.edit', compact('aboutus'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // $aboutus = Aboutus::where('id', $aboutus->id)->first();
            // Aboutus::where('id',$id)->first()->update($request->all());
            $aboutus = Aboutus::where('id',$id)->first();
            $aboutus->update([

                $aboutus->aboutus_ar            =  strip_tags($request->aboutus_ar),
                $aboutus->aboutus_en            =  strip_tags($request->aboutus_en),
                $aboutus->experience_year       = $request->experience_year,
                $aboutus->previous_project      = $request->previous_project,
                $aboutus->under_construction    = $request->under_construction,
                $aboutus->client                = $request->client,
                $aboutus->message_ar            =  strip_tags($request->message_ar),
                $aboutus->message_en            =  strip_tags($request->message_en),
                $aboutus->vision_ar             =  strip_tags($request->vision_ar),
                $aboutus->vision_en             =  strip_tags($request->vision_en),
                $aboutus->whyus_ar              =  strip_tags($request->whyus_ar),
                $aboutus->whyus_en              =  strip_tags($request->whyus_en),
            ]);

            toastr()->success(trans('messages.Update'));
            return redirect()->route('aboutus.index');
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
        $features = Aboutus::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('features.index');
    }
}
