

<div class="row my-2" style="background: #eee;">
    <h3>Friends</h3>

    @foreach($user->friends() as $friend)

       <a href="{{ route('user.my.show', $friend->id) }}" class="col-2">
           <div class="d-flex justify-content-center align-items-center text-center flex-column w-100">
               <div class="mb-2">
                   <img style="border-radius: 50%" class="mw-100 h-auto" src="/storage/{{ $friend->img ?? '../static/img/nophoto.png' }}" alt="">
               </div>
               <h5>
                   {{ $friend->first_name }}
               </h5>
           </div>
       </a>

    @endforeach

</div>