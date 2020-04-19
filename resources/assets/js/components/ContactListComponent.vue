<template>
	<div>
		<b-form class="mx-3 my-2">
	        <b-input
	            class="text-center"
	            type="text"
	            placeholder="Buscar contacto.."
	        >
	    	</b-input>
	    </b-form>
		<b-list-group>
			<contact-component 
				variant="dark" 
				v-for="conversation in conversations"
				:key="conversation.id"
				:conversation="conversation"
				@click.native="selectConversation(conversation)"
			></contact-component>
	        <!-- <contact-component variant="dark"></contact-component>
	        <contact-component variant=""></contact-component>
	        <contact-component variant="secondary"></contact-component> -->
	        
	    </b-list-group>	
    </div>
</template>
<script>
    export default {
    	data(){
    		return{
    			conversations:[]
    		}
    	},
        mounted() {
            this.getConversations();
        },
        methods:{
        	getConversations(){
        		axios.get('/api/conversations').then((response)=>{
        			this.conversations = response.data;
        		});
        	},
        	selectConversation(conversation){
        		this.$emit('conversationSelected',conversation);
        	}
        }
    }
</script>