@extends('layouts.user.app')


@section('content')

    <div class="d-flex flex-column w-100">


        <accept-component
                :request="{{ json_encode($friendsRequest) }}"
        />

    </div>
    @include('user.friends.include.aside')

@endsection