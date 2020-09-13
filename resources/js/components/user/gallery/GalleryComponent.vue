<template>
	
	<div>
		<div>
			<form  @submit.prevent="upload"
				   method="post"
				   enctype="multipart/form-data"
				   class="was-validated d-flex align-items-center justify-content-between my-3"
			>
				<input  @change="image" type="file">
				
				<button type="submit" class="w-100 btn btn-primary">Сохранить</button>
			</form>
		</div>
		
		<div class="row w-100">
			
			<div
					v-if="images.length"
					v-for="(image, index) in images"
					class="col-4 mb-3"
			>
				<div class="w-100" style="position: relative">
					<a  :href="'/gallery/'+image.id">
						<img class="mw-100" :src="'/storage/'+image.img" alt="">
					</a>
					
					<button
							@click="deleteImage(image.id, index)"
							style="position: absolute; top: 0; right: 0; z-index: 10000"
							class="btn-danger">&#10008;</button>
					
				</div>
			</div>
			
			<div v-else class="w-100">
				<h2 class="text-center">У вас нету фотографий</h2>
			</div>
		
		</div>
	
	</div>
	
</template>

<script>
	import axios from 'axios'
    export default {
        name: "GalleryComponent",
		props: ['gallery'],
		data: () =>
		({
			url: '/api/gallery/store',
			urlDelete: '/api/gallery/destroy',
			photo: null,
            images: [],
		}),
		mounted() {
            this.images = this.gallery;
           
        },
        methods:{
            image(event)
			{
			    this.photo = event.target.files[0];
			    // this.upload();
			},
            upload()
			{
                const config = {headers: { 'content-type': 'multipart/form-data' }}
                let formData = new FormData();
                formData.append('image', this.photo);

                axios.post(this.url, formData, config)
                    .then( response =>
					{
                        this.images.push(response.data.success)
						this.photo = null;
                        // console.log(this.images)
                    })
                    .catch( error =>
					{
                        console.log(error)
                    });
			},
            deleteImage(imageId, arrayId)
			{
                axios.post(this.urlDelete, {
						id: imageId
					})
                    .then(response =>
                    {
                        if(response.data.success)
						{
						    this.images.splice(arrayId, 1)
						}
                        if (response.data.error) {
						    alert(response.data.error)
						}
                    })
                    .catch( error => {
                        console.log(error)
                    });
			}
		},
	
    }
</script>
