<template>
    <div>
        <div class="vx-col md:w-1/2 w-full mb-base">
			<vx-card title="Horizontal Form" code-toggler>
				<div class="vx-row mb-6">
					<div class="vx-col sm:w-1/3 w-full">
						<span>First Name</span>
					</div>
					<div class="vx-col sm:w-2/3 w-full">
						<vs-input class="w-full" v-model="name" />
					</div>
				</div>
				<div class="vx-row mb-6">
					<div class="vx-col sm:w-1/3 w-full">
						<span>Email</span>
					</div>
					<div class="vx-col sm:w-2/3 w-full">
						<vs-input class="w-full" type="email" v-model="email" />
					</div>
				</div>
				<div class="vx-row">
					<div class="vx-col sm:w-2/3 w-full ml-auto">
						<vs-button class="mr-3 mb-2" @click="onSubmit">Submit</vs-button>
						<vs-button color="warning" type="border" class="mb-2" @click="onSubmit">Reset</vs-button>
					</div>
				</div>
			</vx-card>
		</div>

    </div>
</template>
<script>
import axios from 'axios';
export default {
    data(){
        return {
            name:"",
            email:""
        }
    },
    methods: {
        onSubmit(){
            axios.post("/api/users",{
                name:this.name,
                email:this.email
            }).then(({data})=>{
                if(data.ok){
                    alert("ذخیره شد");
                }
            })
        }
    },
}
</script>
