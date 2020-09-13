@extends('layouts.user.app')


@section('content')

    <section>
        <div class="d-flex flex-column w-100">

            <form action="" method="" class="d-flex">
                <input class="col form-control" type="text" placeholder="Введите запрос">
                <button class="w-25 btn btn-info" type="submit">Найти</button>
            </form>

        </div>

        <div class="row align-items-center mt-5">
            @foreach($allUser as $user)

                <a href="{{ route('user.my.show', $user->id) }}" class="col-4">
                    <div class="w-100">
                        <div>
                            <img class="mw-100 h-auto" src="/storage/{{ $user->img ?? '../static/img/nophoto.png' }}" alt="">
                        </div>
                        <div>
                            <h4>
                                {{ $user->first_name }}  {{ $user->last_name }}
                            </h4>
                        </div>
                        <div>
                            <button class="btn btn-secondary">
                                Добавить в друзья
                            </button>
                        </div>
                    </div>
                </a>

            @endforeach
        </div>
    </section>

    @include('user.friends.include.aside')

@endsection