<template>
    <form @submit.prevent="submitForm">
        <h3 class="is-size-3">Vue Axios Way</h3>
        <div class="field">
            <div class="control">
                <label>Title</label>
                <input class="input is-primary" type="text" v-model='title'>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <label>Body</label>
                <input class="input is-primary" type="text" v-model='body'>
            </div>
        </div>
        <button class="button is-link">Insert Posts</button>
        <h3 class="is-size-3">Posts</h3>
        <section>
            <ul>
                <li v-for="post in posts" :key = "post.id">
                    <div class="card">
                        <div class="card-content">
                            <h4 class='title is-4' v-text="post.title"></h4>
                            <p class='subtitle is-6' v-text="post.body"></p>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                title: '',
                body: '',
                posts: []
            }
        },
        mounted() {
            // load all post
            this.loadPost();
        },
        methods: {
            submitForm() {
                let post = {title: this.title, body: this.body}
                axios.post('/api/posts', post)
                    .then(res => {
                        this.loadPost();
                        console.log(res.data)
                    })
                    .catch(err => {
                        console.error(err)
                    })
            },
            loadPost() {
                axios.get("/api/posts")
                    .then(res => {
                        this.posts = res.data
                        console.log(this.posts)
                    })
            }
        }
    }
</script>
