@extends('layouts.app')

@section('content')

    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>{{$user->name}}</h1>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-sm-3 col-md-3 col-lg-3 pull-right ">
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/users/{{$user ->id}}/edit"><i class="fa fa-edit" aria-hidden="true"></i>Edit</a></li>
                <li><a href="/users"><i class="fa fa-building" aria-hidden="true"></i>List of users</a></li>

                <br/>
                <li>
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                    <a href="#" onclick=" var result = confirm('Are you sure you wish to delete this user?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }">Delete
                    </a>

                    <form id="delete-form" action="{{ route('users.destroy',[$user->id]) }}"
                          method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ol>
        </div>
    </div>


@endsection