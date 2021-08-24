@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Registrasi</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggans as $row)
                    @php $create = explode(' ', $row['created_at']);  @endphp

                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $row['nik'] }}</td>
                        <td>{{ $row['nama'] }}</td>
                        <td>{{ $row['tanggal_lahir'] }}</td>
                        <td>{{ $row['telepon'] }}</td>
                        <td>{{ $row['alamat'] }}</td>
                        <td>{{ $row['jenkel'] }}</td>
                        <td>{{ $create[0] }}</td>
                        <td> 
                            <a href="{{ route('pelanggan.edit',  ['id' => $row["pelanggan_id"]]) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            <a data-id="{{$row['pelanggan_id']}}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
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
                url : "{{url('/')}}/pelanggan/"+id,
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