<div class="d-flex flex-column w-100">
    <form
            wire:submit.prevent="save"
            class="was-validated"
            action="{{ route('user.index.update', $user->id) }}">


        <div class="mb-3 d-flex align-items-center">
            <label for="validationTooltip01" class="mr-3 my-0">Имя</label>
            <input
                    wire:model="first_name"
                    name="first_name"
                    type="text"
                    class="form-control"
                    id="validationTooltip01"
                    value="123"
{{--                    value="{{ $user->first_name }}"--}}
                    placeholder="Ваше имя"
                    required>
        </div>
        <div class="mb-3 d-flex align-items-center">
            <label for="validationTooltip01" class="mr-3 my-0">Фамилия</label>
            <input
                    wire:model="last_name"
                    name="last_name"
                    type="text"
                    class="form-control"
                    id="validationTooltip01"
{{--                    value="{{ $user->last_name }}"--}}
                    placeholder="Ваша фамилия"
                    required>
        </div>

        <div class="d-flex align-items-center mb-3">
            <label for="" class="my-0 mr-3">Пол</label>
            <div class="d-flex flex-column">
                <div class="custom-control custom-radio">
                    <input type="radio"
                           wire:model="gender"
                           class="custom-control-input"
                           id="customControlValidation2"
                           name="radio-stacked"
                           required
                           @if($user->gender === 'on') checked @endif>
                    <label class="custom-control-label" for="customControlValidation2">Мужской</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio"
                           wire:model="gender"
                           class="custom-control-input"
                           id="customControlValidation3"
                           name="radio-stacked"
                           required
                           @if($user->gender === 'off') checked @endif>
                    <label class="custom-control-label" for="customControlValidation3">Женский</label>
                </div>
            </div>
        </div>


        <div class="mb-3">
            <div class="input-group is-invalid">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="validatedInputGroupPrepend">login</span>
                </div>
                <input wire:model="login"
                       type="text"
                       name="login"
                       value="{{ $user->login }}"
                       class="form-control is-invalid"
                       aria-describedby="validatedInputGroupPrepend"
                       required>
            </div>
        </div>


        <button type="submit" class="btn btn-success">Сохранить</button>

    </form>
</div>
