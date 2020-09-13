<template>
	<div>
		<h1 class="mb-4">
			Ваши друзья
		</h1>
		
		<div v-if="person.length">
			<div v-for="(item, index) in person"
				 class="col-10 d-flex align-items-center justify-content-between mb-3">
				<a :href="'/my/'+item.id" class="d-flex align-items-center">
					<div v-if="item.img !== null" class="col-6">
						<img style="border-radius: 50%" class="mw-100 h-auto" :src="'/storage/'+item.img" alt="">
					</div>
					<div v-else class="col-6">
						<img style="border-radius: 50%" class="mw-100 h-auto" src="/static/img/nophoto.png" alt="">
					</div>
					<div class="d-flex flex-column">
						<h3>
							{{ item.first_name }} {{ item.last_name }}
						</h3>
					</div>
				</a>
				<div class="col-4 d-flex flex-column">
					<button class="btn btn-info mb-2">Написать сообщение</button>
					<button @click="deleteFriend(item.id, index)" class="btn btn-danger">Удалить</button>
				</div>
			</div>
		</div>
		<div v-else class="text-center">
			<h1>
				У вас нету друзей
			</h1>
		</div>
	</div>
</template>

<script>
	import axios from 'axios'
    export default {
        name: "DeleteComponent",
		props: ['friends'],
		data:() =>({
			person: [],
			url: '/friend/delete',
		}),
		mounted() {
            this.person = this.friends;
        },
		methods: {
            deleteFriend(id, index)
			{
			    axios.post(this.url, {
			        data: id,
					type: 'delete'
				})
				.then(response =>{
					this.person.splice(index, 1);
                    console.log(response.data)
				})
				.catch(error =>{
					console.log(error)
				})
			}
		}
    }
</script>

