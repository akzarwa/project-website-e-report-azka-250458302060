@extends('template.base')

@section('azka')


 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Table Data Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Data Category</li>
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
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Tambah Category</a>
              </div>
              <!-- ./card-header -->
              <div class="card-body table-responsive p-0">
                {{-- Alert Create --}}
                @if (Session::get ('success'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{ Session::get ('success')}}
                </div>
                @endif
                {{-- Alert delete --}}
                @if (Session::get ('delete'))
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{ Session::get ('delete')}}
                </div>
                @endif
                
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Category</th>
                      <th>Slug</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($category as $arwa)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $arwa->category}}</td>
                        <td>{{ $arwa->slug}}</td>
                        <td>
                            <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#edit{{ $arwa->id }}"><i class="fa-solid fa-pencil"></i></a>
                            @include('Admin.category.modalUpdate')
                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $arwa->id }}"><i class="fa-solid fa-trash"></i></a>
                            @include('Admin.category.modalDelete')
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
              <h4 class="modal-title">Tambah Data Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create.category')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="category" class="form-control" placeholder="Masukkan Data Category !">
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