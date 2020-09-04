<section class="col pl-0 mb-3">
    <div class="container px-0">
        <div class="d-flex justify-content-between">
            <div class="col-5 pl-0">
               <div style="position: relative">
                   <img class="mw-100 h-auto" src="/storage/{{ Auth::user()->about->img ?? '' }}" alt="">
                   <form style="position: absolute; bottom: 0; left: 0"
                         action="{{ route('user.index.update', Auth::user()->id) }}"
                         class="d-flex justify-content-between align-items-center"
                         enctype="multipart/form-data"
                         method="POST"
                   >
                       @method('PATCH')
                       @csrf
                       <input name="image" type="file">
                       <button type="submit">Сохранить</button>
                   </form>
               </div>
                <div class="my-1">
                    <a class="w-100 btn btn-info" href="{{ route('user.index.edit', Auth::user()->name) }}">Редактировать</a>
                </div>
            </div>
            <div class="col-7">

                <div>
                    <h3>
                        {{ Auth::user()->name }}
                    </h3>
                    <form class="form-group d-flex" action="" method="POST">
                        <input class="form-control" name="status" type="text">
                        <button class="btn btn-primary ml-3">Сохранить</button>
                    </form>
                </div>
                <div>
                    <h1>info</h1>
                </div>


            </div>
        </div>
    </div>
</section>