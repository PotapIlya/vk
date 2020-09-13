@extends('layouts.user.app')

@section('content')

    <div class="d-flex flex-column">


        @foreach($gallery as $image)


            <div class="mx-auto mb-3">

                <div class="d-flex justify-content-start align-items-center">
                    <div class="col-1">
                        <img style="border-radius: 50%" class="mw-100 h-auto" src="/storage/{{ $image->img }}" alt="">
                    </div>
                    <a href="{{ route('user.my.show', $image->user->id) }}">
                        <h3>
                            {{ $image->user->first_name }} {{ $image->user->last_name }}
                        </h3>
                        <span>
{{--                            @dd(\Carbon\::now() )--}}
{{--                            @dd($image->created_at)--}}
                        {{ $image->created_at->format('d-m-Y') }}
                    </span>
                    </a>

                </div>

                <a href="{{ route('user.gallery.show', $image->id) }}" class="col-10">
                    <img class="mw-100" src="/storage/{{ $image->img }}" alt="">
                </a>
            </div>

        @endforeach
    </div>

@endsection