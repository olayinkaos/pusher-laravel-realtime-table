@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default text-center">
                <div class="panel-heading">Welcome to the most fun game in the world!</div>

                <div class="panel-body">
                    @if($value = session('value'))
                        <div class="alert alert-success">
                            <h2>Congrats {{ auth()->user()->name }}! Your score just increased by {{ $value }}.</h2>
                            <h4>Your current score is {{ auth()->user()->score }}</h4>
                        </div>
                    @endif
                    <h4 class="text-center">Click a card and choose your fate.</h4>
                    <div class="row">
                        @foreach($cards as $card)
                            <div class="col-sm-4">
                                <a href="{{ route('card', $card->id) }}">
                                    <div class="card" style="background-color: {{$card->color}}; height: 100px;"></div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="panel-heading">You can always check the <a href="/">leaderboard</a> for your ranking.</div>

            </div>
        </div>
    </div>
</div>
@endsection