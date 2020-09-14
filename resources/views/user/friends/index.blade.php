@extends('layouts.user.app')


@section('content')

    <div class="d-flex flex-column w-100">


        <friends-component
            :friends="{{ json_encode($friends) }}"
        />

    </div>
    @include('user.friends.include.aside')

@endsection