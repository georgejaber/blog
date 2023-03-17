<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Auth;
use function GuzzleHttp\Promise\all;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

        $id = Auth::id();

        $user = Profile::where('user_id','=',$id)->first();

        return view('profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|max:255',
            'mobile' => 'required',
            'image'=> 'required|mimes:png,jpg,jpeg'
        ]);

        $id = Auth::id();




        $user = Profile::where('user_id','=',$id)->first();

        $image_name="";

        if(request()->file('image')){
            $file= request()->file('image');
            $extension = $file->getClientOriginalExtension();
            $image_name= date('Hms_Ymd').".".$extension;
            $path = $file->storeAs('uploads',$image_name);
        }

        $user-> update(
        ['address'=>$request->address,
            'mobile'=>$request->mobile,
            'image'=>$image_name
        ]);

        return redirect()->back()->with('success','Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
