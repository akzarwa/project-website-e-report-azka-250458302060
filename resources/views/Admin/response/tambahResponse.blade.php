    @extends('template.base')

    @section('azka')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Response Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard Response</li>
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
                    <h3 class="card-title">Response Complains</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('create.response') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="complain_id" value="{{ $complain->id }}">
                        <div class="form-group">
                            <label>Judul Aduan</label>
                            <input type="text" class="form-control" value="{{ $komplen->judul ?? '' }}" readonly name="" id="">
                        </div>

                    <div class="form-group">
                        <label>Response Aduan</label>
                        <textarea name="response" rows="6" class="form-control" required></textarea>
                        <p><small>Pokok nya orang ngadu dibales!</small></p>
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