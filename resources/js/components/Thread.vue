<template>
    <div>
        <div class="card thread-container" v-bind:key="thread.id">
            <h3 class="thread-txt">{{ thread.title }}</h3>
            <div id="holder">
                <img :src="thread.img" id="thread-img">
                <p class="thread-txt">{{ thread.content }}</p>
            </div>
            <h5 class="thread-txt inline">Posted by {{ thread.author }}</h5>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                thread: {
                    id: '',
                    title: '',
                    content: '',
                    author: '',
                    noOfComments: '',
                    user_id: '',
                    img: ''
                },
                edit: false            
            }
        },

        created() {
            this.fetchThreads(window.location.pathname.substring(8));
        },

        methods: {
            fetchThreads(id) {
                let fakeThis = this;
                var pgUrl = ['/api/thread',`${id}`].join('/');
                fetch(pgUrl)
                    .then(response => response.json())
                    .then(response => { 
                        this.thread = response;
                    })
                    .catch(err => console.log(err));
            }
        }
    }
</script>

<style scoped>
    #holder img {
        max-width: 50%;
        height: auto;
        display: block;
        margin-left: auto;
        margin-right: auto;
        padding-bottom: 2%;
    }
    .thread-txt {
        color: #181D20;
        text-decoration: none;
    }
    .custom-txt {
        font-weight: 600;
        text-transform: uppercase;
        color: #8E6C88;
    }
    .card {
        max-width: 50%;
        margin: 0 auto;
        float: none;
    }  
    .thread-container {
        margin-top: 10px;
        padding-top: 10px;
        padding-left: 20px;
        padding-right: 20px;
        background: #EEEEFF;
        border: solid;
        border-color: #8E6C88;
    }
    .thread-content {
        margin: 0 42.5%;
        float: none;
        display: block;
    }
</style>