
@section('content')
<link rel="stylesheet" href="/css/styles.css">
<div class="container-fluid"> 
    <div class="row row-profile"> 

        <div class="col-lg-6 img-container">
        </div>

        <div class="col-lg-6 info-container"> 
            <div class="box">
                <div class="box-header">
                    <h2>Meu Perfil</h2>
                </div>
                <div class="box-content" >
                    <h3>Informações do Usuário</h3>
                    <p><strong>Nome:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Nome de Usuário:</strong> {{ Auth::user()->username }}</p>
                </div>
            </div>
            <br>
            <div class="box box-content texto-alinhado">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
