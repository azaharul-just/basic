@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
         <div class="container"> 
            <div class="row">
                <div class="col-md-8">
                    <h2>Contact </h2>
                </div>
                <div class="col-md-4">
                    <a href="{{route('add.contact')}}" class="btn btn-info" style="float: right">Add Contact</a>
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
                                <th scope="col" width="20%">Address</th>
                                <th scope="col" width="20%">Email</th>
                                <th scope="col" width="40%">Phone</th> 
                                <th scope="col" width="15%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1
                                @endphp
                                @foreach ($contacts as $contact)
                                    <tr>
                                        {{-- For pagination: $categories->firstItem()+$loop->index --}}
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{$contact->address}} </td>
                                    <td>{{$contact->email}} </td>
                                    <td>{{$contact->phone}} </td>  
                                    <td>  
                                        <a href="{{url('about/edit/'.$contact->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('about/delete/'.$contact->id)}}" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger">Delete</a>
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