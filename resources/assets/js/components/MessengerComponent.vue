<template>
    <b-container fluid >
        <b-row no-gutters style="height: calc(100vh - 90px);">
            <b-col cols="4">
                <contact-list-component @conversationSelected="changeActiveConversation($event)"></contact-list-component>
            </b-col>
            <b-col cols="8">
                <active-conversation-component
                    v-if="selectedConversation"
                    :contact-id="selectedConversation.contact_id"
                    :contact-name="selectedConversation.contact_name"
                    :messages="messages"
                ></active-conversation-component>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    export default {

        props:{
            userId:Number
        },
    
        data(){
            return {
                selectedConversation:null,
                messages:[]
            };
        },
        mounted() {
            Echo.channel('example')
            .listen('MessageSent', (data) => {
                console.log(data);
                const message = data.message;
                message.written_by_me = (this.userId == message.from_id);
                this.messages.push(message);
            });
        }, 
        methods:{
            changeActiveConversation(conversation){

                this.selectedConversation = conversation;
                this.getMessages();
            },
            getMessages(){
                axios.get(`/api/messages?contact_id=${this.selectedConversation.contact_id}`).then((response) => {
                    this.messages = response.data;
                });
            },
        }
    }
</script>
