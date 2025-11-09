{{-- modal create --}}
<div class="modal fade" id="editstatus{{$row->id}}">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow-lg border-0 rounded-top-4xl">
            <div class="modal-header bg-primary text-white rounded-top-4">
                <h4 class="modal-title fw-bold">Detail Aduan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light">
                <div class="row">
                    <form action="{{route('update.status', $row->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="status">Status Aduan</label>
                            <input type="hidden" name="id" value="{{$row->id}}">
                            <select name="status" id="status" class="form-control">
                                <option value="pending" {{ $row->status == 'pending' ? 'selected' : '' }}>pending
                                </option>
                                <option value="in_progress" {{ $row->status == 'in_progress' ? 'selected' : ''
                                    }}>in_progress
                                </option>
                                <option value="resolve" {{ $row->status == 'resolve' ? 'selected' : '' }}>resolved
                                </option>
                                <option value="rejected" {{ $row->status == 'rejected' ? 'selected' : '' }}>rejected
                                </option>
                            </select>
                        </div>
                        <div class="modal-footer bg-white border-0 rounded-bottom-4 d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">close</button>
                            <button type="submit" class="btn btn-outline-primary">update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>