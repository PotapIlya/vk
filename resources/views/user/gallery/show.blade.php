@extends('layouts.user.app')


@section('content')

{{--    @dd($image)--}}

    <section>
        <div class="container">
           <div class="d-flex justify-content-between">
               <div class="col-8">
                   <img class="mw-100" src="/storage/{{ $image->img }}" alt="">
               </div>
               <div class="col">
                   <a href="{{ route('user.my.show', $image->user->id) }}" class="d-flex align-items-center  text-center">
                       <div class="mr-3 col-4">
                           <img style="border-radius: 50%" class="mw-100 h-auto" src="/storage/{{ $image->user->img ?? '../static/img/nophoto.png' }}" alt="">
                       </div>
                       <div>
                           <h3>
                               {{ $image->user->first_name }} {{ $image->user->last_name }}
                           </h3>
                           {{ $image->created_at->format('d-m-Y') }}
                       </div>
                   </a>

                   <like-component
                           :image_id="{{ json_encode($image->id) }}"
                           :like="{{ json_encode($image->like) }}"
                           :status="{{ json_encode($image->status) }}"
                   />

                   <div>
{{--                       @foreach($image->comments as $item)--}}
{{--                           @dd($item->user)--}}
{{--                       @endforeach--}}
                       <comment-component
                               :image_id="{{ json_encode($image->id) }}"
                               :comments="{{ json_encode($image->comments) }}"
                       />
                   </div>
               </div>
           </div>
        </div>
    </section>

@endsection