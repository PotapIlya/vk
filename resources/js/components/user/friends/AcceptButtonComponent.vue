<template>
	<div>
		<button @click="upload"
				class="btn btn-success w-100">
			{{ title }}
		</button>
	</div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "AcceptButtonComponent",
        props: ['id'],
        data: () => ({
            url: '/friend/accept',
            title: 'Принять',
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
                            this.title = 'У вас в друзьях';
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
