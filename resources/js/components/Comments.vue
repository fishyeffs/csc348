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
        <div class="card thread-container" v-for="comment in comments"
        v-bind:key="comment.id">
            <h5 class="thread-txt">{{ comment.author }}</h5>
            <p class="thread-txt">{{ comment.content }}</p>
        </div>
    </div>
</template>

<script>
import { log } from 'util';
    export default {
        data() {
            return {
                comments: [],
                comment: {
                    id: '',
                    content: '',
                    author: '',
                    user_id: '',
                    thread_id: ''
                },
                pag: {},
                edit: false            
            }
        },

        created() {
            this.fetchThreads(window.location.pathname.substring(8));
        },

        methods: {
            async fetchThreads(id) {
                let fakeThis = this;
                console.log(id);
                var pgUrl = ['/api/comment',`${id}`].join('/');
                console.log(pgUrl);
                await fetch(pgUrl)
                    .then(response => response.json())
                    .then(response => {
                        console.log("somehow there's no response");
                        console.log(response) ; 
                        this.comments = response.data;
                        //console.log(response.meta);
                        //console.log(response.links.next)
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
        margin: 0 45%;
        float: none;
        display: block;
    }
</style>