@extends('layouts.app')
@section('contents')
<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto mt-4">
            <div class="card">
                <div class="card-header ">
                    <h4>Add Contact 
                   </h4>
                   @if(Session::has('status'))
                        <span>{{Session::get('status')}}</span>
                   @endif
                </div>
                <div class="card-body">
                    <form action="{{route('contact.store')}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">phone</label>
                        <input type="text" name="phone" class="form-control" value="{{old('pone')}}" id="phone">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">email</label>
                        <input type="text" name="email" class="form-control" value="{{old('email')}}" id="email">
                    </div>
                    <div class="form-group mb-3">
                       
                        <input type="submit" value="Submit" class="btn btn-success" id="email">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection