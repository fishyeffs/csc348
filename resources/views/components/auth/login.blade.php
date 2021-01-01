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

<div class = "content">
    <head>
        <title>Home</title>
    </head>
    <!--header-->
    <container class="header-container">
        <h2 class="w3-wide heading-text-2 nav-header-text horizontal">the_forum</h2>
        <nav class="nav nav-a horizontal a-padding"> 
            <ul>
                @auth 
                    <li class="horizontal a-padding">
                        <a href="{{ route('home') }}"><p class="w3-wide heading-text-1">home</p></a>
                    </li>
                    <li class="horizontal a-padding">
                        <a href="{{ route('profile') }}"><p class="w3-wide heading-text-1">profile</p></a>
                    </li>
                    <li class="horizontal a-padding">
                        <a href="#"><p class="w3-wide heading-text-1">log out</p></a>
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
    </container>
        <!--end header-->
    <div class="flex justify-center">
        <form method="post" action="{{ route('login') }}">
            <div class="card">
                @csrf
                <input type="text" id="email" name="email" placeholder="Email" class="w-full border-2 rounded-lg p-3" value="{{ old('email') }}">
                <input type="password" id="password" name="password" placeholder="Password" class="w-full border-2 rounded-lg p-3" value="">
            </div>

            <div class="card">
                <button type="submit" class="btn-style rounded signup font-medium">Login</button>
                @error('email')
                    <div class="error-txt"> {{ $message }}</div>
                @enderror
                @error('password')
                    <div class="error-txt"> {{ $message }}</div>
                @enderror
                @if (session('status'))
                    <div class="error-txt">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>