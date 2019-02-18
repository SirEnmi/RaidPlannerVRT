@extends ('layouts/app') 
@section('titre') 
    VRT - DEVOTION DOCTRINE
@endsection 
@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @isset($wafs) 
                @foreach($wafs as $waf)
                    <div class="card text-white bg-dark" style="margin:1rem;">
                        <div class="card-header">
                            <h6><b>{{$waf->titre}}</b></h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><cite>&rdquo;{{$waf->texte}}&bdquo;</cite></p>
                        </div>
                    </div>
                @endforeach 
            @endisset
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-dark" style="margin:1rem;">
                {!! Form ::open(['route'=>'webagencyfail.store', 'method'=>'POST', 'files'=>false]) !!} 
                    {{Form::hidden('id_user', Auth::user()->id)}}
                    <div class="card-header text-center">
                        Ecrire une entrée
                    </div>
                    <div class="card-body bg-secondary">
                        <p class="card-text">
                            {{Form::label('titre','Titre :')}} 
                            {{Form::text('titre','', ['class'=>'form-control','placeholder'=>'Titre'] ) }}
                        </p>
                        
                        <p class="card-text">
                            {{Form::label('texte','Texte :')}} 
                            {{Form::textarea('texte','', ['class'=>'form-control','placeholder'=>'Message'] ) }}
                        </p>
                        <hr/>
                        <div class="text-center">
                            {{Form::submit('Envoyer', ['class'=>'btn btn-dark'] ) }}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
