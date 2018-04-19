@extends('layouts.app')
  @section('home')
    <Login></Login>
  @endsection
  @section('scripts')
  <script async defer src="{{URL::to('js/login.js')}}"></script>
  @endsection