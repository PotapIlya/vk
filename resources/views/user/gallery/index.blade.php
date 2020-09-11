@extends('layouts.user.app')


@section('content')

{{--    <livewire:user.gallery-component>--}}

  <div class="d-flex flex-column">
{{--      @include('user.gallery.livewire.include.form')--}}
{{--      @include('user.gallery.livewire.include.images')--}}

      <gallery-component
              :gallery="{{ json_encode($gallery) }}"
      />

  </div>

@endsection