<?php

namespace App\Http\Controllers;

use App\Models\Autoload;
use App\Models\Item;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Items;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    public function index()
    {
        $dataTest = DB::table('items')->get();
        // return $dataTest;
        return view('welcome', ['item' => $dataTest]);
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {


        $item = new Item();
        $item->class = $request->get('class');
        $item->duration = $request->get('duration');
        $item->ne = $request->get('ne');
        $item->ne_id = $request->get('ne_id');
        $item->site_name = $request->get('site_name');
        $item->site_impact = $request->get('site_impact');
        $item->site_sysinfo = $request->get('site_sysinfo');
        $item->d_2G = $request->get('d_2G');
        $item->d_3G = $request->get('d_3G');
        $item->d_4G = $request->get('d_4G');
        $item->kabupaten = $request->get('kabupaten');
        $item->c_2G = $request->get('c_2G');
        $item->c_3G = $request->get('c_3G');
        $item->c_4G = $request->get('c_4G');
        $item->rtpo = $request->get('rtpo');
        $item->last_update = $request->get('last_update');



        $item->save();
        // return $item;
        return redirect('/index');
    }

    public function edit($id)
    {
        $data = Item::find($id);
        // $data = Item::select('name as nama','address as alamat','telp as telp')
        //               ->where('_id', $request->id)
        //               ->get();
        return view('edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $class = $request->class;
        $duration = $request->duration;
        $ne = $request->ne;
        $ne_id = $request->ne_id;
        $site_name = $request->site_name;
        $site_impact = $request->site_impact;
        $site_sysinfo = $request->site_sysinfo;
        $d_2G = $request->d_2G;
        $d_3G = $request->d_3G;
        $d_4G = $request->d_4G;
        $kabupaten = $request->kabupaten;
        $c_2G = $request->c_2G;
        $c_3G = $request->c_3G;
        $c_4G = $request->c_4G;
        $rtpo = $request->rtpo;
        $last_update = $request->last_update;


        DB::table('items')->where('_id', '=', $id)->update([
            'class' => $class,
            'duration' => $duration,
            'ne' => $ne,
            'ne_id' => $ne_id,
            'site_name' => $site_name,
            'site_impact' => $site_impact,
            'site_sysinfo' => $site_sysinfo,
            'd_2G' => $d_2G,
            'd_3G' => $d_3G,
            'd_4G' => $d_4G,
            'kabupaten' => $kabupaten,
            'c_2G' => $c_2G,
            'c_3G' => $c_3G,
            'c_4G' => $c_4G,
            'rtpo' => $rtpo,
            'last_update' => $last_update,
        ]);
        return redirect('/index');
    }

    public function graphics()
    {
        $data = DB::table('autoload')->get();
        // dd($data);
        return view('graphic', ['data' => json_encode($data)]);
    }

    public function autoLoad(Request $request)

    {

        return view('autoload');
    }

    public function getApi(Request $request)
    {
        $dataRtpo = $request->nameRtpo;

        // dd($dataSelect);

        $response = Http::get('http://10.54.28.211:4020/api/qc/summary/rtpo?rtpo=' . $dataRtpo);
        $data = json_decode((string) $response->getBody(), true);

        $A_2G = $data['rtpo']['2G'];
        $A_3G = $data['rtpo']['3G'];
        $A_4G = $data['rtpo']['4G'];
        $C_2G = $data['rtpo']['2G_coverage'];
        $C_3G = $data['rtpo']['3G_coverage'];
        $C_4G = $data['rtpo']['4G_coverage'];
        $ne = $data['rtpo']['ne'];
        $rtpo = $data['rtpo']['rtpo'];
        $site = $data['rtpo']['site'];
        $tot_imp_ne = $data['total_impact_ne'];
        $tot_imp_site = $data['total_impact_site'];
        $tot_sys_ne = $data['total_sysinfo_ne'];
        $tot_sys_site = $data['total_sysinfo_site'];
        $last_update = $data['last_update'];

        $response = Autoload::create([
            'A_2G' => $A_2G,
            'A_3G' => $A_3G,
            'A_4G' => $A_4G,
            'C_2G' => $C_2G,
            'C_3G' => $C_3G,
            'C_4G' => $C_4G,
            'ne' => $ne,
            'rtpo' => $rtpo,
            'site' => $site,
            'last_update' => $last_update,
            'total_impact_ne' => $tot_imp_ne,
            'total_impact_site' => $tot_imp_site,
            'total_sysinfo_ne' => $tot_sys_ne,
            'total_sysinfo_site' => $tot_sys_site,
        ]);

        $dataSelect = Autoload::select('A_2G', 'A_3G', 'A_4G', 'C_2G', 'C_3G', 'C_4G', 'ne', 'rtpo', 'last_update', 'total_impact_ne', 'total_impact_site', 'total_sysinfo_ne', 'total_sysinfo_site')
            ->where('rtpo', 'LIKE', '%' . $request->nameRtpo . '%')
            ->get();
        dd($dataSelect);

        return back()->with(['datas' => $dataSelect]);
    }

    public function testDb()
    {

        $testDb = DB::table('users')
            ->get();
        // $testDb = DB::table('items')
        //   ->select('items.ne_id as ne')
        //   ->join('produk','items.ne_id', '=', 'produk.ne_id')
        //   ->where('items._id', '=' , 'produk._Id')
        //   ->get();
        dd($testDb);
    }

    public function getSysinfo()
    {
        $testDb = DB::table('users')->get();
        // if(is_null($testDb)) {
        //     return response()->json(['message' => 'Employee Not Found'], 404);
        // }
        return response()->json($testDb, 200);
    }

    public function getSysinfoSite(Request $request, $site_id){

        $data = DB::table('sysinfo_data')->where('site_id', $site_id)->get();
        // dd($data);
        return response()->json($data, 200);
    }

    public function __construct()
    {
        $this->Item = new Item();
    }

    public function getItems()
    {
        $result = $this->Item->getDataRtpo();
        return json_decode($result);
    }
}
