<div class="card-body">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group">
        <label for="nama_kapal">Nama Kapal</label>
        <input type="text" class="form-control" id="nama_kapal" name="nama_kapal" placeholder="Nama Kapal" value="{{ old('nama_kapal') ?? $item->nama_kapal }}">
    </div>

    <div class="form-group">
        <label for="nama_pemilik">Nama Pemilik</label>
        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Nama Pemilik" value="{{ old('nama_pemilik') ?? $item->nama_pemilik }}">
    </div>

    <div class="form-group">
        <label for="pk_gt">Ukuran (pk/gt)</label>
        <input type="text" class="form-control" id="pk_gt" name="pk_gt" placeholder="Ukuran Kapal" value="{{ old('pk_gt') ?? $item->pk_gt }}">
    </div>

    <div class="form-group">
        <label for="alamat_usaha">Alamat Usaha</label>
        <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha" placeholder="Alamat Usaha" value="{{ old('alamat_usaha') ?? $item->alamat_usaha }}">
    </div>

    <div class="form-group">
        <label for="jenis_usaha">Jenis usaha</label>
        <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" placeholder="Jenis usaha" value="{{ old('jenis_usaha') ?? $item->jenis_usaha }}">
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $submit ?? 'Create' }}</button>
</div>