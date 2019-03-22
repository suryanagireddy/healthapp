@extends('layouts.app')

@section('content')

    <div class="row col-md-9 col-lg-9 col-sm-9 pull-left " style="background: white;">
        <h1>Create new technique </h1>

        <!-- Example row of columns -->
        <div class="row  col-md-12 col-lg-12 col-sm-12" >

            <form method="post" action="{{ route('techniques.store') }}">
                {{ csrf_field() }}


                <div class="form-group">
                    <label for="technique-name">Name<span class="required">*</span></label>
                    <input   placeholder="Enter name"
                             id="technique-name"
                             required
                             name="name"
                             spellcheck="false"
                             class="form-control"
                    />
                
                @if($services == null)
                    <input
                            class="form-control"
                            type="hidden"
                            name="service_id"
                            value="{{ $service_id }}"
                    />
                    @endif
        </div>


        @if($services != null)
            <div class="form-group">
                <label for="service-content">Select service</label>
                <select name="service_id" class="form-control" >
                    @foreach($services as $service)
                        <option value="{{$service->id}}"> {{$service->name}} </option>
                    @endforeach
                </select>
            </div>
        @endif

                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                           value="Submit"/>
                </div>
            </form>


        </div>
    </div>


    <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/techniques"> <i class="fa fa-building-o" aria-hidden="true"></i> List of techniques</a></li>
            </ol>
        </div>
    </div>


@endsection