{{-- modal create --}}
<div class="modal fade" id="show{{$row->id}}">
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
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <div class="image-container border rounded-3 overflow-hidden shadow-sm"
                            style="width:100%; max-width:300px;">
                            @if($row->image)
                            <img src="{{ asset('storage/public/complainsImages'. $row->image) }}" class="img-fluid"
                                alt="">
                            @else
                            <img src="https://via.placeholder.com/300x300?text=No+Image" class="img-fluid" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0">
                        <div class="p-2">
                            <h5 class="fw-semibold text-primary mb-3">{{ $row->judul}}</h5>
                            <p class="text-secondary mb-2">
                                <strong>Keterangan Aduan:</strong>
                            </p>
                            <p class="text-dark lh-base">{{ $row->keterangan }}</p>
                        </div>
                    </div>
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