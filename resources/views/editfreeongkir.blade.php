            <div class="modal-body2">
                <form action="{{ route('updatefreeongkir',$id) }}" method="post">
                    @csrf
                     <div class="mb-3 col-auto d-flex">
                        <label for="nama" class="col-form-label mr-2">Nama Project</label>
                        <input type="text" name="nama" id="nama" value="{{ $data->nama }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="periode_start" class="form-label mr-2">Periode Program</label>
                        <input type="datetime" name="periode_start" id="periode_start" value="{{ $data->periode_start }}" class="form-control" required>
                        <label for="periode_end" class="form-label mr-2">Sampai Tanggal</label>
                        <input type="datetime" name="periode_end" id="periode_end" value="{{ $data->periode_end }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onClick="updatefreeongkir({{ $data->id }})" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
