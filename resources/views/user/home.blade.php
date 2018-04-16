@extends('layouts.app')
  @section('home')
    <home></home>
  @endsection
  @section('scripts')
  <script async defer src="{{URL::to('js/app.js')}}"></script>
  @endsection