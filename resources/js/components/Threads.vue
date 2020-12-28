<template>
    <div class="thread-content">
        <h2 class="">Threads</h2>
        <div class="card thread-container" v-for="thread in threads"
        v-bind:key="thread.id">
            <h3>{{ thread.title }}</h3>
            <p>{{ thread.content }}</p>
        </div>
        
    </div>
</template>

<script>
    export default {
        data() {
            return {
                threads: [],
                thread: {
                    id: '',
                    title: '',
                    content: '',
                    author: '',
                    comments: '',
                    author_id: ''
                },
                pagination: {},
                edit: false            
            }
        },

        created() {
            this.fetchThreads();
        },

        methods: {
            fetchThreads(pgUrl) {
                pgUrl = pgUrl || 'api/thread'
                fetch(pgUrl)
                    .then(res => res.json())
                    .then(res => { 
                        console.log(res.data) ;
                        this.threads = res.data;
                    })
            }
        }
    }
</script>

<style scoped>
    .card {
        max-width: 50%;
        margin: 0 auto;
        float: none;
    }  
    .thread-container {
        padding-top: 10px;
        padding-left: 20px;
        padding-right: 20px;
        background: #EEEEFF;
    }
</style>