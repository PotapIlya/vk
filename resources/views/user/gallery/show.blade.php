@extends('layouts.user.app')


@section('content')

    <section>
        <div class="container">
           <div class="d-flex justify-content-between">
               <div class="col-10">
                   <img class="mw-100" src="/storage/{{ $image->img }}" alt="">
               </div>
               <div class="col">
                   <div class="d-flex align-items-center">
                       <div class="mr-3">
                           logo
                       </div>
                       <div>
                           name <br>
                           created_at
                       </div>
                   </div>
                   <div>
                       likes
                   </div>
                   <div>
                       comments
                   </div>
               </div>
           </div>
        </div>
    </section>

@endsection