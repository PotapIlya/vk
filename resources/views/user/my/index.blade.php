@extends('layouts.user.app')


@section('content')

   <div class="d-flex flex-column">
       @include('user.my.include.info')
       @include('user.my.include.photo')
   </div>



@endsection