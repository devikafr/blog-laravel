@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Heroes</div>
                <div class="panel-body">
                  @if(! empty($heroes))
                    @foreach($heroes as $hero)
                      {{ $hero->name }}
                      @foreach($hero->superpowers as $superpower)
                        {{ $superpower->name }}
                      @endforeach
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
