<template>
    <div >
        <div class="thread-content">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pag.prev}]" class="page-item">
                    <a class="page-link w3-wide custom-txt" href="#" @click="fetchThreads(pag.prev)">Prev</a>
                </li>

                <li v-bind:class="[{disabled: !pag.next}]" class="page-item">
                    <a class="page-link w3-wide custom-txt" href="#" @click="fetchThreads(pag.next)">Next</a>
                </li>
            </ul>
        </div>
        <div class="card thread-container" v-for="thread in threads"
        v-bind:key="thread.id">
            <h3 class="thread-txt">{{ thread.title }}</h3>
            <p class="thread-txt">{{ thread.content }}</p>
            <a href="#" @click="openThread(thread.id)">
                <h5 class="thread-txt">{{ thread.comments }} comment(s) >></h5>
            </a>
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
                    user_id: ''
                },
                pag: {},
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
                        fakeThis.makePag(response.links, response.meta);
                    })
                    .catch(err => console.log(err));
            },
            makePag(links, meta) {
                let pag = {
                    currentPage: meta.current_page,
                    last: meta.last_page,
                    next: links.next,
                    prev: links.prev
                }

                this.pag = pag;
            },
            openThread(id) {
                var dest = new URL(`thread/${id}`, window.location);
                console.log(dest.pathname);
                window.location = dest.href;
            }
        }
    }
</script>

<style scoped>
    .thread-txt {
        color: #181D20;
        text-decoration: none;
    }
    .custom-txt {
        font-weight: 600;
        text-transform: uppercase;
        color: #8E6C88;
    }
    .pag {
        margin: 0 auto;
        float: none;
    }
    .card {
        max-width: 50%;
        margin: 0 auto;
        float: none;
    }  
    .thread-container {
        margin-bottom: 5px;
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