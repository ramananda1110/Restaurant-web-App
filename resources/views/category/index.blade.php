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
                <div class="card-header">All Categories
                 <span class="float-end">
                   <a href="{{route('category.create')}}">
                     <button class="btn btn-outline-secondary">Add Category </button>
                   </a>
                </span>

                </div>

                <div class="card-body">

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if(count($categories)>0)
                          @foreach($categories as
                          $key=>$category)
                            <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$category->name}}</td>
                              <td>
                                    <a href="{{route('category.edit',
                                     [$category->id])}}">
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
                                            <form action="{{route('category.destroy',
                                                          [$category->id])}}" method="post">@csrf
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
                            <td> No category to display</td>
                            @endif

                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
