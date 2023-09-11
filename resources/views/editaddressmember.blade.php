            <div class="modal-body">
                <form action="{{ route('updateaddressmember',$id) }}" method="post">
                    @csrf
                    <div class="mb-3 col-auto d-flex">
                        <label for="address" class="col-form-label mr-2 w-25">Alamat aktif: </label>
                        <input type="text" name="address" id="address" value="{{ $data2->address }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="province_id" class="col-form-label mr-2 w-25">Provinsi: </label>
                        <select name="province_id" id="province_id" class="form-select">
                            @foreach ($data3 as $province)
                                <option value="{{ $province->id }}"{{ $province->id == $data2->province_id ? 'selected' : '' }}>{{ $province->province_name }}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="city_id" class="col-form-label mr-2 w-25">Kota/Kab.: </label>
                        <select name="city_id" id="city_id" class="form-select">
                            @foreach ($data4 as $cities)
                                <option value="{{ $cities->id }}"{{ $cities->id == $data2->city_id ? 'selected' : '' }}>{{ $cities->city_name }}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="district_id" class="col-form-label mr-2 w-25">Kecamatan: </label>
                        <select name="district_id" id="district_id" class="form-select">
                            @foreach ($data5 as $districts)
                                <option value="{{ $districts->id }}"{{ $districts->id == $data2->district_id ? 'selected' : '' }}>{{ $districts->district_name }}</option>
                            @endforeach 
                        </select>                 
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="sub_district" class="col-form-label mr-2 w-25">Kelurahan: </label>
                        <select name="sub_district_id" id="sub_district_id" class="form-select">
                            @foreach ($data6 as $sub_districts)
                                <option value="{{ $sub_districts->id }}"{{ $sub_districts->id == $data2->sub_district_id ? 'selected' : '' }}>{{ $sub_districts->sub_district_name }}</option>
                            @endforeach 
                        </select>  
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="phone" class="col-form-label mr-2 w-25">No.HP Verif Isaku: </label>
                        <input type="text" name="phone" id="phone" value="{{ $data->phone }}" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="phonealamat" class="col-form-label mr-2 w-25">No.HP Alamat: </label>
                        <input type="text" name="phonealamat" id="phonealamat" value="{{ $data2->phone_number }}" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <input type="text" name="latitude" id="latitude" value="{{ $data2->latitude }}" class="form-control">
                        <input type="text" name="longitude" id="longitude" value="{{ $data2->longitude }}" class="form-control">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onClick="updatemember({{ $data->id }})" class="btn btn-primary">Save changes</button>
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
