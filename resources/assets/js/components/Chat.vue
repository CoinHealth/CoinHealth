<template>
    <div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">Channels</div>
			<div v-for="channel in channels" class="panel-body channel-list">
				<a class="user-link">{{ channel.name }}</a>
			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading"></div>
			<div class="panel-body">
				<p  v-for="message in messages">
					<span @click="editMessage(message)" v-bind:class="{ 'message-sent': isMessageSent(message), 'message-received': isMessageReceived(message) }">{{ message.content }}</span>
					<span v-if="edit && isMessageSent(message)" @click="deleteMessage(message)" class="delete-button">x</span>
				</p>
				<form action="" method="POST" @submit.prevent="edit ? updateMessage(newMessage.id) : sendMessage()">
					<!-- <input v-if="edit" name="_method" type="hidden" value="PUT"> -->
					<div class="row">
						<div class="col-lg-9">
							<input v-model="newMessage.content" type="text" name="content" class="form-control" placeholder="Type your message" autofocus>
						</div>
						<div class="col-lg-3">
							<button type="submit" class="btn btn-primary form-control send-button">Send</button>
						</div>
					</div>
				</form>
			</div>
		</div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                channels: [],
            }
        },

        ready () {
            this.listen();
            this.fetchMessages();
        },
        methods: {
            listen() {
                Echo.Channel('chann')
            },
            fetchMessages() {
            }
        }
    }
</script>
