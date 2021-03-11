@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
         <div class="container"> 
            <div class="row">
                <div class="col-md-8">
                    <h2>Admin Messages </h2>
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
                        <div class="card-header"> All Messages </div>
                            <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" width="5%">#</th>
                                <th scope="col" width="20%">Name</th>
                                <th scope="col" width="20%">Email</th>
                                <th scope="col" width="20%">Subject</th> 
                                <th scope="col" width="25%">Message</th> 
                                <th scope="col" width="10%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1
                                @endphp
                                @foreach ($messages as $message)
                                    <tr>
                                        {{-- For pagination: $categories->firstItem()+$loop->index --}}
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{$message->name}} </td>
                                    <td>{{$message->email}} </td>
                                    <td>{{$message->subject}} </td>  
                                    <td>{{$message->message}} </td>  
                                    <td>   
                                        <a href="{{url('message/delete/'.$message->id)}}" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger">Delete</a>
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