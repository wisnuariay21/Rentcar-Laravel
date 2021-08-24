@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <section class="content">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <h3 class="card-title">Selamat Datang Di Sistem Libra Rentcar</h3>
            </div>
        </div>
    </section>                  
                  
@endsection
