<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratMasuk extends Migration
{
    public function up()
    {
        $field = [
            "no"            => ["type" => "VARCHAR", "constraint" => 16, "auto_increment" => false],
            "tgl_surat"     => ["type" => "DATE"],
            "tgl_terima"    => ["type" => "DATE"],
            "sifat"         => ["type" => "VARCHAR", "constraint" => 13],
            "perihal"       => ["type" => "VARCHAR", "constraint" => 30],
            "asal"          => ["type" => "VARCHAR", "constraint" => 30],
            "scan"          => ["type" => "TEXT"],
        ];
        $this->forge->addPrimaryKey("no");
        $this->forge->addField($field);
        $this->forge->createTable("surat_masuk");
    }

    public function down()
    {
        $this->forge->dropTable("surat_masuk");
    }
}
