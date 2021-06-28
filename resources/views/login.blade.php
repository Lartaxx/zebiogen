<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
    <link rel="shortcut icon" href="{{ url("images/favicon.png") }}" />

    <title>Zebiogen | Menu des connexions</title>
</head>
<body>
    @if (session('error.no_user'))
    <div class="alert alert-danger alert-dismissible show" role="alert">
        {{ session('error.no_user') }}
        <button type="button" class="close" data-dismiss="alert" >
            <span aria-hidden="true">x</span>
          </button>
    </div>
    @elseif (session('error.email_already_own'))
    <div class="alert alert-danger alert-dismissible show" role="alert">
        {{ session('error.email_already_own') }}
        <button type="button" class="close" data-dismiss="alert" >
            <span aria-hidden="true">x</span>
          </button>
    </div>
@endif
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible  show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" >
                    <span aria-hidden="true">x</span>
                  </button>
            </div>
        @endforeach
    @endif
        @if(!Auth::user())
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="{{ url('/login') }}" method="POST">
                    @method("post")
                    @csrf
                    <h1>Inscription</h1>
                    <input type="text" placeholder="Prénom" name="pseudo" />
                    <input type="email" placeholder="Email" name="email" />
                    <input type="password" placeholder="Mot de passe" name="password"/>
                    <button type="submit">S'inscrire</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="{{ url('/login') }}" method="POST" id="co">
                    @method("post")
                    @csrf
                    <h1>Connexion</h1>
                    <input type="text" placeholder="Email" name="pseudo" />
                    <input type="password" placeholder="Mot de passe" name="password" />
                    <button type="submit">Se connecter</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Ouf !</h1>
                        <p>Vite !, inscrivez-vous pour pouvoir accéder au panel !</p>
                        <button class="ghost" id="signIn">Se connecter</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Re !</h1>
                        <p>Entrez vos coordonnées pour accéder au panel</p>
                        <button class="ghost" id="signUp">Créer un compte</button>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript" src="{{ url('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    </body>
</html>
@else
    {{ Redirect::to("/home") }}}}
@endif



