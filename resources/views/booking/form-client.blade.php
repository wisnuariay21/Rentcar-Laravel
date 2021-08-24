<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clientModalLabel">Isi form untuk melakukan pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('create-client') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>NIK</p>
                            <input type="number" class="form-control" required name="nik" value="{{ old('nik') }}">
                        </div>
                        <div class="form-group">
                            <p>Nama</p>
                            <input type="text" class="form-control" required name="nama" value="{{ old('nama') }}" >
                        </div>
                        <div class="form-group">
                            <p>Tanggal Lahir</p>
                            <input type="text" class="form-control" required name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" id="datepicker">
                        </div>
                        <div class="form-group">
                            <p>Telepon</p>
                            <input type="number" class="form-control" required name="telepon" value="{{ old('telepon') }}">
                        </div>
                        <div class="form-group">
                            <p>Jenis Kelamin</p>
                            <select name="jenkel" class="form-control">
                                <option value="laki-laki" {{ (old("jenkel") == 'laki-laki' ? "selected":"") }}>Laki-Laki</option>
                                <option value="perempuan" {{ (old("jenkel") == 'perempuan' ? "selected":"") }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Alamat</p>
                            <input type="text" class="form-control" required name="alamat" value="{{ old('alamat') }}">
                        </div>
                    </div>
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>
</div>