
@extends('layouts.app')

@section('content')    
   <section class="section">
        <div class="container is-widescreen">
            <form>
                @csrf
                <h3 class="is-size-3">Jquery Ajax Way</h3>
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
                <button class="button is-link" id="insert-post" type="button">Insert Posts</button>
            </form>
            <h3 class="is-size-3">Posts</h3>
            <div id="jquery-posts"></div>
        </div>
    </section>

    @section('script')
    <script>
        function load_post() {
            $.get("{{url('api/posts')}}", (res) => {
                let string = '<ul>';
                res.forEach(post => {
                    string += `<li><div class='card'><div class="card-content"><h4 class='title is-4'>${post.title}</h4><p class='subtitle is-6'>${post.body}</p></div></div></li>`;
                });
                string += "</ul>"
                $("#jquery-posts").html(string)
            })
        }
        $(() => {
            
            load_post();

            $("#insert-post").click((e) => {
                e.preventDefault();
                let title = $("#title").val();
                let body = $("#body").val();
                let csrf_token = "{{ csrf_token() }}";
                let post = {title : title, body : body, _token : csrf_token}
                $.post("{{url('api/posts')}}", post, function (res){
                    load_post();
                })
            })
            

        })
    </script>
        
    @endsection
@endsection
