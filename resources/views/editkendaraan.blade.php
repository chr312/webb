            <div class="modal-body">
                <form action="{{ route('updatekendaraan',$id) }}" method="post">
                    @csrf
                     <div class="mb-3 col-auto d-flex">
                        <label for="nama" class="col-form-label mr-2">Nama Kendaraan</label>
                        <input type="text" name="nama" id="nama" value="{{ $data->nama }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="dimensi_panjang" class="form-label mr-2">Dimensi Panjang</label>
                        <input type="number" name="dimensi_panjang" id="dimensi_panjang" value="{{ $data->dimensi_panjang }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="dimensi_lebar" class="form-label mr-2">Dimensi Lebar</label>
                        <input type="number" name="dimensi_lebar" id="dimensi_lebar" value="{{ $data->dimensi_lebar }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="dimensi_tinggi" class="form-label mr-2">Dimensi Tinggi</label>
                        <input type="number" name="dimensi_tinggi" id="dimensi_tinggi" value="{{ $data->dimensi_tinggi }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="berat_max" class="form-label mr-2">Berat Maksimal</label>
                        <input type="number" name="berat_max" id="berat_max" value="{{ $data->berat_max }}" class="form-control" required>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onClick="update({{ $data->id }})" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
