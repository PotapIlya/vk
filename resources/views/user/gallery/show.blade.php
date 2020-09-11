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
                   <a href="{{ route('user.index.show', $image->user->id) }}" class="d-flex align-items-center  text-center">
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

                   <div>
                       likes
                   </div>
                   <div>
                       <comment-component
                               :comments="{{ json_encode($comments) }}"
                       />
{{--                       <livewire:user.comment-component :id="$image->id">--}}
                   </div>
               </div>
           </div>
        </div>
    </section>

@endsection