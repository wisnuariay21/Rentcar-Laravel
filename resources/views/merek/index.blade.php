@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('merek.create') }}" class="btn btn-primary">Add New </a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Merek Mobil</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mereks as $row)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $row['nama'] }}</td>
                        <td> 
                            <a href="{{ route('merek.edit',  ['merek_id' => $row["merek_id"]]) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            <a data-id="{{$row->merek_id}}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
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
                url : "{{url('/')}}/merek/"+id,
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