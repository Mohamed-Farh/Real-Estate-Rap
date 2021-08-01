<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_id = Auth::user()->id;

        $users = User::where('admin', 1)->whereNotIn('id', [$auth_id])->orderBy('id', 'desc')->paginate(15);

        return view('pages.admin.admins.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $user = new User;
            $user->name          = $request->name;
            $user->name_ar       = $request->name_ar;
            $user->admin         = $request->admin;
            $user->email         = $request->email;
            $user->password      = bcrypt($request->password);
            $user->save();

            toastr()->success(trans('messages.success'));
            return redirect()->route('admins.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
                'name' => 'required|string|min:3|max:30',
                'email' => 'required|email',
                'password' => 'nullable|min:6',
            ];
            $this->validate($request, $rules);

            $user = User::findOrFail($request->id);
            $user->update([
                $user->name         =  $request->name,
                $user->name_ar      =  $request->name_ar,
                $user->email        =  $request->email,
                $user->password     =  bcrypt($request->password),

            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('admins.index');
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
        $users = User::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('admins.index');
    }
}
