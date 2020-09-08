
{{--<div class="was-validated d-flex align-items-center justify-content-between my-3">--}}
{{--    <input type="file" wire:model="photo">--}}

{{--    <button--}}
{{--            wire:click="save"--}}
{{--            class="w-100 btn btn-primary">Сохранить</button>--}}
{{--</div>--}}


<form action="{{ route('user.gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="was-validated d-flex align-items-center justify-content-between my-3">
        <input type="file" name="image">

        <button type="submit" class="w-100 btn btn-primary">Сохранить</button>
    </div>
</form>