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

                <div class="col-4">

                   <div class="w-100">
                       <a href="{{ route('user.my.show', $user->id) }}">
                           <img class="mw-100 h-auto" src="/storage/{{ $user->img ?? '../static/img/nophoto.png' }}" alt="">
                       </a>
                       <h4>
                           {{ $user->first_name }}  {{ $user->last_name }}
                       </h4>

                       <add-button-component
                               :id="{{ json_encode($user->id) }}"
                       />

                   </div>
                </div>

            @endforeach
        </div>
    </section>

    @include('user.friends.include.aside')

@endsection