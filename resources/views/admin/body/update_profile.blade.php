@extends('admin.admin_master')

@section('admin')   
 
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Update Profile</h2>
    </div>
    <div class="card-body">
        @if (session('success'))
                             
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> 
            </div>
        @endif 

        <form action="{{route('update.user.profile')}}" method="POST" class="form-pill"> 
            @csrf
            <div class="form-group">
                <label for="exampleFormControlPassword3">User Name</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div> 
            <div class="form-group">
                <label for="exampleFormControlPassword3">User Email</label>
                <input type="text" class="form-control" name="email" value="{{$user->email}}" >
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>  

            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                <button type="submit" class="btn btn-primary btn-default">Update Profile</button> 
            </div> 
        </form>
    </div>
</div> 

@endsection