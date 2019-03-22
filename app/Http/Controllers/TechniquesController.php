<?php

namespace App\Http\Controllers;

use App\Technique;
use App\Service;
use App\ServiceTechnique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechniquesController extends Controller
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
        $techniques = Technique::all();

       // $techniques = Technique::where('user_id', Auth::user()->id)->get();

        return view('techniques.index', ['techniques' => $techniques]);
        }
        return view('auth.login');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($service_id = null)
    {
        //return view('techniques.create');
        //
        $services = null;
        if(!$service_id){
            $services = Service::all();
            //$services = Service::where('user_id', Auth::user()->id)->get();
        }

        return view('techniques.create',['service_id'=>$service_id, 'services'=>$services]);
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
            $technique = Technique::create([
                'name' => $request->input('name'),
                'service_id' => $request->input('service_id'),
            ]);


            if($technique){
                return redirect()->route('techniques.show', ['technique'=> $technique->id])
                    ->with('success' , 'Technique created successfully');
            }

        }

        return back()->withInput()->with('errors', 'Error creating new technique');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function show(technique $technique)
    {
        //
        //$technique = Technique::where('id',$technique->id)->first();
        $technique = Technique::find($technique->id);

        return view('techniques.show',['technique'=> $technique]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function edit(technique $technique)
    {
        //
        $technique = Technique::find($technique->id);

        return view('techniques.edit',['technique'=> $technique]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, technique $technique)
    {
        //save data
        $techniqueUpdate = Technique::where('id', $technique->id)
            ->update([
                'name'=> $request->input('name')
            ]);
        if($techniqueUpdate){
            return redirect()->route('techniques.show',['technique'=>$technique->id])
                ->with('success','technique updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function destroy(technique $technique)
    {
        //
        $findtechnique = Technique::find( $technique->id);
        if($findtechnique->delete()){

            //redirect
            return redirect()->route('techniques.index')
                ->with('success' , 'Technique deleted successfully');
        }

        return back()->withInput()->with('error' , 'Technique could not be deleted');
    }
}
