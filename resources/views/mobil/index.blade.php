@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('mobil.create') }}" class="btn btn-primary">Tambah Data</a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tahun</th>
                        <th>No Polisi</th>
                        <th>Harga</th>
                        <th>Tipe</th>
                        <th>Merek</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mobils as $row)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $row['nama_mobil'] }}</td>
                        <td>{{ $row['tahun'] }}</td>
                        <td>{{ $row['nopol'] }}</td>
                        <td>{{ number_format($row['harga_sewa']) }}</td>
                        <td>{{ $row['tipe'] }}</td>
                        <td>{{ $row->merek['nama'] }}</td>
                        <td>{{ $row['status_sewa'] }}</td>
                        <td> 
                            <a href="{{ route('mobil.edit',  ['mobil_id' => $row["mobil_id"]]) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            <a data-id="{{$row['mobil_id']}}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section>                  

@endsection

@push('scripts')
<script>
    $(".delete-btn").click(function(){
        let id = $(this).attr('data-id');
        if(confirm("Apa anda yakin akan menghapus? ")) {
            $.ajax({
                url : "{{url('/')}}/mobil/"+id,
                method : "POST",
                data : {
                    _token : "{{csrf_token()}}",
                    _method : "DELETE",
                }
            })
            .then(function(data){
                location.reload();
            });
        }
    })
</script>
@endpush