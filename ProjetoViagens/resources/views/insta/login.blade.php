<link rel="stylesheet" href="/css/styles.css">
@section('content')
<div class="container-fluid">
    <div class="row row-login">
        <div class="col-lg-6 img-container">
            <img src="https://images.vexels.com/media/users/3/145797/isolated/preview/efb294b147c67b1ee6ff84041f7c11c2-aviao-decolando.png" alt="MVPGram" class="img-fluid">
        </div>

        <div class="col-lg-6 form-container">
            <div class="box">
                <div class="box-header">
                    <h2>PROJETO VIAGEM</h2>
                </div>
                <div class="box-content">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="post" class="formLogin">
                        @csrf <!-- Adicione essa diretiva para proteção contra CSRF -->
                        <input type="text" class="form-control" placeholder="E-mail de usuário" name="email">
                        <br>
                        <input type="password" class="form-control" placeholder="Senha" name="password">
                        <br>
                        <input type="submit" class="btn btn-insta" value="Login">
                    </form>
                </div>
            </div>

            <br>
            <br>
            <div class="box box-content texto-alinhado">
                Não tem conta ainda? <a href="/register">Cadastre-se agora</a>
            </div>
        </div>
    </div>
</div>
@endsection


