@extends ('layouts/app') 
@section('titre') 
    VRT - RAPPORTS
@endsection 
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @isset($blogs) 
                @foreach($blogs as $blog)
                    <div class="card text-white bg-dark" style="margin:1rem;">
                        <div class="card-header text-center">
                            <h5>{{$blog->nom_raid}}</h5>
                        </div>
                        <div class="card-body">
                            <h5>Lien youtube : </h5><a href="{{$blog->lien_video}}" target="blank">{{$blog->lien_video}}</a><br/><br/>
                            <h5>Lien FFlogs : </h5><a href="{{$blog->lien_FFlogs}}" target="blank">{{$blog->lien_FFlogs}}</a><br/>
                            <hr/>
                            <h5>Commentaire :</h5>
                            <p class="card-text">{{$blog->commentaire}}</p>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>

<!--        PARTIE ADMIN -->
         <div class="col-md-3">
                <div class="card text-white bg-dark" style="margin:1rem;">
                    {!! Form ::open(['route'=>'blogs.store', 'method'=>'POST', 'files'=>false]) !!} 
                    {{Form::hidden('id_user', Auth::user()->id)}} 
                    <div class="card-header text-center">
                        Ecrire un rapport
                    </div>
                    <div class="card-body bg-secondary">
                        <!--    liste déroulante des raids (appeler nom_raid depuis la table events) pour créer le commentaire qui ira avec -->
<!--                            <div class="form-group">-->
                            <p class="card-text"> <!--recuperer le nom des raid avec l'id correspondant pour les afficher dans une liste déroulante!-->
                                {{ Form::Label('id_event','Raid :') }}
                                {{ Form::select('id_event', $events, null, ['class' => 'form-control']) }}
                            </p>
                            <p class="card-text">
                                {{Form::label('lien_video','Lien vidéo :')}} 
                                {{Form::text('lien_video','', ['class'=>'form-control','placeholder'=>'Lien vidéo'] ) }}
                            </p>
                            <p class="card-text">
                                {{Form::label('lien_FFlogs','Lien FFlogs :')}} {{Form::text('lien_FFlogs','', ['class'=>'form-control','placeholder'=>'Lien FFlogs'] ) }}
                            </p>
                            <p class="card-text">
                                {{Form::label('commentaire','Commentaire :')}} {{Form::textarea('commentaire','', ['class'=>'form-control','placeholder'=>'Commentaire'] ) }}
                            </p>
                        <hr/>
                        <div class="text-center">
                            {{Form::submit('Publier', ['class'=>'btn btn-dark'] ) }}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
<!--        FIN PARTIE ADMIN-->
    </div>
</div>
@endsection
