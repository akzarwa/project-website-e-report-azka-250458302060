<div class="modal fade" id="edit{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update', $row->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Pastikan PUT sesuai route -->
                    <input type="hidden" name="id" value="{{ $row->id }}">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" value="{{ $row->name }}" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $row->email }}" required>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" name="phone" value="{{ $row->phone }}" required>
                    </div>

                    <div class="form-group">
                        <label>NIK</label>
                        <input type="number" class="form-control" name="nik" value="{{ $row->nik }}" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <input type="text" class="form-control" name="address" value="{{ $row->address }}" required>
                    </div>

                    <div class="form-group">
                        <label>Foto Profil</label>
                        <input type="file" class="form-control" name="image">
                        @if($row->image)
                            <small class="form-text text-muted">Current:</small>
                            <img src="{{ asset('storage/usersimages/' . $row->image) }}" 
                                 style="max-width: 120px; height:auto; margin-top:6px;" alt="current-profile">
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label> <br>
                        <input type="radio" name="gender" value="male" {{ $row->gender == 'male' ? 'checked' : '' }} required> Pria
                        <input type="radio" name="gender" value="female" {{ $row->gender == 'female' ? 'checked' : '' }}> Wanita
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="">--- Pilih Role ---</option>
                            <option value="admin" {{ $row->role == 'admin' ? 'checked' : '' }}>Admin</option>
                            <option value="user" {{ $row->role == 'user' ? 'checked' : '' }}>User</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Password <small>(Kosongkan jika tidak ingin diubah)</small></label>
                        <input type="text" name="password" class="form-control" placeholder="Kosongkan jika tidak diubah">
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
