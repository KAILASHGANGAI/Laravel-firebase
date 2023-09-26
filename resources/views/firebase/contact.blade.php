@extends('layouts.app')
@section('contents')
<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-4">
            <div class="card">
                @if(Session::has('status'))
                <span class="alert alert-success">{{Session::get('status')}}</span>
           @endif
                <div class="card-header ">
                    <h4>Contact List -Total: {{$count_item}}
                    <a class="btn btn-primary float-end" href="{{route('add-contact')}}">Add Contact</a></h4>
                   
                </div>
                <div class="card-body">
                   
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.N</th> <th>Name</th> <th>Phone</th> <th>Email</th> <th>Edit</th> <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($contacts as $key=>$item)
                          
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['phone']}}</td>
                                <td>{{$item['email']}}</td>
                                <td>
                                    <a href="{{route('contact.edit',$key)}}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <a href="{{route('contact.delete',$key)}}" class="btn btn-danger">Delete</a>
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