
@foreach($gallery as $item)

    <div class="col-4 mb-3">
        <a href="{{ route('user.gallery.show', $item->id) }}" class="w-100" style="position: relative">
            <img class="mw-100" src="/storage/{{ $item->img }}" alt="">
        </a>
    </div>
@endforeach