<template>
	
	<div>
		<div>
			<form  @submit.prevent="upload"
				   method="post"
				   enctype="multipart/form-data"
				   class="was-validated d-flex align-items-center justify-content-between my-3"
			>
				<input  @change="image" type="file" name="images">
				
				<button type="submit" class="w-100 btn btn-primary">Сохранить</button>
			</form>
		</div>
<!--		-->
<!--		<div class="row w-100">-->
<!--			-->
<!--			<div-->
<!--					v-if="gallery.length"-->
<!--					v-for="image in gallery"-->
<!--					class="col-4 mb-3"-->
<!--			>-->
<!--				<div class="w-100" style="position: relative">-->
<!--					<a  :href="'/gallery/'+image.id">-->
<!--						<img class="mw-100" :src="'/storage/'+image.img" alt="">-->
<!--					</a>-->
<!--					-->
<!--					<button :data-id="image.id" style="position: absolute; top: 0; right: 0; z-index: 10000000000" class="btn-danger">&#10008;</button>-->
<!--					-->
<!--				</div>-->
<!--			</div>-->
<!--			-->
<!--			-->
<!--			<div v-else class="w-100">-->
<!--				<h2 class="text-center">У вас нету фотографий</h2>-->
<!--			</div>-->
<!--		-->
<!--		-->
<!--		</div>-->
	
	</div>
	
</template>

<script>
	import axios from 'axios'
    export default {
        name: "GalleryComponent",
		props: ['gallery'],
		data: () =>
		({
			url: '/gallery',
			info: null,
			photo: null,
		}),
		methods:{
            image(event)
			{
			    this.photo = event.target.files[0];
			    
			    this.upload();
			},
            upload()
			{
                const config = { 'content-type': 'multipart/form-data' }
                const formData = new FormData()
                formData.append('photo', 'photo')

                axios.post(this.url, {
                    	data: '12'
					})
                    .then(response => {
                        console.log(response.data.message)
					})
                    .catch(error => {
                        console.log(error)
					})
			}
		},
		mounted() {
        
        }
    }
</script>
