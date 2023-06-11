<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        helper('auth');
        $data['title'] = 'Dashboard';
        $data['SuratMasuk'] = model('SuratMasukModel')->countAllResults();
        $data['SuratKeluar'] = model('SuratKeluarModel')->countAllResults();
        $data['Disposisi'] = model('DisposisiModel')->countAllResults();
        return view('admin/dashboard', $data);
    }
}
