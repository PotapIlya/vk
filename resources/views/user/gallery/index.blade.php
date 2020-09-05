@extends('layouts.user.app')


@section('content')

    <div class="d-flex flex-column w-100">

        @include('user.gallery.include.form')
        @include('user.gallery.include.images')

    </div>

@endsection