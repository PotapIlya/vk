<section class="col pl-0 mb-3">
    <div class="container px-0">
        <div class="d-flex justify-content-between">
            <div class="col-5 pl-0">
                <div style="position: relative">
                    {{--                   @dd($user)--}}

                    <img class="mw-100 h-auto" src="/storage/{{ $user->about->img ?? '../static/img/nophoto.png' }}" alt="">
                </div>
                <div class="my-1">
                    <a class="w-100 btn btn-info mb-1" href="{{ route('user.my.edit', $user->id) }}">Написать сообщение</a>

                    @if($userSubscribe)
                        <button disabled class="w-100 btn btn-info">Ваша завявка уже отправлена</button>
                    @elseif($userPending)
                        <accept-button-component
                                :id="{{ json_encode($user->id) }}"
                        />
{{--                        <button class="w-100 btn btn-info">Принять в друзья</button>--}}
                    @elseif($isFriend)
                        <button disabled class="w-100 btn btn-info">Это ваш друг</button>
                    @else
                        <add-button-component
                                :id="{{ json_encode($user->id) }}"
                        />
{{--                        <a class="w-100 btn btn-info" href="{{ route('user.my.edit', $user->id) }}">Добавить в друзья</a>--}}
                    @endif

                </div>
            </div>
            <div class="col-7">
                <div>
                    <h3>
                        {{ $user->first_name }} {{ $user->last_name }}
                    </h3>
                </div>
                <div>
                    <h1>info</h1>
                </div>

            </div>
        </div>
    </div>
</section>

