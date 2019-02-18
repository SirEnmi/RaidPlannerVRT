@extends ('layouts/app')

@section('titre') 
    VRT - ADMINISTRATION
@endsection

@section('content')
    <table class="table table-striped" id="tableauAdmin">
        <thead class="bg-dark">
            <tr>
                <th scope="col">Utilisateur</th>
                <th scope="col">Email</th>
                <th scope="col">Id Personnage</th>
                <th scope="col">Admin</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody class="bg-secondary">
            @isset($users) 
                @foreach($users as $user)
                    <tr>
                        <td><b>{{$user->name}}</b></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->id_lodestone}}</td>
                        <td>{{$user->role}}</td>
<!--                        Méthode pour modifier user -->
                        <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
<!--                        Méthode pour supprimer via formumlaire-->
                        <td>
                        {!!Form::open(['method'=>'DELETE','route'=>['users.destroy', $user->id]])!!}
                        {!!Form::submit('X', ['class'=>'btn btn-danger'])!!}
                        {!!Form::close()!!}
                        </td>
                    </tr>
                @endforeach 
            @endisset
        </tbody>
    </table>
@endsection
