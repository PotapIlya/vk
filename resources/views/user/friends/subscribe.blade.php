@extends('layouts.user.app')


@section('content')

    <div class="d-flex flex-column w-100">

        <h1 class="mb-4">
            Вы подписанны
        </h1>
        @forelse($subscriber as $friend)

            <div class="col-10 d-flex align-items-center justify-content-between mb-3">
                <a href="{{ route('user.my.show', $friend->id) }}" class="d-flex align-items-center">
                    <div class="col-6">
                        <img style="border-radius: 50%" class="mw-100 h-auto" src="/storage/{{ $user->img ?? '../static/img/nophoto.png' }}" alt="">
                    </div>
                    <div class="d-flex flex-column">
                        <h3>
                            {{ $friend->first_name }} {{ $friend->last_name }}
                        </h3>
                    </div>
                </a>
                <div class="col-4 d-flex flex-column">

                    <subscribe-component
                        :user_id="{{ json_encode($friend->id) }}"
                    />

                </div>
            </div>

        @empty

            <div class="text-center">
                <h1>
                    У вас нет заявок
                </h1>
            </div>

        @endforelse



    </div>
    @include('user.friends.include.aside')

@endsection