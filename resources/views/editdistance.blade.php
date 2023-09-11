            <div class="modal-body">
                <form form action="{{ route('updateaddressmember2',$id) }}" method="post">
                    @csrf
                     <div class=" mt-1 mb-3 col-auto d-flex">
                        <h2 class="col-form-label mr-2">Informasi Alamat Indogrosir</h2>
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="alamat" class="col-form-label mr-2 w-25">Alamat Cabang: </label>
                        <input type="text" name="alamat" id="alamat" value="{{ $data2->address }}" class="form-control" disabled>
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="latitude" class="col-form-label mr-2 w-25">Latitude: </label>
                        <input type="text" name="latitude" id="latitude" value="{{ $data2->latitude }}" class="form-control" disabled>
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="longitude" class="col-form-label mr-2 w-25">Longitude: </label>
                        <input type="text" name="longitude" id="longitude" value="{{ $data2->longitude }}" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                     <div class="mb-3 col-auto d-flex">
                        <h2 class="col-form-label mr-2">Informasi Alamat Member</h2>
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="address" class="col-form-label mr-2 w-25">Alamat Member: </label>
                        <input type="text" name="address" id="address" value="{{ $data3->address }}" class="form-control">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="province" class="col-form-label mr-2 w-25">Provinsi: </label>
                        <select name="province_id" id="province_id" class="form-control">
                            @foreach ($data4 as $province)
                                <option value="{{ $province->id }}"{{ $province->id == $data3->province_id ? 'selected' : '' }}>{{ $province->province_name }}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="cities" class="col-form-label mr-2 w-25">Kota/Kab.: </label>
                        <select name="city_id" id="city_id" class="form-control">
                            @foreach ($data5 as $cities)
                                <option value="{{ $cities->id }}"{{ $cities->id == $data3->city_id ? 'selected' : '' }}>{{ $cities->city_name }}</option>
                            @endforeach 
                        </select>
                        </select>
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="districts" class="col-form-label mr-2 w-25">Kecamatan: </label>
                        <select name="district_id" id="district_id" class="form-control">
                            @foreach ($data6 as $districts)
                                <option value="{{ $districts->id }}"{{ $districts->id == $data3->district_id ? 'selected' : '' }}>{{ $districts->district_name }}</option>
                            @endforeach 
                        </select>                  
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="sub_districts" class="col-form-label mr-2 w-25">Kelurahan: </label>
                        <select name="sub_district_id" id="sub_district_id" class="form-control">
                            @foreach ($data7 as $sub_districts)
                                <option value="{{ $sub_districts->id }}"{{ $sub_districts->id == $data3->sub_district_id ? 'selected' : '' }}>{{ $sub_districts->sub_district_name }}</option>
                            @endforeach 
                        </select> 
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                     <div class="mb-3 col-auto d-flex">
                        <h2 class="col-form-label mr-2">Informasi Jarak Terhitung</h2>
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="distance" class="col-form-label mr-2 w-25">Jarak: </label>
                        <input type="text" name="distance" id="distance" value="{{ $data2->distance }}" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onClick="updatemember2({{$data->id }})" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>

            <script>
            $(document).ready(function () {

  

            /*------------------------------------------

            --------------------------------------------

            Province Dropdown Change Event

            --------------------------------------------

            --------------------------------------------*/

            $('#province_id').on('change', function () {

                var province_id = this.value;

                $("#city_id").html('');

                $.ajax({

                    url: "{{url('api/fetch-city')}}",

                    type: "POST",

                    data: {

                        province_id: province_id,

                        _token: '{{csrf_token()}}'

                    },

                    dataType: 'json',

                    success: function (result) {

                        $('#city_id').html('<option value="">-- Select City--</option>');

                        $.each(result.city, function (key, value) {

                            $("#city_id").append('<option value="' + value

                                .id + '">' + value.city_name + '</option>');

                        });
                    }

                });

            });

  

            /*------------------------------------------

            --------------------------------------------

            City Dropdown Change Event

            --------------------------------------------

            --------------------------------------------*/

            $('#city_id').on('change', function () {

                var city_id = this.value;

                $("#district_id").html('');

                $.ajax({

                    url: "{{url('api/fetch-district')}}",

                    type: "POST",

                    data: {

                        city_id: city_id,

                        _token: '{{csrf_token()}}'

                    },

                    dataType: 'json',

                    success: function (res) {

                        $('#district_id').html('<option value="">-- Select District --</option>');

                        $.each(res.district, function (key, value) {

                            $("#district_id").append('<option value="' + value

                                .id + '">' + value.district_name + '</option>');

                        });

                    }

                });

            });

            $('#district_id').on('change', function () {

                var district_id = this.value;

                $("#sub_district_id").html('');

                $.ajax({

                    url: "{{url('api/fetch-subdistrict')}}",

                    type: "POST",

                    data: {

                        district_id: district_id,

                        _token: '{{csrf_token()}}'

                    },

                    dataType: 'json',

                    success: function (res) {

                        $('#sub_district_id').html('<option value="">-- Select Sub District --</option>');

                        $.each(res.subdistrict, function (key, value) {

                            $("#sub_district_id").append('<option value="' + value

                                .id + '">' + value.sub_district_name + '</option>');

                        });

                    }

                });

            });

        });
</script>