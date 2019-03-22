@extends('layouts.app')

@section('content')

    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>{{$service->name}}</h1>
        </div>

        <div class="row  col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px; ">
            <a href="/technique/create/{{ $service->id }}" class="pull-right btn btn-default btn-sm" >Add Technique</a>
            @foreach($service->techniques as $technique)
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <h2>{{ $technique->name }}</h2>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-sm-3 col-md-3 col-lg-3 pull-right ">
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/services/{{$service ->id}}/edit"><i class="fa fa-edit" aria-hidden="true"></i>Edit</a></li>
                <li><a href="/techniques/create/{{ $service->id }}"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Technique</a></li>
                <li><a href="/services"><i class="fa fa-building" aria-hidden="true"></i>List of Services</a></li>

                <br/>
                <li>
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                    <a href="#" onclick=" var result = confirm('Are you sure you wish to delete this Service?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }">Delete
                    </a>

                    <form id="delete-form" action="{{ route('services.destroy',[$service->id]) }}"
                          method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ol>
        </div>
    </div>


@endsection