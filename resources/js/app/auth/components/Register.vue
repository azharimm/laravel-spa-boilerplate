<template>
	<div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form @submit.prevent="submit">
                    	<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" :class="{'is-invalid':errors.name}" name="name" value=""  autocomplete="name" autofocus v-model="name">
                                 <div class="invalid-feedback" style="display: unset;" v-if="errors.name">
						          {{errors.name[0]}}
						        </div>
                            </div>
                        </div>
           
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" :class="{'is-invalid':errors.email}" name="email" value=""  autocomplete="email" v-model="email">
                                <div class="invalid-feedback" style="display: unset;" v-if="errors.email">
						          {{errors.email[0]}}
						        </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" :class="{'is-invalid':errors.password}" name="password"  autocomplete="new-password" v-model="password">
                                <div class="invalid-feedback" style="display: unset;" v-if="errors.password">
						          {{errors.password[0]}}
						        </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	import {mapActions} from 'vuex';
	export default{
		data(){
			return {
				name:null,
				email:null,
				password:null,
				errors:[]
			}
		},
		methods:{
			...mapActions({
				register:'auth/register'
			}),
			submit(){
				this.register({
					payload:{
						name: this.name,
						email: this.email,
						password: this.password
					},
					context: this
				}).then(()=>{
                    this.$router.replace({name:'home'});
                });
			}
		}
	}
</script>