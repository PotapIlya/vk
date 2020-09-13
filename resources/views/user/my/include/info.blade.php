<section class="col pl-0 mb-3">
    <div class="container px-0">
        <div class="d-flex justify-content-between">
            <div class="col-5 pl-0">
               <div style="position: relative">
{{--                   @dd($user)--}}

                   <image-component
                           :user="{{ json_encode($user) }}"
                   />

               </div>
                <div class="my-1">
                    <a class="w-100 btn btn-info" href="{{ route('user.my.edit', $user->id) }}">Редактировать</a>
                </div>
            </div>
            <div class="col-7">

                <div>
                    <h3>
                        {{ $user->first_name }} {{ $user->last_name }}
                    </h3>
                </div>
                <div>
                    <h1>info</h1>
                </div>


            </div>
        </div>
    </div>
</section>