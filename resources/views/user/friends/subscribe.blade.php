@extends('layouts.user.app')


@section('content')

    <div class="d-flex flex-column w-100">


        <subscribe-component
                :subscriber="{{ json_encode($subscriber) }}"
        />

    </div>
    @include('user.friends.include.aside')

@endsection