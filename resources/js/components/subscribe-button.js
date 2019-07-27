Vue.component('subscribe-button', {
    
    computed: {
        subscribed() {
            if (!__auth()|| this.channel.user_id === __auth().id) return false;
            
            return !!this.subscriptions.find(subscription => subscription.user_id === __auth().id);
        }, 

        owner () {
            if (__auth() && this.channel.user_id === __auth().id) return true;

            return false;
        }
    },
    
    methods : {
        toggleSubscription() { 

            if(! __auth()) alert("Please login to subscribe");
            
        }
    }, 
    props: { 
        subscriptions: {
            type: Array, 
            required: true, 
            default: () => []
        }, 
        channel: {
            type: Object, 
            required: true, 
            default: () => ({})
        }
    }, 


});