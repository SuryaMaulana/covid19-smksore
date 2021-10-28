<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataCovid as Data;
use Yajra\DataTables\Html\Builder;

class MainController extends Controller
{
	public $html;

	public function __construct(Builder $builder)
	{
		$this->html = $builder;
	}

	public function index(Request $request)
	{
		if($request->ajax()) {
			$data = Data::latest()->get();
    		return datatables()->of($data)->make(true);
		}
		$columns = [
			['data' => 'nama_kecamatan', 'name' => 'nama_kecamatan', 'title' => 'Kecamatan'],
			['data' => 'jumlah_positif', 'name' => 'jumlah_positif', 'title' => 'Jumlah Positif'],
			['data' => 'jumlah_meninggal', 'name' => 'jumlah_meninggal', 'title' => 'Jumlah Meninggal'],
			['data' => 'jumlah_sembuh', 'name' => 'jumlah_sembuh', 'title' => 'Jumlah Sembuh'],
			['data' => 'jumlah_odp', 'name' => 'jumlah_odp', 'title' => 'Jumlah SUSPEK'],
			['data' => 'jumlah_pdp', 'name' => 'jumlah_pdp', 'title' => 'Jumlah PROBABLE']
		];

		$html = $this->html->setTableId('table-data')->columns($columns);
		$data = Data::latest()->get();
		return view('home.landing', [
			'html' => $html,
			'data' => $data
		]);
	}
}
