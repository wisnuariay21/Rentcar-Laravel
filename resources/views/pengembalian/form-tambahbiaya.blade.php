<div class="modal fade" id="biayaKerusakan" tabindex="-1" role="dialog" aria-labelledby="biayaKerusakanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="biayaKerusakanLabel">Tambah Biaya Kerusakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('#') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>Jumlah Biaya</p>
                            <input type="number" name="denda_rusak" class="form-control" value="{{ old('denda_rusak') }}">  
                        </div>
                    </div>
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>
</div>