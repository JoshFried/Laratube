Vue.component('subscribe-button', {
    methods : {
        toggleSubscription() { 
            if(!__auth()) { 
                alert("Please login to subscribe")
            }
        }
    }, 
    props: { 
        subscriptions: {
            type: Array, 
            required: true, 
            default: () => []
        }
    }
});