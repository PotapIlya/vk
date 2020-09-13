@extends('layouts.user.app')


@section('content')

    <div class="d-flex flex-column w-100">


        <delete-component
            :friends="{{ json_encode($friends) }}"
        />

{{--        <h1 class="mb-4">--}}
{{--            Ваши друзья--}}
{{--        </h1>--}}

{{--        @forelse($friends as $friend)--}}

{{--          <div class="col-10 d-flex align-items-center justify-content-between mb-3">--}}
{{--              <a href="{{ route('user.my.show', $friend->id) }}" class="d-flex align-items-center">--}}
{{--                  <div class="col-6">--}}
{{--                      <img style="border-radius: 50%" class="mw-100 h-auto" src="/storage/{{ $friend->img ?? '../static/img/nophoto.png' }}" alt="">--}}
{{--                  </div>--}}
{{--                  <div class="d-flex flex-column">--}}
{{--                      <h3>--}}
{{--                          {{ $friend->first_name }} {{ $friend->last_name }}--}}
{{--                      </h3>--}}
{{--                  </div>--}}
{{--              </a>--}}
{{--              <div class="col-4 d-flex flex-column">--}}
{{--                  <button class="btn btn-info mb-2">Написать сообщение</button>--}}
{{--                  <a href="{{ route('user.friends.delete', $friend->id) }}" class="btn btn-danger">Удалить</a>--}}
{{--              </div>--}}
{{--          </div>--}}

{{--        @empty--}}

{{--            <div class="text-center">--}}
{{--                <h1>--}}
{{--                    У вас нету друзей--}}
{{--                </h1>--}}
{{--            </div>--}}

{{--        @endforelse--}}

    </div>
    @include('user.friends.include.aside')

@endsection