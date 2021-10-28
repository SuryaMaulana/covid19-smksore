<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataCovid extends Model
{	
    protected $table = 'data_covid_tulungagung';
    protected $fillable = [
    	'nama_kecamatan',
    	'jumlah_positif',
    	'jumlah_meninggal',
    	'jumlah_sembuh',
    	'jumlah_odp',
    	'jumlah_pdp'
    ];

    public function history()
    {
    	return $this->hasMany(DataHistory::class, 'data_id');
    }
}
