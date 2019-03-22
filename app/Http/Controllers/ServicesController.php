<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
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
        $services = Service::all();

       // $services = Service::where('user_id', Auth::user()->id)->get();

        return view('services.index', ['services' => $services]);
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
        return view('services.create');
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
            $service = Service::create([
                'name' => $request->input('name'),
                'user_id' => Auth::user()->id
            ]);


            if($service){
                return redirect()->route('services.show', ['service'=> $service->id])
                    ->with('success' , 'Service created successfully');
            }

        }

        return back()->withInput()->with('errors', 'Error creating new service');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
        //$service = Service::where('id',$service->id)->first();
        $service = Service::find($service->id);

        return view('services.show',['service'=> $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        $service = Service::find($service->id);

        return view('services.edit',['service'=> $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //save data
        $serviceUpdate = Service::where('id', $service->id)
            ->update([
                'name'=> $request->input('name')
            ]);
        if($serviceUpdate){
            return redirect()->route('services.show',['service'=>$service->id])
                ->with('success','Service updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        $findService = Service::find( $service->id);
        if($findService->delete()){

            //redirect
            return redirect()->route('services.index')
                ->with('success' , 'Service deleted successfully');
        }

        return back()->withInput()->with('error' , 'Service could not be deleted');
    }
}
