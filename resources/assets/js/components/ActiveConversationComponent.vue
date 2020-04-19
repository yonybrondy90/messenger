<template>
    <b-row class="h-100">
        <b-col cols="8">
            <b-card no-body
                footer-bg-variant="light"
                footer-border-variant="dark"
                title="Conversación Activa"
                class="h-100"
            >
                <b-card-body class="card-body-scroll">
                    <message-conversation-component 
                        v-for="message in messages"
                        :key="message.id"
                        :written-by-me="message.written_by_me">
                        {{ message.content}}
                    </message-conversation-component>
                </b-card-body>
                

                <div slot="footer">
                    <b-form class="mb-0" @submit.prevent="postMessage" autocomplete="false">
                        <b-input-group>
                            <b-form-input
                                class="text-center"
                                type="text"
                                v-model="newMessage"
                                placeholder="Escribir mensaje.."
                            >
                            </b-form-input>

                            <b-input-group-append>
                                <b-button type="submit" variant="primary">Enviar</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form>
                </div>
            </b-card>
        </b-col>
        <b-col cols="4">
            <b-img blank blank-color="#777" width="60" height="60" class='m-1' rounded="circle" alt="Circle image"></b-img>
            <p>{{ contactName }}</p>
            <hr>
            <b-form-checkbox>
                Desactivar Notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>

<style>
    .card-body-scroll{
        overflow-y: auto;
        max-height: calc(100vh - 125px);
    }
</style>

<script>
    export default {
        props:{
            contactId: Number,
            contactName: String,
            messages: Array
        },
        data(){
            return {
                newMessage:'',
            };
        },
        mounted() {

        },
        methods:{
            postMessage(){
                const params = {
                    to_id: this.contactId,
                    content: this.newMessage
                };
                axios.post('/api/messages',params).then((response) => {
                    //console.log(response.data);
                    if (response.data.success) {
                        this.newMessage = '';
                        
                    }
                    
                });
            }
        }
    }
</script>
