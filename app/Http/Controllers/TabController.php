<?php

namespace App\Http\Controllers;

use App\Models\SemuaPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main');
    }

    public function index2()
    {
        return view('main2');
    }

    public function index3()
    {
        return view('main3');
    }

    public function index4()
    {
        return view('main4');
    }

    public function index5()
    {
        return view('main5');
    }

    public function index6()
    {
        return view('main6');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function read()
    {
    
    }

    public function tableread()
    {
        $data = DB::table('transaction_headers')
        ->join('transaction_status','transaction_headers.status_id', '=', 'transaction_status.id')
        ->join('members','transaction_headers.userid', '=', 'members.id')
        ->select('transaction_headers.kode_transaksi','transaction_headers.no_po', 'members.nama', 'members.email','transaction_headers.tgl_transaksi', 'members.id' )        
        ->orderByDesc('transaction_headers.id')
        ->limit(1000)
        ->get();
        
        return DataTables::of($data)
        ->escapeColumns([])
        ->addColumn('action', function($data){
            $button = "<button type=\"button\" onclick=\"detail($data->kode_transaksi)\" data-bs-target=\"#exampleModal\" data-bs-toggle=\"modal\" class=\"btn btn-primary btn-sm\">Detail Transaksi</button>";
            return $button;
        })
        ->addColumn('action2', function($data){
            $button2 = "<button type=\"button\" onclick=\"timelinetransaksi($data->kode_transaksi)\"  data-bs-target=\"#exampleModal2\" data-bs-toggle=\"modal\" class=\"btn btn-info btn-sm\">Tracking Order</button>";
            return $button2;
        })
        ->rawColumns(['action', 'action2'])
        ->make(true);

    }

    public function timeline($kode_transaksi)
    {
        $data = 
            DB::table('transaction_headers')
            ->join('transaction_status','transaction_headers.status_id', '=', 'transaction_status.id')
            ->where('transaction_headers.kode_transaksi',$kode_transaksi)
            ->first();
        return view('timelinetransaksi')->with([
            'data' => $data,
            'kode_transaksi' => $kode_transaksi
        ]);
    }

    public function tableneworder()
    {
        $data = DB::table('transaction_headers')
        ->join('transaction_status','transaction_headers.status_id', '=', 'transaction_status.id')
        ->join('members','transaction_headers.userid', '=', 'members.id')
        ->select('transaction_headers.kode_transaksi','transaction_headers.no_po', 'members.nama', 'members.email', 'transaction_status.description','transaction_headers.tgl_transaksi', 'members.id' )        
        ->where('transaction_headers.status_id', 'like', '5')
        ->orderByDesc('transaction_headers.id')
        ->limit(1000)
        ->get();

        return DataTables::of($data)
        ->escapeColumns([])
        ->addColumn('action', function($data){
            $button = "<button type=\"button\" onclick=\"detail($data->kode_transaksi)\" data-bs-target=\"#exampleModal\" data-bs-toggle=\"modal\" class=\"btn btn-primary btn-sm\">Detail Transaksi</button>";
            // $button .= " <button class='proses text-danger' id='" . $data->id . "' >Proses Pesanan</button>";
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function tablesiapkirim()
    {
        $data = DB::table('transaction_headers')
        ->join('transaction_status','transaction_headers.status_id', '=', 'transaction_status.id')
        ->join('members','transaction_headers.userid', '=', 'members.id')
        ->select('transaction_headers.kode_transaksi','transaction_headers.no_po', 'members.nama', 'members.email', 'transaction_status.description','transaction_headers.tgl_transaksi', 'members.id' )        
        ->where('transaction_headers.status_id', 'like', '6')
        ->orderByDesc('transaction_headers.id')
        ->limit(1000)
        ->get();

        return DataTables::of($data)
        ->escapeColumns([])
        ->addColumn('action', function($data){
            $button = "<button type=\"button\" onclick=\"detail($data->kode_transaksi)\" data-bs-target=\"#exampleModal\" data-bs-toggle=\"modal\" class=\"btn btn-primary btn-sm\">Detail Transaksi</button>";
            // $button .= " <button class='send text-danger' id='" . $data->id . "' >Kirim Pesanan</button>";
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function tablekirim()
    {
        $data = DB::table('transaction_headers')
        ->join('transaction_status','transaction_headers.status_id', '=', 'transaction_status.id')
        ->join('members','transaction_headers.userid', '=', 'members.id')
        ->select('transaction_headers.kode_transaksi','transaction_headers.no_po', 'members.nama', 'members.email', 'transaction_status.description','transaction_headers.tgl_transaksi', 'members.id' )        
        ->where('transaction_headers.status_id', 'like', '7')
        ->orderByDesc('transaction_headers.id')
        ->limit(1000)
        ->get();

        return DataTables::of($data)
        ->escapeColumns([])
        ->addColumn('action', function($data){
            $button = "<button type=\"button\" onclick=\"detail($data->kode_transaksi)\" data-bs-target=\"#exampleModal\" data-bs-toggle=\"modal\" class=\"btn btn-primary btn-sm\">Detail Transaksi</button>";
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function tabletrm()
    {
        $data = DB::table('transaction_headers')
        ->join('transaction_status','transaction_headers.status_id', '=', 'transaction_status.id')
        ->join('members','transaction_headers.userid', '=', 'members.id')
        ->select('transaction_headers.kode_transaksi','transaction_headers.no_po', 'members.nama', 'members.email', 'transaction_status.description','transaction_headers.tgl_transaksi', 'members.id' )        
        ->where('transaction_headers.status_id', 'like', '8')
        ->orderByDesc('transaction_headers.id')
        ->limit(1000)
        ->get();

        return DataTables::of($data)
        ->escapeColumns([])
        ->addColumn('action', function($data){
            $button = "<button type=\"button\" onclick=\"detail($data->kode_transaksi)\" data-bs-target=\"#exampleModal\" data-bs-toggle=\"modal\" class=\"btn btn-primary btn-sm\">Detail Transaksi</button>";
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function tablebtl()
    {
        $data = DB::table('transaction_headers')
        ->join('transaction_status','transaction_headers.status_id', '=', 'transaction_status.id')
        ->join('members','transaction_headers.userid', '=', 'members.id')
        ->select('transaction_headers.kode_transaksi','transaction_headers.no_po', 'members.nama', 'members.email', 'transaction_status.description','transaction_headers.tgl_transaksi', 'members.id' )        
        ->where('transaction_headers.status_id', 'like', '9')
        ->orderByDesc('transaction_headers.id')
        ->limit(1000)
        ->get();

        return DataTables::of($data)
        ->escapeColumns([])
        ->addColumn('action', function($data){
            $button = "<button type=\"button\" onclick=\"detail($data->kode_transaksi)\" data-bs-target=\"#exampleModal\" data-bs-toggle=\"modal\" class=\"btn btn-primary btn-sm\">Detail Transaksi</button>";
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($kode_transaksi)
    {   
        $data = 
            DB::table('transaction_headers') 
            ->join('members','transaction_headers.userid', '=', 'members.id')
            ->join('transaction_status','transaction_headers.status_id', '=', 'transaction_status.id')
            ->where('transaction_headers.kode_transaksi',$kode_transaksi)
            ->select('transaction_headers.kode_transaksi as transid', 'transaction_headers.tgl_transaksi as tgltrans', 'transaction_headers.userid as iduser', 'transaction_headers.shipping_address as shpaddr','members.nama', 'transaction_status.description')
            ->limit(1)
            ->get();
            return DataTables::of($data)->make(true); 
        }

    public function details2($kode_transaksi)
    {   
        $data2 = 
            DB::table('transaction_headers')          
            ->where('transaction_headers.kode_transaksi',$kode_transaksi)
            ->select('kode_transaksi','total_harga as subtot','total_disc as disc','total_bayar as totalbayar')
            ->get();
            
            return DataTables::of($data2)->make(true); 
        }
        

    public function details3($kode_transaksi)
    {   

        $data3 = 
            DB::table('transaction_details') 
            ->leftjoin('products','transaction_details.PLU', '=', 'products.prdcd')            
            ->where('transaction_details.kode_transaksi',$kode_transaksi)
            ->select('transaction_details.qty','transaction_details.harga','transaction_details.subtotal', 'products.long_description as desc', 'products.unit')
            ->groupBy('products.long_description')
            ->get();
          
            return DataTables::of($data3)->make(true); 
        }
         
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        Db::table('transaction_headers')
            ->where('transaction_headers.userid',$id)
            ->update(['transaction_headers.status_id' => 6]);

        return redirect('/');
    }

    public function proseskirim(Request $request)
    {
        $id = $request->id;
        Db::table('transaction_headers')
            ->where('transaction_headers.userid',$id)
            ->update(['transaction_headers.status_id' => 7]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
