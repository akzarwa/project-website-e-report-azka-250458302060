@extends('template.base')

@section('azka')


 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Table Data Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Data Users</li>
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
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Tambah Users</a>
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
                      <th>Nama Lengkap</th>
                      <th>Nomor Telepon</th>
                      <th>Email</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($user as $row)

                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $row->name}}</td>
                        <td>{{ $row->phone}}</td>
                        <td>{{ $row->email}}</td>
                        <td>
                          <img src="{{ asset('storage/public/usersImages/'. $row->image) }}" width="50px" class="rounded" alt="">
                        </td>
                        <td>
                            <a href="" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
                            <a href="" class="btn btn-outline-secondary" data-toggle="modal" data-target="#edit{{ $row->id }}"><i class="fa-solid fa-pencil"></i></a>
                            @include('Admin.dataUser.modalUpdate')


                            
                            <a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete{{ $row->id }}"><i class="fa-solid fa-trash"></i></a>
                            @include('Admin.dataUser.modalDelete')
                        </td>
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
              <h4 class="modal-title">Tambah Data Users</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                      <label class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" name="name" required placeholder=". . .">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" required placeholder=". . .">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Nomor Telepon</label>
                      <input type="number" class="form-control" name="phone" required placeholder=". . .">
                    </div>
                    <div class="form-group">
                      <label class="form-label">NIK</label>
                      <input type="number" class="form-control" name="nik" required placeholder=". . .">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Foto Profile</label>
                      <input type="file" class="form-control" name="image" placeholder=". . .">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Alamat Lengkap</label>
                      <input type="text" class="form-control" name="address" required placeholder=". . .">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Gender</label> <br>
                      <input type="radio" name="gender" value="male" required>pria
                      <input type="radio" name="gender" value="female">wanita
                    </div>
                    <div class="form-group">
                      <label class="form-label">Role</label>
                      <select name="role" class="form-control" required>
                        <option>--- Pilih Role ---</option>
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                      </select>
                    </div>
                    <div>
                      <label class="form-group">Password</label> <br>
                      <input type="text" name="password" class="form-control">
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