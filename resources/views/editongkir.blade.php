            <div class="modal-body">
                <form action="{{ route('updateongkir',$id) }}" method="post">
                    @csrf
                    <div class="mb-3 col-auto d-flex">
                        <label for="pulau" class="col-form-label mr-2">Area Wilayah</label>
                        <input type="text" name="pulau" id="pulau" disabled="disabled" value="{{ $data2->pulau }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="nama" class="form-label mr-2">Jenis Kendaraan</label>
                        <input type="text" name="nama" disabled="disabled" class="form-control" id="nama" value="{{ $data2->nama }}">
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="km_a" class="form-label mr-2">KM Pertama</label>
                        <input type="number" name="km_a" class="form-control" id="km_a" value="{{ $data2->km_a }}">
                        <label for="biaya_a" class="form-label mr-2">Harga KM Pertama</label>
                        <input type="number" name="biaya_a" class="form-control" id="biaya_a" value="{{ $data2->biaya_a }}">
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="km_b" class="form-label mr-2">KM Berikutnya</label>
                        <input type="number" name="km_b" class="form-control" id="km_b" value="{{ $data2->km_b }}">
                        <label for="biaya_b" class="form-label mr-2">Harga KM Berikutnya</label>
                        <input type="number" name="biaya_b" class="form-control" id="biaya_b" value="{{ $data2->biaya_b }}">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label class="form-label mr-2">KM Ekstra</label>
                        <input type="number" name="km_c" class="form-control" id="km_c" disabled="disabled" value="{{ $data2->km_c }}">
                        <label class="form-label mr-2">Harga Ekstra</label>
                        <input type="number" name="biaya_c" class="form-control" id="biaya_c" value="{{ $data2->biaya_c }}">
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="km_max" class="form-label mr-2">Jarak Maksimal</label>
                        <input type="number" name="km_max" class="form-control" id="km_max" value="{{ $data2->km_max }}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onClick="updateongkir({{$data->id}})" class="btn btn-primary">Save changes</button>
            </div>