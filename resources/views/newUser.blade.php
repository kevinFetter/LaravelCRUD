<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<title>Cadastrar Usuario</title>
</head>
<body>
    <section class="container mt-5">
        <h1 class="mb-5">Cadastrar Usuário</h1>
        {{-- rota responsável por persistir os dados do form no DB --}}
        <form  action="{{ route('user.store') }}" method="post" class="needs-validation" novalidate>
            @csrf
            <div class="row">
              <div class="col-4 col-md-4 mb-3">
                <label for="validationTooltip01">Nome do Usuário</label>
                <input type="text" class="form-control" name="name" placeholder="Seu nome" id="validationTooltip01" required>
                <div class="valid-tooltip">
                  Muito bem!
                </div>
              </div>
              <div class="col-4 col-md-4 mb-3">
                <label for="validationTooltipUsername">Email</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                  </div>
                  <input type="text" class="form-control" name="email" id="validationTooltipUsername" placeholder="Seu email" aria-describedby="validationTooltipUsernamePrepend" required>
                  <div class="invalid-tooltip">
                    Por favor, cadastre um E-mail válido.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-4 col-md-4 mb-3">
                <label for="validationTooltip03">Senha</label>
                <input type="password" class="form-control" name="password" id="validationTooltip03" placeholder="Nova senha" required>
                <div class="invalid-tooltip">
                  Por favor, Coloque uma Senha válida.
                </div>
              </div>
            <button class="btn btn-outline-primary mt-3" type="submit" style="margin-right: 8px;"><i class="fas fa-plus-circle"></i> Cadastrar Usuário</button>
            <a href="{{ route('user.index') }}"><button type="button" class="btn btn-outline-secondary mt-3"> <i class="fas fa-arrow-circle-left"></i> Voltar</button></a>
          </form>
    </section>
</body>
</html>
