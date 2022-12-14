@extends('layouts.backend.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Surat Permohonan</h3>
                            <a href="{{ route('surat_permohonan.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Create
                            </a>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Kapal</th>
                                    <th>Pemilik Kapal</th>
                                    <th>Pemohon</th>
                                    <th style="width: 170px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                <tr>
                                    <td>{{ $items->count() * ($items->currentPage() - 1) + $loop->iteration }}</td>
                                    <td>{{ $item->nama_kapal }}</td>
                                    <td>{{ $item->nama_pemilik }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <a href="{{ route('kapal.show', $item->id) }}" class="btn btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('kapal.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('kapal.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Empty</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection