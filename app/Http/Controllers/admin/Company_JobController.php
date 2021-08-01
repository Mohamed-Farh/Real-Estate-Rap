<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company_Job;
use Illuminate\Http\Request;

class Company_JobController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_jobs = Company_Job::all();

        return view('pages.admin.company_jobs.index', compact('company_jobs'));
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

            $company_job = new Company_Job();
            $company_job->title_ar    = $request->title_ar;
            $company_job->title_en    = $request->title_en;
            $company_job->type        = $request->type;
            $company_job->save();
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

            $company_job = Company_Job::findOrFail($request->id);
            $company_job->update([
                $company_job->title_ar = $request->title_ar,
                $company_job->title_en = $request->title_en,
                $company_job->type     = $request->type,
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
        $company_job = Company_Job::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }


    public function visible(Request $request)
    {
        try {
            $company_job = Company_Job::findOrFail($request->id);

            if($company_job->status == '0'){
                $company_job->update([
                    $company_job->status = '1',
                ]);
            }elseif($company_job->status == '1'){
                $company_job->update([
                    $company_job->status = '0',
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
