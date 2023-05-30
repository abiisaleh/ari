<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Demo extends Seeder
{
    public function run()
    {
        $authorize = $auth = service('authorization');
        $authorize->addUserToGroup(1, 'master');
        $authorize->addUserToGroup(2, 'admin');

        $data = [
            "nip" => 376238128319,
            "nama" => "Muahamd Abi Saleh",
            "jk" => "laki-laki",
            "telp" => "082238204776",
            "alamat" => "abepura",
            "tgl_lahir" => "1999-01-01",
            "tempat_lahir" => "jayapura",
            "gol" => "II",
            "ruang" => "a",
        ];
        $this->db->table('pegawai')->insert($data);
    }
}
