@extends('layouts.user.app')


@section('content')

    <div class="d-flex flex-column w-100">

        <h1 class="mb-4">
            Ваши друзья
        </h1>

        @forelse($friends as $friend)

          <div class="col-10 d-flex align-items-center justify-content-between mb-3">
              <a href="{{ route('user.index.show', $friend->id) }}" class="d-flex align-items-center">
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
                  <button class="btn btn-info mb-2">Написать сообщение</button>
                  <button class="btn btn-danger">Удалить</button>
              </div>
          </div>

        @empty

            <div class="text-center">
                <h1>
                    У вас нету друзей
                </h1>
            </div>

        @endforelse





        <h1 class="mb-4">
            Заявки в друзья
        </h1>
        @forelse($friendsRequest as $friend)

            <div class="col-10 d-flex align-items-center justify-content-between mb-3">
                <a href="{{ route('user.index.show', $friend->id) }}" class="d-flex align-items-center">
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

                    <form action="{{ route('user.friends.update', $friend->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success">Принять</button>
                    </form>

                </div>
            </div>

        @empty

            <div class="text-center">
                <h1>
                    У вас нет заявок
                </h1>
            </div>

        @endforelse




        <h1 class="mb-4">
            Вы подписанны
        </h1>
        @forelse($subscriber as $friend)

            <div class="col-10 d-flex align-items-center justify-content-between mb-3">
                <a href="{{ route('user.index.show', $friend->id) }}" class="d-flex align-items-center">
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

                    <form action="{{ route('user.friends.update', $friend->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-danger">Отписаться</button>
                    </form>

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

@endsection