<template>
	<div class="d-flex align-items-center">
		<div>
			<button v-if="statusFront" disabled class="btn btn-success mr-2">&#10084;</button>
			<button @click="addLike" v-else class="btn btn-success mr-2">&#10084;</button>
		</div>
		<h4 class="m-0">
			{{ count }}
		</h4>
	</div>
</template>

<script>
    import axios from "axios";
    export default {
        name: "LIkeComponent",
		props: ['like', 'status', 'image_id'],
		data: () => ({
			count: 0,
			url: '/api/gallery/like',
			statusFront: 1,
		}),
		mounted() {
            this.count = this.like.length
            this.statusFront = this.status
        },
		methods: {
            addLike()
			{
                axios.post(this.url, {
                    image_id: this.image_id
                })
				.then(response =>
				{
				    if(response.data.success)
					{
					    this.count++;
					    this.statusFront = 1;
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
		},
    }
</script>
