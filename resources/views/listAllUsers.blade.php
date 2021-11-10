<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<title>Listagem de Usuários</title>
</head>
<body>
    <section class="container" style="margin-top: 30px">
        <h1>Usuários Cadastrados</h1>
        <p><a href=" {{route('user.create')}} " class="btn btn-secondary" style="margin-top: 10px;"><i class="fas fa-user-plus"></i> Novo Usuário</a></p>
        <table  class="table table-hover table-success table-striped">
            <tr>
                <td><strong>ID#</strong></td>
                <td><strong>Nome</strong></td>
                <td><strong>E-mail</strong></td>
                <td><strong style="margin-left: 60px">Ações</strong></td>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td data-toggle="tooltip" data-placement="top" title="Ver usuário {{$user->name}}"><a href="{{route('user.show', ['user' => $user->id])}}"> {{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td> 
                    <div class="row" style="justify-content: flex-end">
                        <div class="col-6 col-xl-6" style="margin-right: -40px;">
                            <a href="{{ route('user.edit', ['user' => $user->id]) }}"><button type="submit" value="Remover" class="btn btn-info"><i class="fas fa-user-edit"></i> Editar</button></a>
                        </div>
                        <div class="col-6 col-xl-6">
                            <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" value="Remover" class="btn btn-danger"><i class="fas fa-trash"></i> Remover</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </section>
</body>
</html>