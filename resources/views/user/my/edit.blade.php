@extends('layouts.user.app')


@section('content')


    <edit-component
        :user="{{ json_encode($user) }}"
    />

@endsection