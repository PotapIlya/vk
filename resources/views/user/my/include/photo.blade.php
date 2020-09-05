<div>

   <div class="d-flex align-items-center justify-content-between">
       <h2>Мои фотограции</h2>
       <a class="h5" href="{{ route('user.gallery.index') }}">Посмотреть все</a>
   </div>


    <div class="row align-items-center justify-content-between">

        @foreach($images as $image)

            <div class="col-3">
                <div class="card w-100">
                    <img class="card-img-top" src="/storage/{{ $image->img }}" alt="Card image cap">
                </div>
            </div>
       @endforeach

    </div>

</div>