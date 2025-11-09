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

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Complains</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('store.aduan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Complain</label>
                    <select name="category_id" class="form-control">
                        <option value="">---Pilih Kategori Aduan---</option>
                        @foreach ( $category as $cat )
                        <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Judul Aduan</label>
                    <input type="text" name="judul" class="form-control" id="exampleInputPassword1"
                    placeholder="Judul Aduan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Lokasi tempat aduan</label>
                    <input type="text" name="lokasi" class="form-control" id="exampleInputPassword1"
                    placeholder="..."><p><small class="font-bold">Ketik lokasi Tempat Aduan</small></p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto Lokasi yang Diadukan</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Pengaduan</label>
                    <input type="date" name="tanggal_aduan" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Keterangan Terkait Aduan</label>
                    <textarea name="keterangan" rows="6" class="form-control" required></textarea>
                    <p><small>Pokok nya Kamu Ngadu Kenapa!</small></p>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</section>

@endsection