<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Emailrecipients;
use App\Models\masterkendaraan;
use App\Models\masterongkir;
use App\Models\masterfreeongkir;
use App\Models\mastercities;
use App\Models\masterdistrict;
use App\Models\mastersubdistrict;
use App\Models\masterprovince;
use Exception;
use Illuminate\Support\Facades\Hash;

class SidebarController extends Controller
{
    public function indexManageEmails()
    {
        return view('viewEmails');
    }

    public function showManageEmails()
    {
        $data = DB::table('email_recipients')
        ->select('id','email_recipients.email', 'kode_cabang')       
        ->get(); 

        return DataTables::of($data)
        ->escapeColumns([])
        ->addColumn('action', function($data){
            $button = "<button type=\"button\" onclick=\"deleteemail($data->id)\" class=\"btn btn-primary btn-sm\">Delete</button>";
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function createEmail()
    {
        $data = DB::table('branches')
                ->select('id','name')
                ->get();
        return view('createemail')->with([
            'data' => $data,
        ]);
    }

    public function storeEmail(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email:dns|unique:email_recipients',
            'kode_cabang' => 'required'
        ]);

        Emailrecipients::create($validateData);

        return redirect('/createemail')->with('success', 'Email Baru Berhasil Ditambahkan!');
    }

    public function deleteEmail(Request $request)
    {
        DB::table('email_recipients')->where('id', $request->id)->delete();
        return redirect('/viewEmails')->with('success', 'Email Berhasil Dihapus!');
    }

    public function indexManageAdmin()
    {
        return view('viewListAdmin');
    }
    
    public function showManageAdmin(Request $request)
    {
        $data = DB::table('users_admin')
        ->select('id','branch_code','email', 'name')        
        ->get();

        return DataTables::of($data)
        ->escapeColumns([])
        ->addColumn('action', function($data){
            $button = "<button type=\"button\" onclick=\"deleteadmin($data->id)\" class=\"btn btn-primary btn-sm\">Delete</button>";
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);

    }

    public function createAdmin()
    {
        if(auth()->user()-> role !== '1'){
            abort(403);
        }

        $data = DB::table('branches')
                ->select('id','name')
                ->get();
        return view('createadmin')->with([
            'data' => $data,
        ]);
    }

    public function storeAdmin(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users_admin',
            'password' => 'required|confirmed',
            'role' => 'required',
            'branch_code' => 'required'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/createadmin')->with('success', 'Admin Baru Berhasil Ditambahkan!');
    }

    public function deleteAdmin(Request $request)
    {
        DB::table('users_admin')->where('id', $request->id)->delete();
        return redirect('/viewListAdmin')->with('success', 'Admin Berhasil Dihapus!');
    }
    
    public function indexManageMember()
    {
        return view('viewListMember');
    }

    public function showManageMember()
    {
        $data = DB::table('members')
        ->join('types','members.type_id', '=', 'types.id')
        ->join('addresses','members.id', '=', 'addresses.member_id')
        ->join('branches','addresses.branch_id', '=', 'branches.id')
        ->select('members.id','members.email','members.nama', 'members.kodemember', 'members.phone', 'types.type', 'addresses.address', 'branches.name') 
        ->limit(10000)      
        ->get();

        return DataTables::of($data)
        ->escapeColumns([])
        ->addColumn('action', function($data){
            $button = "<button type=\"button\" onclick=\"editaddressmember($data->id)\" data-bs-target=\"#exampleModal\" data-bs-toggle=\"modal\" class=\"btn btn-primary btn-sm\">Edit Address</button>";
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
        
    }

    public function province()
    {
        $data ['province'] = masterprovince::get(["province_name", "id"]);

        return response()->json($data);
    }

    public function city(Request $request)
    {
        $data ['city'] = mastercities::where("province_id", $request->province_id)
                                ->get(["city_name", "id"]);
        return response()->json($data);
    }

    public function district(Request $request)
    {
        $data ['district']= masterdistrict::where("city_id", $request->city_id)
                                ->get(["district_name", "id"]);

        return response()->json($data);
    }

    public function sub_district(Request $request)
    {
        $data ['subdistrict']= mastersubdistrict::where("district_id", $request->district_id)
                                ->get(["sub_district_name", "id"]);

        return response()->json($data);
    }
    // public function province()
    // {
    //     $data = masterprovince::where('province_name', 'LIKE', '%'.request('q').'%')->paginate(50);

    //     return response()->json($data);
    // }

    // public function city($id)
    // {
    //     $data = mastercities::where('province_id', $id)->where('city_name', 'LIKE', '%'.request('q').'%')->paginate(1000);

    //     return response()->json($data);
    // }

    // public function district($id)
    // {
    //     $data = masterdistrict::where('city_id', $id)->where('district_name', 'LIKE', '%'.request('q').'%')->paginate(1000);

    //     return response()->json($data);
    // }

    public function editaddress($id)
    {
    
        $data = DB::table('members')
            ->where('members.id',$id)
            ->first();
        $data2 = 
            DB::table('addresses')
            ->where('addresses.member_id',$id)
            ->first();
        $data3 = 
            DB::table('provinces')
            ->get();
        $data4 = 
            DB::table('cities')
            ->get();
        $data5 = 
            DB::table('districts')
            ->get();
        $data6 = 
            DB::table('sub_districts')
            ->get();
        return view('editaddressmember')->with([
            'data' => $data,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            'data5' => $data5,
            'data6' => $data6,
            'id' => $id,
        ]);
    }


    public function updateaddressmember(Request $request, $id)
    {   
        $request->validate([
            'address' => 'max:255',
            'province_id'=> 'numeric',
            'city_id' => 'numeric',
            'district_id' => 'numeric',
            'sub_district_id' => 'numeric',
            'latitude' => 'max:100',
            'longitude' => 'max:100',
        ]);
         DB::table('addresses')
            ->where('addresses.member_id',$id)
            ->update([ 
                'address' => $request->address,
                'province_id' => $request->province_id,
                'city_id' => $request->city_id,
                'district_id' => $request->district_id,
                'sub_district_id' => $request->sub_district_id,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);
        return redirect('/viewListMember')->with('success', 'Alamat Member Sudah Diupdate!');
    }

    public function indexMonitoringJob()
    {
        return view('monitoringjob');
    }

    
    public function showMonitoringJob()
    {
        $data = DB::table('log_data')
        ->select('nama','log_msg', 'log_dt', 'status')        
        ->orderByDesc('id')
        ->get();
        
        return Datatables::of($data)
        ->editColumn('status', function($data) {
                if($data->status == 1){
                return '<medium>&#9989;</medium>';
                }if($data->status == 0) {
                return '<medium>&#10060;</medium>';
                }
            })
        ->escapeColumns([])
        ->make(true);  

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexManageOngkir()
    {
        return view('viewListOngkir');
    }

    
    public function showManageOngkir()
    {
        $data = DB::table('ongkir_details')
        ->join('master_kendaraan','ongkir_details.kendaraan_id', '=', 'master_kendaraan.id')
        ->join('cabang_ongkir','ongkir_details.pulau_id', '=', 'cabang_ongkir.id')
        ->select('ongkir_details.id','master_kendaraan.nama','cabang_ongkir.pulau', 'ongkir_details.km_a', 'ongkir_details.biaya_a', 'ongkir_details.biaya_b','ongkir_details.biaya_c','ongkir_details.km_max' )        
        ->orderByDesc('ongkir_details.id')
        ->get();
        
        return DataTables::of($data)
        ->escapeColumns([])
        ->addColumn('action', function($data){
            $button = "<button type=\"button\" onclick=\"editongkir($data->id)\"  class=\"btn btn-primary btn-sm\">Edit</button>";
            return $button;
        })
        ->addColumn('action2', function($data){
            $button2 = "<button type=\"button\" onclick=\"deleteongkir($data->id)\" class=\"btn btn-danger btn-sm\">Delete</button>";
            return $button2;
        })
        ->rawColumns(['km_ekstra','action', 'action2'])
        ->make(true);

    }

    public function createOngkir()
    {
        $data = DB::table('master_kendaraan')
                ->select('id','nama')
                ->get();
        $data2 = DB::table('cabang_ongkir')
                ->select('id','pulau')
                ->get();
        return view('createongkir')->with([
            'data' => $data,
            'data2' => $data2,
        ]);
    }

    public function storeOngkir(Request $request)
    {
        $validateData = $request->validate([
            'pulau_id' => 'required',
            'kendaraan_id' => 'required',
            'km_a' => 'required',
            'biaya_a' => 'required',
            'km_b' => 'required',
            'biaya_b' => 'required',
            'biaya_c' => 'required',
            'km_max' => 'required',
        ]);

        masterongkir::create($validateData);

        return redirect('/createongkir')->with('success', 'Master Ongkos Kirim Baru Berhasil Ditambahkan!');
    }

    public function deleteOngkir(Request $request)
    {
        DB::table('ongkir_details')->where('id', $request->id)->delete();
        return redirect('/viewListOngkir')->with('success', 'Ongkir Berhasil Dihapus!');
    }

    public function editongkir($id)
    {
        $data = masterongkir::findOrFail($id);
        $data2 = DB::table('ongkir_details')
        ->join('master_kendaraan','ongkir_details.kendaraan_id', '=', 'master_kendaraan.id')
        ->join('cabang_ongkir','ongkir_details.pulau_id', '=', 'cabang_ongkir.id')
        ->where('ongkir_details.id',$id)
        ->first();
        return view('editongkir')->with([
            'data' => $data,
            'data2' => $data2,
            'id' => $id
        ]);
    }

    public function updateongkir(Request $request, $id)
    {   
        $ongkir = masterongkir::find($id);
        $validateData = $request->validate([ 
            'km_a' => 'required',
            'biaya_a' => 'required',
            'km_b' => 'required',
            'biaya_b' => 'required',
            'biaya_c' => 'required',
            'km_max' => 'required',
        ]);
        try {
            $ongkir->update($validateData);
            } catch (Exception $e) {
                    return $e;
            }

        return redirect('/viewListOngkir')->with('success', 'Data Ongkir Sudah Diupdate!');
    }

    public function createKendaraan()
    {
        return view('createkendaraan');
    }

    public function storeKendaraan(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'dimensi_panjang' => 'required|numeric',
            'dimensi_lebar' => 'required|numeric',
            'dimensi_tinggi' => 'required|numeric',
            'berat_max' => 'required|numeric',
        ]);

        masterkendaraan::create($validateData);

        return redirect('/createkendaraan')->with('success', 'Data Kendaraan Baru Berhasil Ditambahkan!');
    }

    public function tablekendaraan()
    {
        $data = DB::table('master_kendaraan')
        ->select('id','nama', 'dimensi_panjang', 'dimensi_lebar', 'dimensi_tinggi', 'berat_max')        
        ->orderByDesc('master_kendaraan.id')
        ->limit(1000)
        ->get();    

        return DataTables::of($data)
        ->escapeColumns([])
        ->addColumn('action', function($data){
            $button = "<button type=\"button\" onclick=\"edit($data->id)\" data-bs-target=\"#exampleModal\" data-bs-toggle=\"modal\" class=\"btn btn-primary btn-sm\">Edit</button>";
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);

    }

    public function editkendaraan($id)
    {

        $data = masterkendaraan::findOrFail($id);
        return view('editkendaraan')->with([
            'data' => $data,
            'id' => $id
        ]);
    }

    public function updatekendaraan(Request $request, $id)
    {   
        $kendaraan = masterkendaraan::find($id);
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'dimensi_panjang' => 'required|numeric',
            'dimensi_lebar' => 'required|numeric',
            'dimensi_tinggi' => 'required|numeric',
            'berat_max' => 'required|numeric',
        ]);
        try {
                $kendaraan->update($validateData);
            } catch (Exception $e) {
                    return $e;
            }

        return redirect('/createkendaraan')->with('success', 'Data Kendaraan Sudah Diupdate!');
    }
    

    public function indexFreeOngkir()
    {
        return view('viewListFreeOngkir');
    }


    public function showFreeOngkir()
    {
        $data = DB::table('freeongkir_hdr')
        ->select('freeongkir_hdr.id', 'freeongkir_hdr.nama','freeongkir_hdr.periode_start', 'freeongkir_hdr.periode_end', 'freeongkir_hdr.nominal')        
        ->get();
        
        return DataTables::of($data)
        ->editColumn('nominal', function($data) {
                if($data->nominal == null){
                return '<medium>-</medium>';
                }
            })
        ->escapeColumns([])
        ->addColumn('action', function($data){
            $button = "<button type=\"button\" onclick=\"detailmember($data->id)\" data-bs-target=\"#exampleModal\" data-bs-toggle=\"modal\" class=\"btn btn-primary btn-sm\">Detail Member</button>";
            return $button;
        })
        ->addColumn('action2', function($data){
            $button2 = "<button type=\"button\" onclick=\"editfreeongkir($data->id)\" data-bs-target=\"#exampleModal2\" data-bs-toggle=\"modal\" class=\"btn btn-secondary btn-sm\">Edit</button>";
            return $button2;
        })
        ->rawColumns(['action', 'action2'])
        ->make(true);

    }

    //  public function createFreeOngkir()
    // {   
    //     $data = DB::table('members')
    //             ->select('id','nama', 'kodemember', 'email')
    //             ->limit(1000)
    //             ->get();
    //     $data2 = DB::table('branches')
    //             ->select('id', 'name')    
    //             ->get();
    //     return view('createfreeongkir')->with([
    //         'data' => $data,
    //         'data2' => $data2,
    //     ]);
    // }

    // public function storeFreeOngkir(Request $request)
    // {
    //     $validateData = $request->validate([
    //         'nama' => 'required',
    //         'periode_start' => 'required',
    //         'periode_end' => 'required',
    //         'filter' => 'required',
    //         'nominal' => 'number',
    //         'member' => 'required',
    //     ]);
    //     // dd($request);
    //     $validateData2 = $request->validate([
    //         'nama' => 'required',
    //         'periode_start' => 'required',
    //         'periode_end' => 'required',
    //         'filter' => 'required',
    //         'nominal' => 'number',
    //     ]);

    //     masterfreeongkir::create($validateData);
    //     masterfreeongkir2::create($validateData2);

    //     return redirect('/createongkir')->with('success', 'Master Ongkos Kirim Baru Berhasil Ditambahkan!');
    // }

    public function detailsmember($id)
    {   
        $data = 
            DB::table('freeongkir_dtl') 
            ->join('branches','freeongkir_dtl.kode_igr', '=', 'branches.kode_igr')
            ->join('customers','freeongkir_dtl.kodemember', '=', 'customers.kode_member')
            ->where('freeongkir_dtl.ongkir_id',$id)
            ->select('freeongkir_dtl.ongkir_id','branches.name as branch', 'freeongkir_dtl.kodemember as kodemember', 'customers.cus_email as email' )
            ->get();
            return DataTables::of($data)->make(true); 
    }

    public function editfreeongkir($id)
    {
        $data = masterfreeongkir::findOrFail($id);
        return view('editfreeongkir')->with([
            'data' => $data,
            'id' => $id
        ]);
    }

    public function updatefreeongkir(Request $request, $id)
    {   
        $freeongkir = masterfreeongkir::find($id);
        $validateData = $request->validate([
            'nama' => 'required',
            'periode_start' => 'required',
            'periode_end' => 'required',
        ]);
        try {
                $freeongkir->update($validateData);
            } catch (Exception $e) {
                    return $e;
            }

        return redirect('/viewListFreeOngkir')->with('success', 'Data Free Ongkir Sudah Diupdate!');
    }

    public function indexManageDistance()
    {
        return view('viewdistance');
    }

    public function showManageDistance()
    {
        $data = DB::table('members')
        ->join('addresses','members.id', '=', 'addresses.member_id')
        ->join('branches','addresses.branch_id', '=', 'branches.id')
        ->select('members.id','addresses.address as tujuan', 'addresses.distance as jarak','branches.address as cabang')   
        ->limit(7000)    
        ->get(); 

        return DataTables::of($data)
        ->escapeColumns([])
        ->addColumn('action', function($data){
            $button = "<button type=\"button\" onclick=\"editaddressdistance($data->id)\" class=\"btn btn-primary btn-sm\">Show Info</button>";
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function editdistance($id)
    {

        $data = DB::table('members')
            ->where('members.id',$id)
            ->first();
        $data2 = 
            DB::table('addresses')
            ->where('addresses.member_id',$id)
            ->join('branches','addresses.branch_id', '=', 'branches.id')
            ->first();
        $data3 = 
            DB::table('addresses')
            ->where('addresses.member_id',$id)
            ->first();
        $data4 = 
            DB::table('provinces')
            ->get();
        $data5 = 
            DB::table('cities')
            ->get();
        $data6 = 
            DB::table('districts')
            ->get();
        $data7 = 
            DB::table('sub_districts')
            ->get();
        return view('editdistance')->with([
            'data' => $data,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            'data5' => $data5,
            'data6' => $data6,
            'data7' => $data7,
            'id' => $id
        ]);
    }

    public function updatedistance(Request $request, $id)
    {   
        $request->validate([
            'address' => 'max:255',
            'province_id'=> 'numeric',
            'city_id' => 'numeric',
            'district_id' => 'numeric',
            'sub_district_id' => 'numeric',
            'latitude' => 'max:100',
            'longitude' => 'max:100',
        ]);
         DB::table('addresses')
            ->where('addresses.member_id',$id)
            ->update([ 
                'address' => $request->address,
                'province_id' => $request->province_id,
                'city_id' => $request->city_id,
                'district_id' => $request->district_id,
                'sub_district_id' => $request->sub_district_id,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);
        return redirect('/viewDistance')->with('success', 'Alamat Member Sudah Diupdate!');
    }
}
