<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company_Location;
use Illuminate\Http\Request;

class CompanyLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.company_location.index');

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

            $location = new Company_Location();
            $location->country_ar             = $request->country_ar;
            $location->country_en             = $request->country_en;
            $location->city_ar                = $request->city_ar;
            $location->city_en                = $request->city_en;
            $location->address_ar             = $request->address_ar;
            $location->address_en             = $request->address_en;
            $location->location_latitude      = $request->location_latitude;
            $location->location_longitude     = $request->location_longitude;
            $location->save();

            toastr()->success(trans('messages.success'));
            return redirect()->route('company_location.index');
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
            // $aboutus = Aboutus::where('id', $aboutus->id)->first();
            // Aboutus::where('id',$id)->first()->update($request->all());


            $location = Company_Location::findOrFail($request->id);
            $location->update([
                $location->country_ar             = $request->country_ar,
                $location->country_en             = $request->country_en,
                $location->city_ar                = $request->city_ar,
                $location->city_en                = $request->city_en,
                $location->address_ar             = $request->address_ar,
                $location->address_en             = $request->address_en,
                $location->location_latitude      = $request->location_latitude,
                $location->location_longitude     = $request->location_longitude,
            ]);

            toastr()->success(trans('messages.Update'));
            return redirect()->route('company_location.index');
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
        $location = Company_Location::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('company_location.index');
    }
}
