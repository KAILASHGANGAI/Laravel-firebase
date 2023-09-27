@extends('layouts.app')
@section('contents')
    
<h1>Welcome to firebase</h1>
@auth
  {{  Auth::user()}}
@endauth

@endsection