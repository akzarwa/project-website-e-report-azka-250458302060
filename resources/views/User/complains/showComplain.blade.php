<!-- Modal Create -->
        <div class="modal fade" id="show{{ $row->id }}">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content shadow-lg border-0 rounded-4xl">
            <div class="modal-header bg-primary text-white rounded-top-4">
              <h5 class="modal-title fw-bold">Detail Aduan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body bg-light">
              <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
              <div  class="image-container border items-center rounded-3 overflow-hidden shadow-sm">
                @if($row->image)
                  <img src="{{ asset('storage/public/complainsImages/' . $row->image) }}" alt="" class="img-fluid">
                @else
                  <img src="https://via.placeholder.com/300x300?text=No+Image" alt="" class="img-fluid">
                @endif
              </div>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
              <div class="p-2">
                <h5 class="fw-semibold text-primary mb-3">{{ $row->judul }}</h5>
                <p class="text-secondary mb-2"><strong>keterangan Aduan :</strong></p>
                <p class="text-dark lh-base">{{ $row->keterangan }}</p>
              </div>
            </div>
            
          </div>
          <div class="modal-footer bg-white border-0 rounded-bottom-4 d-flex justify-content-end">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>
              </div>
            

                    <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>
  </div>