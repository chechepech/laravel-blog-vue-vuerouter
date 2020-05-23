<template>
<div class="form-contact">
	<transition name="fade" mode="out-in">
		<p v-if="sent">Message has been sent!</p>
		<form v-else @submit.prevent="submit">
			<div class="input-container container-flex space-between">
				<input v-model="form.name" placeholder="Enter your name" class="input-name" required autofocus>
				<input v-model="form.email" placeholder="Enter your email" class="input-email" required>
			</div>
			<div class="input-container">
				<input v-model="form.subject" placeholder="Enter a subject" class="input-subject" required>
			</div>
			<div class="input-container">
				<textarea v-model="form.message" cols="30" rows="10" placeholder="Enter your message" required></textarea>
			</div>
			<div class="send-message">
				<button type="submit" class="text-uppercase c-white" :disabled="sending">
					<span class="c-green" v-if="sending">Sending...!!!</span>
					<span class="c-green" v-else>Send Message</span>
				</button>
			</div>
		</form>
	</transition>
</div>
</template>
<script type="text/javascript">
	export default{
		data(){
			return{
				sent: false,
				sending: false,
				form:{
					name: null,
					email: null,
					subject: null,
					message: null
				}
			}
		},
	methods: {
		submit(){
			this.sending = true;
			axios.post('/api/messages',this.form)
			.then(res=>{this.sent = true; this.sending = false;})
			.catch(errors =>{this.sent = false; this.sending = false;});
		}
	}
}</script>