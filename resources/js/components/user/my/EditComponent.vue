<template>
	
	<div class="d-flex flex-column w-100">
		<form
				@submit.prevent="upload"
				method="post"
				class="was-validated w-100"
				>
			
			<div v-if="status" class="d-flex w-100 justify-content-end">
				<h1 class="alert alert-success">
					Обновленно
				</h1>
			</div>
			
			<div class="mb-3 d-flex align-items-center">
				<label for="validationTooltip01" class="mr-3 my-0">Имя</label>
				<input
						v-model="first_name"
						name="first_name"
						type="text"
						class="form-control"
						
						placeholder="Ваше имя"
						required>
			</div>
			<div class="mb-3 d-flex align-items-center">
				<label for="validationTooltip01" class="mr-3 my-0">Фамилия</label>
				<input
						v-model="last_name"
						name="last_name"
						type="text"
						
						class="form-control"
						id="validationTooltip01"
						placeholder="Ваша фамилия"
						required>
			</div>
			
			<div class="d-flex align-items-center mb-3">
				<label for="" class="my-0 mr-3">Пол</label>
				<div class="d-flex flex-column">
					<div class="custom-control custom-radio">
						<input type="radio"
							   class="custom-control-input"
							   id="customControlValidation2"
							   name="radio-stacked"
							   
							 >
						<label class="custom-control-label" for="customControlValidation2">Мужской</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio"
							   class="custom-control-input"
							   id="customControlValidation3"
							   name="radio-stacked"

						>
						
						<label class="custom-control-label" for="customControlValidation3">Женский</label>
					</div>
				</div>
			</div>
			
			
			<div class="mb-3">
				<div class="input-group is-invalid">
					<div class="input-group-prepend">
						<span class="input-group-text" id="validatedInputGroupPrepend">login</span>
					</div>
					<input
							v-model="login"
							
						   type="text"
						   name="login"
						   class="form-control is-invalid"
						   aria-describedby="validatedInputGroupPrepend"
						   required>
				</div>
			</div>
			
			
			<button type="submit" class="btn btn-success">Сохранить</button>
		
		</form>
	</div>
	
<!--	<ul v-if="errors.length">-->
<!--		<li v-for="error in errors">-->
<!--			{{ error }}-->
<!--		</li>-->
<!--	</ul>-->
	

	

</template>

<script>
    import axios from "axios";

    export default {
        name: "EditComponent",
		props:['user'],
		data: () => ({
			first_name: '',
			last_name: '',
			login: '',
			url: '/api/my/edit',
			status: false,
			errors: [],
		}),
		mounted() {
            this.first_name = this.user.first_name
            this.last_name = this.user.last_name
            this.login = this.user.login
        },
        methods:{
            upload()
			{
                axios
					.post(this.url, {
					    first_name : this.first_name,
                        last_name : this.last_name,
                        login : this.login,
					})
                    .then(response =>
                    {
                        if(response.data.success)
						{
                            this.first_name = response.data.success.first_name;
							this.last_name = response.data.success.last_name;
							this.login = response.data.success.login;
							
							this.changeStatus();
                        }
                        if (response.data.error)
						{
                            this.errors.length = 0;
						    this.errors.push(response.data.error)
                            console.log(response.data.error)
                        }
                    })
			},
			changeStatus()
			{
			    this.status = true;
			    setTimeout(() =>{
			        this.status = false;
				}, 2000)
			}
		}
    }
</script>
