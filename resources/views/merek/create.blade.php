@extends('layouts.app')

@section('content')

<section class="content col-md-6">

    @if ($errors->any())
        
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
           
    @endif

    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title">Form {{$title}} </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('merek.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>Nama Merek</p>
                            <input type="text" class="form-control" required name="nama" value="{{ old('nama') }}" >
                        </div>

                    </div>
            
                </div>
                <input type="submit">
                <a href="{{ route('merek.index') }}">Kembali</a>
            </form>
        </div>
    </div>
</section> 

@endsection