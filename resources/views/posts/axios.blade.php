@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container is-widescreen">
            <form method="POST" action="/api/posts" id="insert-post">
                @csrf
                <h3 class="is-size-3">Axios Way</h3>
                <div class="field">
                    <div class="control">
                        <label>Title</label>
                        <input class="input is-primary" type="text" name="title" id="title">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label>Body</label>
                        <input class="input is-primary" type="text" name="body" id="body">
                    </div>
                </div>
                <button class="button is-link" id="axios-insert" type="button">Insert Posts</button>
            </form>
            <h3 class="is-size-3">Posts</h3>
            <div id="jquery-posts"></div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // obviously you can use jquery to do the below lols
        // i just want to show how to use axios to make ajax request
        document.getElementById("axios-insert").addEventListener('click', function() {
            let title = document.getElementById("title").value;
            let body = document.getElementById("body").value;
            let post = {'title' : title, 'body' : body}
            axios.post("{{url('api/posts')}}", post)
                .then(res => {
                    load_post();
                })
                .catch(err => {
                    console.error(err)
                })
        })
        function load_post() {
            axios.get("{{url('api/posts')}}")
            .then(res => {
                let string = '<ul>';
                res.data.forEach(post => {
                    string += `<li><div class='card'><div class="card-content"><h4 class='title is-4'>${post.title}</h4><p class='subtitle is-6'>${post.body}</p></div></div></li>`;
                });
                string += "</ul>"
                $("#jquery-posts").html(string)
            })
        }
        $(() => {
            load_post();
        })
    </script>
@endsection
        

        