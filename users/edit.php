@extends ('layouts/app')

@section('titre') 
    VRT - ADMINISTRATION -MODIFIER PROFIL
@endsection

@section('content')
 <div class="card text-white bg-dark" style="margin:1rem;">
     
        {!! Form::model($user,['method'=>'PATCH','route'=>['users.update', $user->id]
        ]) !!}
            <div class="card-body">
                <p class="card-text">
                    {!!Form::label('name','Nom :')!!} 
                    {!!Form::text('name', null , ['class'=>'form-control','placeholder'=>'Nom'] ) !!}
                </p>
                <p class="card-text">
                    {!!Form::label('email','Email :')!!} 
                    {!!Form::email('email',null, ['class'=>'form-control','placeholder'=>'Email'] ) !!}
                </p>
                <p class="card-text">
                    {!!Form::label('id_lodestone','Id personnage :')!!} 
                    {!!Form::text('personnage[id_lodestone]', null , ['class'=>'form-control','placeholder'=>'Id Personnage'] ) !!}
                </p>
                <p class="card-text">
                    {!!Form::label('role','Admin')!!} 
                    {!!Form::radio('role','1', ['class'=>'form-control'] ) !!}
                    {!!Form::label('role','User')!!} 
                    {!!Form::radio('role','0', ['class'=>'form-control'] ) !!}
                </p>
                <div class="text-center">
                    {!!Form::submit('Modifier', ['class'=>'btn btn-white'] ) !!}
                </div>
            </div>
        {!! Form::close() !!}
</div>
@endsection