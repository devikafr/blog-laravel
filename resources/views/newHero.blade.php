@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create New hero</div>

                <div class="panel-body">
                  {!! Form::open(['url' => 'hero/new']) !!}
                    {{ Form::label('name', 'nom du Hero') }}
                    {{ Form::text('name') }}
                    {{Form::label('force', 'Force du Hero')}}
                    {{ Form::text('force') }}
                    {{ Form::select('sex', [0 => 'autre', 1=> 'Masculin', 2=> 'Feminin'])}}
                    {{ Form::submit('Creer')}}
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
