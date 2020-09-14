<template>
	
	
	<div>
		<h1 class="mb-4">
			Заявки в друзья
		</h1>

		
		<div v-if="array.length">
			
			<div
					v-for="(item, index) in array"
					class="col-10 d-flex align-items-center justify-content-between mb-3">
				<a :href="'/my/'+item.id" class="d-flex align-items-center">
					<div class="col-6">
						<img v-if="item.img !== null" style="border-radius: 50%" class="mw-100 h-auto" :src="'/storage/'+item.img" alt="">
						<img v-else style="border-radius: 50%" class="mw-100 h-auto" src="/static/img/nophoto.png" alt="">
					</div>
					<div class="d-flex flex-column">
						<h3>
							{{ item.first_name }} {{ item.last_name }}
						</h3>
					</div>
				</a>
				<div class="col-4 d-flex flex-column">
					
					<div>
						<button @click="upload(item.id, index)"
								class="btn btn-success w-100">
							Принять
						</button>
					</div>
				
				</div>
			</div>
			
		</div>
		
		<div v-else class="text-center">
			<h1>
				У вас нет заявок
			</h1>
		</div>
		
	</div>
	

</template>

<script>
    import axios from 'axios'
    export default {
        name: "AcceptComponent",
        props: ['request'],
        data: () => ({
            url: '/friend/accept',
            array: [],
        }),
        mounted() {
            this.array = this.request;
        },
        methods: {
            upload(id, index)
            {
                axios.post(this.url, {
                    data: id,
                })
                    .then(response =>
                    {
                        if(response.data.success)
                        {
                           this.array.splice(index, 1)
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
