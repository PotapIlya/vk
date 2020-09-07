
<form wire:submit.prevent="save"
      class="was-validated d-flex align-items-center justify-content-between my-3">
    <input type="file" wire:model="photo">

    @error('photo') <span class="error">{{ $message }}</span> @enderror

    <button class="w-100 btn btn-primary" type="submit">Сохранить</button>
</form>

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif