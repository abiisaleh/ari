<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
    public function up()
    {
        $field = [
            "nip"           => ["type" => "VARCHAR", "constraint" => 16, "auto_increment" => false],
            "nama"          => ["type" => "VARCHAR", "constraint" => 30],
            "jk"            => ["type" => "ENUM('laki-laki','perempuan')"],
            "telp"          => ["type" => "VARCHAR", "constraint" => 13],
            "alamat"        => ["type" => "TEXT"],
            "tgl_lahir"     => ["type" => "DATE"],
            "tempat_lahir"  => ["type" => "VARCHAR", "constraint" => 30],
            "gol"           => ["type" => "VARCHAR", "constraint" => 3],
            "ruang"         => ["type" => "VARCHAR", "constraint" => 1],
        ];
        $this->forge->addPrimaryKey("nip");
        $this->forge->addField($field);
        $this->forge->createTable("pegawai");
    }

    public function down()
    {
        $this->forge->dropTable("pegawai");
    }
}
