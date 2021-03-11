@extends('admin.admin_master')

@section('admin')   
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Home About</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store.about')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="exampleFormControlInput1">About Title</label>
                                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder=" ">
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                            </div>
                             
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Short Description</label>
                                <textarea name="short_dis" class="form-control" id="exampleFormControlTextarea1" rows="3" >

                                </textarea>
                                     @error('short_dis')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div> 

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Long Description</label>
                                <textarea name="long_dis" class="form-control" id="exampleFormControlTextarea1" rows="6" >

                                </textarea>
                                     @error('long_dis')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div> 


                            <div class="form-footer pt-2 pt-2 mt-2 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Submit</button> 
                            </div>
                        </form>
                    </div>
                </div> 
         
 @endsection