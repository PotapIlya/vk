

    <h3>
        Записи
    </h3>
    <div class="list-group mt-4">
        @foreach($user->wall as $item)
            <div class="list-group-item list-group-item-action flex-column align-items-start my-1">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">First_name Last_name</h5>
                </div>
                <p class="mb-1">
                    {!!  $item->text  !!}
                </p>
            </div>
        @endforeach
    </div>
