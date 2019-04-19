<template>
    <ul class="chat">
			<li class="clearfix" v-for="message in messages" :class="[auth_user === message.user.id ? 'right' : 'left']">
				<div class="chat-body clearfix">
					<div class="header">
						<strong class="primary-font">
							{{message.user.name}}
						</strong>
					</div>
					<p>
						{{message.message}}
					</p>
				</div>
			</li>
		</ul>
</template>

<script>
    export default {
        props: ['messages'],
				props: {
						auth_user: Number
				}
    }
</script>

<style scoped>

</style>
