@extends('admin.admin_master')

@section('admin')   
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Contact</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store.contact')}}" method="POST">
                            @csrf 
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Contact Email</label>
                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email">
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Contact Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Enter Phone">
                                @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                            </div>
                             
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Contact Address</label>
                                <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Type Address" >

                                </textarea>
                                     @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>  

                            <div class="form-footer pt-2 pt-2 mt-2 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Save</button> 
                            </div>
                        </form>
                    </div>
                </div> 
         
 @endsection