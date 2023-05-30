<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['Pegawai'] = model('PegawaiModel')->countAllResults();
        $data['SuratMasuk'] = model('SuratMasukModel')->countAllResults();
        $data['SuratKeluar'] = model('SuratKeluarModel')->countAllResults();
        $data['Disposisi'] = model('DisposisiModel')->countAllResults();
        return view('admin/dashboard', $data);
    }
}
