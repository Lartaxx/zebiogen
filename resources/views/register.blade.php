@if(session()->has('message'))
    <div class="alert alert-danger">
       {{ session()->get('message') }}
        </div>
@else
        {{ "Salut y a rien" }}
@endif