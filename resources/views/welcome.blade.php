{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <leaderboard :current="{{ auth()->user() ? auth()->user()->id : 0 }}"></leaderboard>
            </div>
        </div>
    </div>
@endsection