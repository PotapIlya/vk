<template>
	<div>
		1234
		
		<div class="input-group w-100 mt-5">
			<textarea v-model="input" style="resize: none" class="form-control w-100" aria-label="With textarea"></textarea>
			<button @click="store" class="btn btn-info w-100 mt-2">Отправить</button>
		</div>

		<ul class="list-inline">
			
			
			
		   <li
				   v-for="comment in comments"
				   class="my-3">
			   <a :href="'/my/'+comment.user.id" class="d-flex justify-content-between align-items-center">
				   <div class="col-7 pl-0">
					   <img v-if="comment.user.img !== null" style="border-radius: 50%" class="mw-100 h-auto" :src="'/storage/'+comment.user.img" alt="">
					   <img v-else style="border-radius: 50%" class="mw-100 h-auto" src="/static/img/nophoto.png" alt="">
				   </div>
					<h6>
						{{ comment.user.first_name }}
						{{ comment.user.last_name }}
				   </h6>
			  </a>
			   <p class="form-control mt-3">
				  {{ comment.text }}
			   </p>
			</li>
	
			
		</ul>
	</div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "CommentComponent",
		props: ['comments'],
		data: () => ({
            input: null,
			url: 'api/gallery/comment',
		}),
		mounted() {
            // console.log(this.comments)
        },
        methods:{
            store()
			{
			    if (this.input !== null)
				{
                    axios.get(this.url)
                        .then(response => {
                            console.log(response)
                        })
					
                    this.input = '';
				}
			}
		}
    }
</script>

