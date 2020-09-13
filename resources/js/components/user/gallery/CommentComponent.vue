<template>
	<div>
	
		
		<form method="post"  @submit.prevent="store" class="input-group w-100 mt-5">
			<textarea v-model="input" style="resize: none" class="form-control w-100" aria-label="With textarea"></textarea>
			<button type="submit" class="btn btn-info w-100 mt-2">Отправить</button>
		</form>
		
		
		<ul v-if="frontComments.length" class="list-inline">
			
		   <li
				   v-for="comment in frontComments"
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
		props: [
		    'image_id',
			'comments'
		],
		data: () => ({
			id : 6,
			input: null,
			frontComments: [],
			url: '/api/gallery/comment',
		}),
		mounted() {
            this.id = this.image_id;
            this.frontComments = this.comments;
				
            // console.log(this.frontComments)
        },
        methods:{
            store()
			{
			    if (this.input !== null)
				{
                    axios.post(this.url, {
							id : this.id,
							text : this.input
						})
                        .then(response =>
						{
                            // console.log(response.data)
						    this.frontComments.push(response.data)
                        })
                    // console.log(this.frontComments)
                    this.input = '';
				}
			}
		}
    }
</script>

