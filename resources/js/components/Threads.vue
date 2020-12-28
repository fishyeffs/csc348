<template>
    <div >
        <div class="thread-content">
            <h2>Threads</h2>
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev}]" class="page-item">
                    <a class="page-link" href="#" @click="fetchThreads(pagination.prev)">Previous</a>
                </li>
                <li v-bind:class="[{disabled: !pagination.next}]" class="page-item">
                    <a class="page-link" href="#" @click="fetchThreads(pagination.next)">Next</a>
                </li>
            </ul>
        </div>
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
                let fakeThis = this;
                pgUrl = pgUrl || '/api/thread'
                fetch(pgUrl)
                    .then(response => response.json())
                    .then(response => { 
                        console.log(response.data) ;
                        this.threads = response.data;
                        console.log(response.meta);
                        console.log(response.links.next)
                        fakeThis.makePagination(response.links, response.meta);
                    })
                    .catch(err => console.log(err));
            },
            makePagination(links, meta) {
                let pagination = {
                    currentPage: meta.current_page,
                    last: meta.last_page,
                    next: links.next,
                    prev: links.prev
                }

                this.pagination = pagination;
            }
        }
    }
</script>

<style scoped>
    .pagination {
        margin: 0 auto;
        float: none;
    }
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
    .thread-content {
        margin: 0 45%;
        float: none;
        display: inline-block;
    }
</style>