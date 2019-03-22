@extends('layouts.app')

@section('content')

    <div class="row col-md-9 col-lg-9 col-sm-9 pull-left " style="background: white;">
        <h1>Register new user</h1>

        <!-- Example row of columns -->
        <div class="row  col-md-12 col-lg-12 col-sm-12" >

            <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name<span class="required">*</span></label>
                    <input   placeholder="Enter name"
                             id="name"
                             required
                             name="name"
                             spellcheck="false"
                             class="form-control"
                    />
                </div>

                <div class="form-group">
                    <label for="email">Email<span class="required">*</span></label>
                    <input   placeholder="Enter email"
                             id="email"
                             required
                             name="email"
                             spellcheck="false"
                             class="form-control"
                    />
                </div>

                <div class="form-group">
                    <label for="password">Password<span class="required">*</span></label>
                    <input   placeholder="Enter password"
                             id="password"
                             required
                             name="password"
                             spellcheck="false"
                             class="form-control"
                             type="password"
                    />
                </div>

                <div class="form-group">
                    <label for="phoneno">Phone no<span class="required">*</span></label>
                    <input   placeholder="Enter phone no"
                             id="phoneno"
                             required
                             name="phoneno"
                             spellcheck="false"
                             class="form-control"
                    />
                </div>

                <div class="form-group">
                    <label for="abn no">ABN no<span class="required">*</span></label>
                    <input   placeholder="Enter ABN no"
                             id="abnno"
                             required
                             name="abnno"
                             spellcheck="false"
                             class="form-control"
                    />
                </div>


                <div class="form-group{{ $errors->has('profile_picture') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Upload File</label>
                    <input id="profilePicture" type="file" class="form-control" name="profile_picture">

                    @if ($errors->has('profile_picture'))
                        <span class="help-block">
                            <strong>{{ $errors->first('profile_picture') }}</strong>
                         </span>
                    @endif
                </div>


                @if($services == null)
                    <input
                            class="form-control"
                            type="hidden"
                            name="service_id"
                            value="{{ $service_id }}"
                    />
                @endif

                @if($qualifications == null)
                    <input
                            class="form-control"
                            type="hidden"
                            name="qualification_id"
                            value="{{ $qualification_id }}"
                    />
                @endif

                @if($techniques == null)
                    <input
                            class="form-control"
                            type="hidden"
                            name="technique_id"
                            value="{{ $technique_id }}"
                    />
                @endif


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

                @if($qualifications != null)
                    <div class="form-group">
                        <label for="qualification-content">Select Qualification</label>
                        <select name="qualification_id" class="form-control" >
                            @foreach($qualifications as $qualification)
                                <option value="{{$qualification->id}}"> {{$qualification->name}} </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if($techniques != null)
                    <div class="form-group">
                        <label for="technique-content">Select technique</label>
                        <select name="technique_id" class="form-control" >
                            @foreach($techniques as $technique)
                                <option value="{{$technique->id}}"> {{$technique->name}} </option>
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



@endsection