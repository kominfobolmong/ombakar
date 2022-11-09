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
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penyalur" value="{{ old('nama') ?? $item->nama }}">
    </div>

    <div class="form-group">
        <label for="nomor_lembaga">Nomor Lembaga</label>
        <input type="text" class="form-control" id="nomor_lembaga" name="nomor_lembaga" placeholder="Nomor Lembaga" value="{{ old('nomor_lembaga') ?? $item->nomor_lembaga }}">
    </div>

    <div class="form-group">
        <label for="lokasi">Lokasi</label>
        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Penyalur" value="{{ old('lokasi') ?? $item->lokasi }}">
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $submit ?? 'Create' }}</button>
</div>