@extends('admin.admin_master')

@section('admin')   
 
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
    </div>
    <div class="card-body">
        @if (session('success'))
                             
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> 
            </div>
        @endif 

        <form action="{{route('update.password')}}" method="POST" class="form-pill"> 
            @csrf
            <div class="form-group">
                <label for="exampleFormControlPassword3">Current Password</label>
                <input type="password" class="form-control" name="oldpassword" id="current_password" placeholder="Current Password">
                
                @error('oldpassword')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div> 
            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div> 

            <div class="form-group">
                <label for="exampleFormControlPassword3">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                @error('password_confirmation')
                <span class="text-danger">{{$message}}</span>
                 @enderror
            </div> 


            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                <button type="submit" class="btn btn-primary btn-default">Change Password</button> 
            </div> 
        </form>
    </div>
</div> 

@endsection