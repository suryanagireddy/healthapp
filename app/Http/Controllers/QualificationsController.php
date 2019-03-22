<?php

namespace App\Http\Controllers;

use App\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QualificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //
        if (Auth::check())
        {
        $qualifications = Qualification::all();

       // $qualifications = Qualification::where('user_id', Auth::user()->id)->get();

        return view('qualifications.index', ['qualifications' => $qualifications]);
        }
        return view('auth.login');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('qualifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()){
            $qualification = Qualification::create([
                'name' => $request->input('name'),
                'user_id' => Auth::user()->id
            ]);


            if($qualification){
                return redirect()->route('qualifications.show', ['qualification'=> $qualification->id])
                    ->with('success' , 'Qualification created successfully');
            }

        }

        return back()->withInput()->with('errors', 'Error creating new qualification');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function show(qualification $qualification)
    {
        //
        //$qualification = Qualification::where('id',$qualification->id)->first();
        $qualification = Qualification::find($qualification->id);

        return view('qualifications.show',['qualification'=> $qualification]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function edit(qualification $qualification)
    {
        //
        $qualification = Qualification::find($qualification->id);

        return view('qualifications.edit',['qualification'=> $qualification]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, qualification $qualification)
    {
        //save data
        $qualificationUpdate = Qualification::where('id', $qualification->id)
            ->update([
                'name'=> $request->input('name')
            ]);
        if($qualificationUpdate){
            return redirect()->route('qualifications.show',['qualification'=>$qualification->id])
                ->with('success','qualification updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function destroy(qualification $qualification)
    {
        //
        $findqualification = Qualification::find( $qualification->id);
        if($findqualification->delete()){

            //redirect
            return redirect()->route('qualifications.index')
                ->with('success' , 'Qualification deleted successfully');
        }

        return back()->withInput()->with('error' , 'qualification could not be deleted');
    }
}
