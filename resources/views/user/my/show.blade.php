@extends('layouts.user.app')


@section('content')

    <div class="d-flex flex-column">
       @include('user.my.include.show_my')

        @includeWhen($user->countGallery, 'user.my.include.images')

        @includeWhen(count($user->friends()), 'user.my.include.friends')


{{--        @if($isFriend)--}}
{{--            @dd($user)--}}
{{--            <wall-component--}}
{{--                    :wall="{{ json_encode($user->wall) }}"--}}
{{--            />--}}
{{--        @else--}}
{{--        @endif--}}
        @includeWhen(count($user->wall), 'user.my.include.wallCustom')

    </div>


@endsection