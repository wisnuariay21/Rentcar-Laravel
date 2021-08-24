@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('karyawan.create') }}" class="btn btn-primary">Add New </a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal Registrasi</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($karyawans as $row)
                    @php $create = explode(' ', $row['created_at']);  @endphp

                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['email'] }}</td>
                        <td>{{ $create[0] }}</td>
                       
                        <td> 
                            <a href="{{ route('karyawan.edit',  ['id' => $row["id"]]) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section>                  

@endsection