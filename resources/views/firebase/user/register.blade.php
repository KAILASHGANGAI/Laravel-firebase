@extends('layouts.app')
@section('contents')
   <div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto shadow">
            <h1>Register</h1>
            @if(Session::has('status'))
            <span>{{Session::get('status')}}</span>
       @endif
            <form method="post" action="{{route('register')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="name" class="form-control" id="exampleInputname1" name="name" value="{{old('name')}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{old('email')}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                    <input type="Phone" class="form-control" id="exampleInputPhone1" name="Phone" value="{{old('Phone')}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="{{old('password')}}">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
   </div>
@endsection
