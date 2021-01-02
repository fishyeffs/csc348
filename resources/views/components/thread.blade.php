<div class = "content">
    <head>
        <meta charset = "UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel={csrfToken: "{{ csrf_token() }}"}</script> 
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <title>Home</title>
    </head>
    <!--header-->
    <div class="header-container">
        <h2 class="w3-wide heading-text-2 nav-header-text horizontal">the_forum</h2>
        <nav class="nav nav-a horizontal a-padding"> 
            <ul>
                @auth 
                    <li class="horizontal a-padding">
                        <a href="{{ route('createThreadForm') }}"><p class="w3-wide heading-text-1">create</p></a>
                    </li>
                    <li class="horizontal a-padding">
                        <a href="{{ route('home') }}"><p class="w3-wide heading-text-1">home</p></a>
                    </li>
                    <li class="horizontal a-padding">
                        <a href="{{ route('profile') }}"><p class="w3-wide heading-text-1">profile</p></a>
                    </li>
                    <li class="horizontal a-padding">
                        <a href="{{ route('logout') }}"><p class="w3-wide heading-text-1">log out</p></a>
                    </li>
                @endauth

                @guest 
                    <li class="horizontal a-padding">
                        <a href="{{ route('home') }}"><p class="w3-wide heading-text-1">home</p></a>
                    </li>
                    <li class="horizontal a-padding">
                        <a href="{{ route('profile') }}"><p class="w3-wide heading-text-1">profile</p></a>
                    </li>
                    <li class="horizontal a-padding">
                        <a href="{{ route('signup') }}"><p class="w3-wide heading-text-1">sign up</p></a>
                    </li>
                    <li class="horizontal a-padding">
                        <a href="{{ route('login') }}"><p class="w3-wide heading-text-1">log in</p></a>
                    </li>
                @endguest
            </ul>
        </nav> 
    </div>
        <!--end header-->
    <body>
        <div id="app">
            <single-thread></single-thread>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    
        <div class="flex justify-center">
            <form method="post" action="{{ route('store-comment') }}">
                <div class="card">
                    @csrf
                    <h5>Comment</h5>
                    <textarea type="text" id="content" name="content" placeholder="Write something..." 
                        class="w-full border-2 rounded-lg p-3" value="{{ old('comment') }}"></textarea>
                </div>
    
                <div class="card">
                    <button  type="submit" class="btn-style rounded signup font-medium">Comment</button>
                    @error('content')
                        <div class="error-txt"> {{ $message }}</div>
                    @enderror
                </div>
            </form>
        </div>
    </body>
</div>