<form
        action="{{ route('user.gallery.store') }}"
        class="was-validated d-flex align-items-center justify-content-between my-3"
        method="POST"
        enctype="multipart/form-data">
    @csrf
    @method('POST')

    <input class="w-100" type="file" name="image">
    <button type="submit" class="w-100 btn btn-primary">Сохранить</button>


</form>