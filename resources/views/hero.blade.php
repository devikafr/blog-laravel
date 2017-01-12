@extends('layouts.app')
@section('content')
  <link href="/css/styles.css" rel="stylesheet">


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"style="background-color:#d6d6c2">Heroes</div>
                <div class="panel-body">

                  @if(! empty($heroes))
                      {!! Form::open(['url' => 'hero/new']) !!}
                    @foreach($heroes as $hero)
                      <button class="b1"><a href="/hero/{{$hero->id}}/update">Update</a></button>
                      <button class="b1"><a href="/hero/{{$hero->id}}/delete">Delete</a></button>
                      {{ $hero->name }}
                      @foreach($hero->superpowers as $superpower)
                        <span>{{ $superpower->name }}</span>
                      @endforeach
                      @if($hero->nemesis != null)
                        <span>NEMESIS : <b>{{$hero->nemesis->name}}</b></span>
                      @endif
                      <br>
                    @endforeach
                  @elseif(! empty($hero))
                    {{ $hero->name }}
                    @foreach($hero->superpowers as $superpower)
                      {{ $superpower->name }}
                    @endforeach
                  @else
                    Aucun hero affiché
                  @endif
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
