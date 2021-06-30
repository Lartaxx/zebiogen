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
    @if(session("success.email"))
    <div class="alert alert-danger alert-dismissible show" role="alert">
        {{ session('success.email') }}
        <button type="button" class="close" data-dismiss="alert" >
            <span aria-hidden="true">x</span>
          </button>
    </div>
    @elseif(session("error.email"))
    <div class="alert alert-danger alert-dismissible show" role="alert">
        {{ session('error.email') }}
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
            <div class="form-container sign-in-container">
                <form action="{{ url('/reset-password') }}" method="POST" id="co">
                    @method("post")
                    @csrf
                    <h1>Réinitialiser son mot de passe</h1>
                    <input type="email" placeholder="Votre email" name="email" />
                    <input type="hidden" value={{ $token }} name="token">
                    <input type="password" placeholder="Votre nouveau mot de passe" name="password" />
                    <input type="password" placeholder="Confirmez votre mot de passe" name="password_confirmation" />
                    <button type="submit">Envoyer</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1>Vous n'avez pas de compte ?</h1>
                        <p>Inscrivez-vous pour accéder au panel</p>
                        <a href="{{ route("login") }}">
                        <button class="ghost" id="signUp">Créer un compte</button>
                        </a>
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



