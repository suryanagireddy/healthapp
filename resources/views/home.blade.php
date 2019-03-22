@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <!-- Jumbotron -->
        @foreach($users as $user)
        <div class="jumbotron">
            <h1>{{$user->name}}</h1>
            {{--<h2>{{$user->service_id}}</h2>--}}
            {{--<h2>{{$user->technique_id}}</h2>--}}
            {{--<h2>{{$user->qualification_id}}</h2>--}}

        </div>
            {{--@foreach($techniques as $technique)--}}
            {{--<div class="col-lg-4 col-md-4 col-sm-4">--}}
            {{--{--}}
                {{--<h3>{{$technique($user->technique_id)->name}}</h3>--}}
            {{--}--}}
            {{--</div>--}}
            {{--@endforeach--}}
        @endforeach

    </div>
</div>
@endsection
