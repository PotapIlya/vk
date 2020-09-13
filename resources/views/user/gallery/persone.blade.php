@extends('layouts.user.app')


@section('content')

    @includeWhen(!is_null($userImages), 'user.gallery.include.images', [ 'gallery' => $userImages->gallery ])

@endsection