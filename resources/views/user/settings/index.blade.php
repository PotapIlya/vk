@extends('layouts.user.app')


@section('content')

    <form class="w-100" method="post" action="{{ route('user.settings.update', $user->id) }}">
        @csrf
        @method('PATCH')
{{--            <div class="form-group d-flex align-items-center">--}}
{{--                <label for="disabledTextInput" class="my-0 mr-3 h4">Логин</label>--}}
{{--                <input type="text" id="disabledTextInput" class="form-control" placeholder="Логин">--}}
{{--            </div>--}}

        <hr>

            <div class="form-group d-flex align-items-center">
                <label for="disabledTextInput" class="my-0 mr-3 h5">Старый пароль</label>
                <input name="old_password" type="text" id="disabledTextInput" class="form-control" placeholder="Старый пароль">
            </div>
            <div class="form-group d-flex align-items-center">
                <label for="password" class="my-0 mr-3 h5">Новый пароль</label>
                <input name="password" type="text" id="password" class="form-control" placeholder="Новый пароль">
            </div>
            <div class="form-group d-flex align-items-center">
                <label for="password_confirmation" class="my-0 mr-3 h5">Еще раз пароль</label>
                <input name="password_confirmation" type="text" id="password_confirmation" class="form-control" placeholder="Еще раз пароль">
            </div>

        <hr>

            <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>

@endsection