@include('layouts.components.message')

<div class="input-group w-100">
    <textarea wire:model="input" style="resize: none" class="form-control w-100" aria-label="With textarea"></textarea>
    <button wire:click="save" class="btn btn-info w-100 mt-2">Отправить</button>
</div>


@if(count($comments->comments))
    <ul class="list-inline">
        @foreach($comments->comments as $comment)

            <li class="my-3">
                <a href="{{ route('user.index.show', $comments->user->id) }}" class="d-flex justify-content-between align-items-center">
                    <div class="col-7">
                        <img style="border-radius: 50%" class="mw-100 h-auto" src="/storage/{{ $user->about->img ?? '../static/img/nophoto.png' }}" alt="">
                    </div>
                    <h6>
                        {{ $comments->user->first_name }}
                        {{ $comments->user->last_name }}
                    </h6>
                </a>
                <p>
                    {{ $comment->text }}
                </p>
            </li>

        @endforeach
    </ul>
@endif