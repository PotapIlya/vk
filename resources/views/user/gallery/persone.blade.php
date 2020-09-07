@extends('layouts.user.app')


@section('content')

    @include('user.gallery.livewire.include.images', [ 'gallery' => $userImages ])

@endsection