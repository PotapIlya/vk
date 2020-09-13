<template>
	<div>
		<div>
			<form @submit.prevent="upload">
				<ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
				<div class="mt-2">
					<button type="submit" class="btn btn-outline-info">Опубликовать</button>
				</div>
			</form>
		</div>
		
		
			
		<div v-if="array.length" class="list-group mt-4">
			<div v-for="item in array" class="list-group-item list-group-item-action flex-column align-items-start my-1">
				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">First_name Last_name</h5>
				</div>
				<p class="mb-1" v-html="item.text"></p>
			</div>
		</div>
		
	
	</div>

</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    export default {
        name: "WallComponent",
		props: ['wall'],
		data: () => ({
			url : "/api/my/wall",
            editor: ClassicEditor,
            editorData: '<p>Что увас нового?</p>',
            editorConfig: {},
			array: [],
		}),
		mounted() {
            this.array = this.wall
            console.log(this.array)
        },
        methods:{
            upload()
			{
			    if(this.editorData !== '')
				{
                    axios.post(this.url, {
                        data: this.editorData
                    })
					.then(response =>{
					    if(response.data.success)
						{
						    this.array.push(response.data.success)
						}
					})
					.catch(error => {
						console.log(error)
					})
                    this.editorData = '';
				}
            }
		}
    }
</script>
