@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
         <div class="container">
            
              
 
            <div class="row">
                <div class="col-md-8">
                    <h2>Home About</h2>
                </div>
                <div class="col-md-4">
                    <a href="{{route('add.about')}}" class="btn btn-info" style="float: right">Add About</a>
                </div>


            </div>
            <div class="row"> 
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                             
                             <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> 
                              </div>
                        @endif 
                        <div class="card-header"> All Abouts </div>
                            <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" width="5%">#</th>
                                <th scope="col" width="20%">Title</th>
                                <th scope="col" width="20%">Short Description</th>
                                <th scope="col" width="40%">Long Description</th> 
                                <th scope="col" width="15%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1
                                @endphp
                                @foreach ($abouts as $about)
                                    <tr>
                                        {{-- For pagination: $categories->firstItem()+$loop->index --}}
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{$about->title}} </td>
                                    <td>{{$about->short_dis}} </td>
                                    <td>{{$about->long_dis}} </td>  
                                    <td>  
                                        <a href="{{url('about/edit/'.$about->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('about/delete/'.$about->id)}}" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger">Delete</a>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        
                         </div>
                </div> 
                 
                
            </div> 

         </div>
    </div>
 
 @endsection