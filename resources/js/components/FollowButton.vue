<template>
    <div>
        <button class="btn btn-sm btn-primary mb-2" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {

    props: ["userUsername", "follows",],
    mounted() {
        console.log('Component mounted.')
        },

    data: function() {
        return {
            status: this.follows,
        }
    },

    methods: {
        followUser() {
            axios.post("/follow/" + this.userUsername)
                .then(response => {
                   this.status = ! this.status;                   
                   console.log(response.data);
                })
                .catch(errors => {
                    if (errors.response.status == 401) {
                    window.location = "/login";
                }
            });
        }
    }, 

    computed: {
        buttonText(){
            return (this.status) ? "Unfollow" : "Follow";
        }
    }
};

</script>
