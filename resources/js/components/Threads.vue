<template>
    <div>
        <h2 class="nav-header-text">Threads</h2>
        <div class="card mb-6" v-for="thread in threads"
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