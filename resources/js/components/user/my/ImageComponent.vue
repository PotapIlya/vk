<template>
	<div>
		
			<div>
				<img v-if="person.img !== null" class="mw-100 h-auto" :src="'/storage/'+person.img" alt="">
				<img v-else class="mw-100 h-auto" src="/static/img/nophoto.png" alt="">
			</div>
		<form @submit.prevent="update"
				style="position: absolute; bottom: 0; left: 0"
			  class="d-flex justify-content-between align-items-center"
			  enctype="multipart/form-data"
		>
			<input @change="image" name="image" type="file">
<!--			<button type="submit">Сохранить</button>-->
		</form>
	</div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "ImageComponent",
		props: ['user'],
		data: () => ({
			url: '/api/my/update',
			person: {},
		}),
		mounted() {
            this.person = this.user;
        },
        methods:{
            image(event)
            {
                this.photo = event.target.files[0];
                this.update()
            },
            update()
			{
                const config = {headers: { 'content-type': 'multipart/form-data' }}
                let formData = new FormData();
                formData.append('image', this.photo);

                axios.post(this.url, formData, config)
                    .then( response =>
                    {
                        if(response.data.success)
						{
						    this.person.img = response.data.success;
						}
                        if(response.data.error)
						{
						    alert(response.data.error)
						}
                    })
                    .catch( error =>
                    {
                        console.log(error)
                    });
			}
		}
    }
</script>
