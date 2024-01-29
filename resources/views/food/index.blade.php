@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         @if(Session::has('message'))
                         <div class='alert alert-success'>
                             {{Session::get('message')}}
                         </div>
                    @endif

            <div class="card">
                <div class="card-header">All Foods

                    <span class="float-end">
                        <a href="{{route('food.create')}}">
                            <button class="btn btn-outline-secondary">Add Food </button>
                        </a>
                    </span>

                </div>

                <div class="card-body">

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Image</th>
                          <th scope="col">Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Price</th>
                          <th scope="col">Category</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if(count($foods)>0)
                          @foreach($foods as
                          $key=>$food)
                            <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td><img src="{{asset('images')}}/{{$food->image}}" width="100", height="60"></td>
                              <td>{{$food->name}}</td>
                              <td>{{$food->description}}</td>
                              <td>{{$food->price}}৳</td>
                              <td>{{$food->category->name}}</td>
                              <td>
                                 <a href="{{route('food.edit',
                                     [$food->id])}}">
                                        <button class="btn btn-outline-success">
                                            Edit
                                        </button>

                                 </a>
                              </td>

                              <td>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                     Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete!</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                           <p>Are you sure? do you want to delete item?</p>


                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{route('food.destroy',
                                                          [$food->id])}}" method="post">@csrf
                                                        {{method_field('DELETE')}}
                                                       <button class="btn btn-outline-danger">
                                                         Delete
                                                       </button>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                              </td>

                            </tr>
                            @endforeach
                            @else
                            <td> No Food to display</td>
                            @endif

                      </tbody>
                    </table>

                    {{$foods->links()}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
