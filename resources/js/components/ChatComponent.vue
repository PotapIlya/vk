<template>
	<div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<textarea class="form-control">
							{{ dataMessage.join('\n') }}
						</textarea>
					</div>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Наберите сообщение" v-model="message">
						<button @click='sendMessage' class="btn-outline-secondary">Отправить</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	import axios from 'axios'
    export default {
        name: "ChatComponent",
		data: () => ({
			dataMessage: [],
            message: '',
			url: '/chat',
		}),
		mounted() {
            const socket = io.connect('http://127.0.0.1:3000');
			
			socket.on("new-message:App\\Events\\NewMessage", (data) => {
			    this.dataMessage.push(data.result);
            })
        },
		methods:{
            sendMessage()
			{
			    axios.post(this.url,{
					message: this.message
				})
				.then(response =>{
                    console.log(response.data)
				    this.message = '';
				})
			}
		}
    }
</script>
