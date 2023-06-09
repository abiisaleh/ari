<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Disposisi extends Migration
{
    public function up()
    {
        $field = [
            "no"                => ["type" => "VARCHAR", "constraint" => 16, "auto_increment" => false],
            "tgl_penyelesaian"  => ["type" => "DATE"],
            "isi"               => ["type" => "VARCHAR", "constraint" => 30],
            "diteruskan"        => ["type" => "VARCHAR", "constraint" => 50],
            "fk_surat"          => ["type" => "VARCHAR", "constraint" => 16],
            "read"              => ["type" => "BOOLEAN", "default" => false],
        ];
        $this->forge->addPrimaryKey("no");
        $this->forge->addField($field);
        $this->forge->createTable("disposisi");
    }

    public function down()
    {
        $this->forge->dropTable("disposisi");
    }
}
