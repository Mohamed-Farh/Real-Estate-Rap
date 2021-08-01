<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Front\Job_Seeker;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{

    //----------------- Show contact In The Website  ------------------
    public function job_seeker()
    {
        $jobs = Job_Seeker::all();

        return view('includes.sitepages.job_seeker', compact('jobs'));
    }



    public function send_cv(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'name'      => 'required',
                // 'email'     => 'required|email',
                'mobile'    => 'nullable|numeric',
                'file'      => 'required|max:2048',
            ]);
            if ($validation->fails()){
                return redirect()->back()->withErrors($validation)->withInput();
            }

            if($request->file('file'))
            {
                $file = $request->file('file');
                $filename = time() . '.' . $request->file('file')->extension();
                $filePath ='files/uploads/';
                $file->move($filePath, $filename);
                $save = $filename;
            }

            $data['name']       = $request->name;
            $data['email']      = $request->email;
            $data['mobile']     = $request->mobile;
            $data['job_title']  = $request->job_title;
            $data['file']  = $save;

            Job_Seeker::create($data);

            return redirect()->back()->with([
                'message' => 'Message Sent Successfully',
                'alert-type' => 'success'
            ]);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }




    public function job_messages_index()
    {
        $job_messages = Job_Seeker::all();

        return view('pages.admin.job_seekers.index', compact('job_messages'));
    }





    public function messages_read(Request $request)
    {
        try {
            $message = Job_Seeker::findOrFail($request->id);

            $message->update(['status' => 1]);
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }




    public function messages_delete(Request $request)
    {
        $message = Job_Seeker::findOrFail($request->id);
        if($message->file)
        {
            if (File::exists('files/uploads/'.$message->file) ) {
                unlink('files/uploads/'.$message->file);
            }
        }
        $message->delete();

        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }










}
