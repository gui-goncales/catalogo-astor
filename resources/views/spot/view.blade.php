@extends('layouts.app')

@section('content')
    <div class="conteudo col-12 shadow-sm" style="width: 100%; overflow-x: auto;">
        <div class="container ">
            {{-- {{$response}} --}}
            <div class="col-6">
                <img class="card-img-top" src="holder.js/100x180/" alt="Title">
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$response[0]['Name']}}</h4>
                        <p class="card-text">{{$response[0]['Description']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
