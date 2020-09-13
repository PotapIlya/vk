<template>
	<div>
		
			<div>
				<img v-if="user.img !== null" class="mw-100 h-auto" :src="'/storage/'+user.img" alt="">
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
			person: null,
		}),
		// mounted() {
        //     this.person = this.user;
        //     console.log()
        // }
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
                            console.log(this.user.img)
						    this.user.img = response.data.success;
                            console.log(this.user.img)
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
