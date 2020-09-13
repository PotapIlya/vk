@extends('layouts.user.app')


@section('content')

    <div class="d-flex flex-column">
       @include('user.my.include.show_my')

        <div>

            @if(count($user->countGallery))
            <div class="d-flex align-items-center justify-content-between">
                <h2>Фотографии {{ $user->first_name }}</h2>
                <a class="h5" href="{{ route('user.gallery.showGalleryPerson', $user->id) }}">Посмотреть все</a>
            </div>

            <div class="row align-items-center justify-content-between">

                @foreach($user->countGallery as $image)

                    <a href="{{ route('user.gallery.show', $image->id) }}" class="col-3">
                        <div class="card w-100">
                            <img class="card-img-top" src="/storage/{{ $image->img }}" alt="Card image cap">
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
        @endif


        @if(count($user->wall))
            <h3>
                Записи
            </h3>
            <div class="list-group mt-4">
                @foreach($user->wall as $item)
                    <div class="list-group-item list-group-item-action flex-column align-items-start my-1">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">First_name Last_name</h5>
                        </div>
                        <p class="mb-1">
                            {!!  $item->text  !!}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif

    </div>


@endsection