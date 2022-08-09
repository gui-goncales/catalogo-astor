@extends('layouts.app')

@section('content')
<div class="deciding-page containerDashboard col-12">
    <div class="column col-12 col-sm-6 col-lg-5">
        <div class="card">
            {{-- <img class="card-img-top" src="holder.js/100x180/" alt="Charlles - XBZ"> --}}
            <div class="card-body">
                <h4 class="card-title">Charlles</h4>
                <p>Faça a sua busca personalizada, muitas variedades de produtos!</p>
                <p class="card-text">
                    <a class="btn btn-primary btn_default" href="{{ route('xbz') }}">Buscar</a>
                </p>
            </div>
        </div>
    </div>
    <div class="column col-12 col-sm-6 col-lg-5">
        <div class="card">
            {{-- <img class="card-img-top" src="holder.js/100x180/" alt="Ju - SPOT"> --}}
            <div class="card-body">
                <h4 class="card-title">Ju</h4>
                <p>Faça a sua busca personalizada, muitas variedades de produtos!</p>
                <p class="card-text">
                    <a class="btn btn-primary btn_default" href="{{ route('spot') }}">Buscar</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection