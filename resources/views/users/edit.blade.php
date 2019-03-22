@extends('layouts.app')

@section('content')

    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px;">
            <form method="post" action="{{ route('users.update',[$user->id]) }}">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="put">

                <div class="form-group">
                    <label for="user-name">user Name<span class="required">*</span></label>
                    <input placeholder="Enter name"
                           class="form-control"
                           id="user-name"
                           required
                           name="name"
                           spellcheck="false"
                           value = "{{ $user->name }}"
                    >
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
    <!-- Sidebar -->
    <div class="col-sm-3 col-md-3 col-lg-3 pull-right ">
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/users/{{$user ->id}}">Back</a></li>
                <li><a href="/users">View all users</a></li>
            </ol>
        </div>
    </div>

@endsection