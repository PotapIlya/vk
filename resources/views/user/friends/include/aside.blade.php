<aside class="col-3">
    <ul class="list-inline">
        <li class="mb-2">
            <a class="h4" href="{{ route('user.friends.index') }}">
                Мои друзья
            </a>
        </li>
        <li class="mb-2">
            <a class="h4" href="{{ route('user.friends.requests') }}">
                Заявки в друзья <span class="btn btn-light">
                    @if(count($friendsRequest)){{ count($friendsRequest) }} @endif
                </span>
            </a>
        </li>
        <li class="mb-2">
            <a class="h4" href="{{ route('user.friends.subscribe') }}">
                Вы подписаны
            </a>
        </li>
        <li class="mb-2">
            <a class="h4" href="{{ route('user.friends.search') }}">
                Поиск друзей
            </a>
        </li>
    </ul>
</aside>