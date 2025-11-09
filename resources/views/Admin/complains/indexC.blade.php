@extends('template.base')

@section('azka')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tabel Data Complain</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard data complain</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        {{-- alert --}}
                        @if (Session::get('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        {{-- alert delete --}}
                        @if (Session::get('delete'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('delete') }}
                        </div>
                        @endif
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>no aduan</th>
                                    <th>nama pengadu</th>
                                    <th>kategori pengadu</th>
                                    <th>judul aduan</th>
                                    <th>status</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    @foreach($complain as $row)
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $row->no_aduan}}</td>
                                    <td>{{ $row->user_id}}</td>
                                    <td>{{ $row->category->category }}</td>
                                    <td>{{ $row->judul}}</td>
                                    <td>
                                        @if($row->status == 'pending')
                                        <span class="badge bg-warning">{{ $row->status }}</span>
                                        @elseif ($row->status == 'in_progress')
                                        <span class="badge bg-primary">{{ $row->status }}</span>
                                        @elseif ($row->status == 'resolved')
                                        <span class="badge bg-success">{{ $row->status }}</span>
                                        @elseif ($row->status == 'rejected')
                                        <span class="badge bg-danger">{{ $row->status }}</span>
                                        @else
                                        <span class="badge bg-secondary">{{ $row->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-outline-secondary" title="lihat detail"
                                            data-toggle="modal" data-target="#show{{ $row->id }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="" class="btn btn-outline-success" title="update status"
                                            data-toggle="modal" data-target="#editstatus{{ $row->id }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{route('response.form', ['complain_id' => $row->id])}}"
                                            class="btn btn-outline-primary" title="berikan tanggapan">
                                            <i class="fas fa-reply"></i>
                                        </a>
                                        <a href="" class="btn btn-outline-danger" title="hapus aduan">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

{{-- modal create --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create.category') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="category" placeholder="masukan data kategori" class="form-control">
                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection