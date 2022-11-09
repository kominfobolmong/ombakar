@extends('layouts.backend.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-text-width"></i>
                Detail Kapal
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <dl class="row">
                <dt class="col-sm-4">Nama Kapal</dt>
                <dd class="col-sm-8">{{ $item->nama_kapal }}</dd>
                <dt class="col-sm-4">Pemilik</dt>
                <dd class="col-sm-8">{{ $item->nama_pemilik }}</dd>
                <dt class="col-sm-4">PK/GT</dt>
                <dd class="col-sm-8">{{ $item->pk_gt }}</a></dd>
                <dt class="col-sm-4">Alamat</dt>
                <dd class="col-sm-8">{{ $item->alamat_usaha }}</dd>
                <dt class="col-sm-4">Jenis Usaha</dt>
                <dd class="col-sm-8">{{ $item->jenis_usaha }}</dd>
                <dt class="col-sm-4">Author</dt>
                <dd class="col-sm-8">{{ $item->user->name }}</dd>
            </dl>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection