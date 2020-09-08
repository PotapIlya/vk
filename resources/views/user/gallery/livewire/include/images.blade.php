<div class="row w-100">

    @forelse($gallery as $image)
{{--        <a href="{{ route('user.gallery.show', $image->id) }}" class="col-4 mb-3">--}}
        <div class="col-4 mb-3">
            <div class="w-100" style="position: relative">
                <a  href="{{ route('user.gallery.show', $image->id) }}">
                    <img class="mw-100" src="/storage/{{ $image->img }}" alt="">
                </a>


                <form action="{{ route('user.gallery.destroy', $image->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button
                            style="position: absolute; top: 0; right: 0; z-index: 10000000000"
                            class="btn-danger">&#10008;</button>
                </form>


            </div>
        </div>

    @empty
        <div class="w-100">
            <h2 class="text-center">У вас нету фотографий</h2>
        </div>
    @endforelse

</div>