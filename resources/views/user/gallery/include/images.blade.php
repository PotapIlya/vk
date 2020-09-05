<div class="row w-100">

    @forelse($gallery as $image)
        <a href="{{ route('user.gallery.show', $image->id) }}" class="col-4 mb-3">
            <div class="w-100" style="position: relative">
                <div>
                    <img class="mw-100" src="/storage/{{ $image->img }}" alt="">
                </div>
                <form action="{{ route('user.gallery.destroy', $image->id ) }}" method="POST" style="position: absolute; top: 0; right: 0">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="delete" value="{{ $image->id }}">
                    <button type="submit" class="btn-danger">&#10008;</button>
                </form>
            </div>
        </a>

    @empty
        <div class="w-100">
            <h2 class="text-center">У вас нету фотографий</h2>
        </div>
    @endforelse

</div>