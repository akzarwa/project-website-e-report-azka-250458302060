@extends('template.base')

@section('azka')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Data Complain</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

 <section class="content">
    <div class="container-fluid">
               <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ route('form.aduan') }}" class="btn btn-primary btn-sm">Tambahkan Aduanmu, Disini Friend!</a>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control
                    float-right" placeholder="Search">

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
                <!-- Alert Create -->
                @if(Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert"
                  aria-hidden="true">&times;</button>
                  <h4>{{ Session::get('success') }}</h4>
                </div>
                @endif
                <!-- Alert Delete -->
                @if(Session::get('delete'))
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6>{{ Session::get('delete') }}</h6>
                </div>
                @endif
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>kategori Aduan</th>
                      <th>Nomor Aduan</th>
                      <th>Judul</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $aduan as $row )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->kate->category }}</td>
                        <td>{{ $row->no_aduan }}</td>
                        <td>{{ $row->judul }}</td>
                        <td>
                          <a href="" class="btn btn-outline-success" data-toggle="modal" data-target="#show{{ $row->id }}" >
                            <i class="fas fa-eye"></i></a>
                            @include('User.complains.showComplain')
                            <a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete{{ $row->id }}">
                              <i class="fas fa-trash"></i></a>
                              @include('User.complains.modalDel')
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

 <!-- Modal Create -->
        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Data Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create.category') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="category" class="form-control" placeholder="Masukkan Data Category">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit"  class="btn btn-primary">Simpan</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection