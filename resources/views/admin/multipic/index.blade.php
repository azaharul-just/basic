@extends('admin.admin_master')

@section('admin')  

    <div class="py-12">
         <div class="container">
            <div class="row">
                <div class="col-md-8">
                    Total Number of images are: <span class="text-danger">{{count($images)}}</span> 
                    <div class="card-group">
                        
                        @foreach ($images as $item)
                        <div class="col-md-3 mt-4">
                            <img src="{{asset($item->image)}}" style="height: 80px;width:120px" alt="">
                        </div> <br>
                         
                           
                        @endforeach
                         
                    </div>
                </div> 
                <div class="col-md-4">
                    @if (session('success')) 
                             <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> 
                              </div>
                    @endif 
                    <div class="card">
                        <div class="card-header"> Multi Image </div>
                         <div class="card-body">
                            <form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Multi Image</label>
                                    <input type="file" name="image[]" class="form-control" id="exampleInputEmail1" multiple="" aria-describedby="emailHelp"> 
                                     
                                      @error('image')
                                          <span class="text-danger">{{$message}}</span>
                                      @enderror
  
                                </div>
                                 
                                <button type="submit" class="btn btn-primary">Add Image</button>
                            </form>
                         </div>
                    </div>
                </div>
                
            </div> 

         </div>
    </div>
    @endsection