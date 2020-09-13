<template>
	<div>
		<button @click="deleteSubscribe" class="btn btn-danger">{{ title }}</button>
	</div>
</template>

<script>
	import axios from 'axios'
    export default {
        name: "SubscribeComponent",
		props: ['user_id'],
		data: () => ({
			url: '/friend/delete',
			title: 'Отписаться'
		}),
		mounted() {
        },
		methods: {
            deleteSubscribe()
			{
				axios.post(this.url, {
						data: this.user_id,
						type: 'subscribe'
					})
					.then(response =>
					{
                        if(response.data.success)
                        {
                            this.title = 'Удаленно'
                        }
                        if(response.data.error)
                        {
                            alert(response.data.error)
                        }
					})
					.catch( error => {
						console.log(error)
					});
			}
			
		}
    }
</script>
