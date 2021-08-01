<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Social;
use Illuminate\Support\Facades\Validator;

class SocialController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::all();

        return view('pages.admin.socials.index', compact('socials'));
    }
    public function contactus_index()
    {
        $socials = Social::all();

        return view('pages.admin.contactus.index', compact('socials'));
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
                'name' => 'required|min:3|max:50|unique:social',
                'type' => 'required',
            ];
            $this->validate($request, $rules);

            $social = new Social();
            $social->name    = $request->name;
            $social->type    = $request->type;
            $social->status  = $request->status;
            $social->contact = $request->contact;
            $social->save();
            toastr()->success(trans('messages.success'));
            return redirect()->back();
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
                'name' => 'required|min:3|max:50',
                'type' => 'required',
            ];
            $this->validate($request, $rules);

            $social = Social::findOrFail($request->id);
            $social->update([
                $social->name = $request->name,
                $social->type = $request->type,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->back();
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
        $socials = Social::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }


    public function contactus_visible(Request $request)
    {
        try {
            $social = Social::findOrFail($request->id);

            if($social->status == '0'){
                $social->update([
                    $social->status = '1',
                ]);
            }elseif($social->status == '1'){
                $social->update([
                    $social->status = '0',
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }





    // public function do_contact(Request $request)
    // {
    //     $validation = Validator::make($request->all(), [
    //         'name'      => 'required',
    //         'email'     => 'required|email',
    //         'mobile'    => 'nullable|numeric',
    //         'title'     => 'required|min:5',
    //         'message'   => 'required|min:10',
    //     ]);
    //     if ($validation->fails()){
    //         return redirect()->back()->withErrors($validation)->withInput();
    //     }

    //     $data['name']       = $request->name;
    //     $data['email']      = $request->email;
    //     $data['mobile']     = $request->mobile;
    //     $data['title']      = $request->title;
    //     $data['message']    = $request->message;

    //     Contact::create($data);

    //     return redirect()->back()->with([
    //         'message' => 'Message sent successfully',
    //         'alert-type' => 'success'
    //     ]);

    // }


}
