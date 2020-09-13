<template>
	<div>
		<button @click="upload"
				:class="{ 'btn-success' : status }"
				class="btn btn-secondary w-100">
			{{ title }}
		</button>
	</div>
</template>

<script>
	import axios from 'axios'
    export default {
        name: "AddButtonComponent",
        props: ['id'],
        data: () => ({
            url: '/friend/add/',
			title: 'Добавить в друзья',
			status: false,
        }),
        mounted() {
        
        },
        methods: {
            upload()
			{
			    axios.post(this.url, {
			        data: this.id,
				})
				.then(response =>
				{
				    if(response.data.success)
					{
					    this.title = 'Заявка отправленна!';
					    this.status = true;
					}
				    if (response.data.error){
				        alert(response.data.error)
					}
				})
				.catch(error =>{
					console.log(error)
				})
			}
        }
    }
</script>



















