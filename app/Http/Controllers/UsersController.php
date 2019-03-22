<?php

namespace App\Http\Controllers;

use App\User;
use App\Service;
use App\Technique;
use App\Qualification;
use App\ServiceTechnique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($service_id = null, $qualification_id = null, $technique_id = null)
    {
        //return view('users.create');
        $services = null;
        $techniques = null;
        $qualifications = null;

        if(!$service_id){
            $services = Service::all();
        }

        if(!$qualification_id){
            $qualifications = Qualification::all();
        }

        if(!$technique_id){
            $techniques = Technique::all();
        }

        return view('users.create',['service_id'=>$service_id, 'qualification_id'=>$qualification_id, 'technique_id'=>$technique_id,
            'techniques'=>$techniques, 'qualifications'=>$qualifications, 'services'=>$services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $profileImage = $request->file('profile_picture');
        $profileImageSaveAsName = time() . Auth::id() . "-profile." .
            $profileImage->getClientOriginalExtension();

        $upload_path = 'profile_images/';
        $profile_image_url = $upload_path . $profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);

        //
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone_no' => $request->input('phoneno'),
            'abn_no' => $request->input('abnno'),
            //'filename' => $request->input('filename'),
            'filename' => $profile_image_url,
            'service_id' => $request->input('service_id'),
            'qualification_id' => $request->input('qualification_id'),
            'technique_id' => $request->input('technique_id'),

        ]);


        if($user){
            return redirect()->route('services.index')
                ->with('success' , 'User created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
