@extends('layouts.app')
  @section('home')
    <Admin></Admin>
  @endsection
  @section('scripts')
  <script async defer src="{{URL::to('js/admin.js')}}"></script>
  @endsection