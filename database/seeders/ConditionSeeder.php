<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'title' => 'Syarat Pendaftaran Pembuatan KTP',
                'body' => '<ol><li>Berusia 17 tahun.</li><li>Warga Negara Indonesia (WNI).</li><li>Scan foto Kartu Keluarga.</li><li>Scan foto Akta Kelahiran.</li><li>Surat pengantar dari pihak RT/RW.</li></ol>',
            ],
        );

        foreach ($data as $key => $value) {
            \App\Models\Condition::create($value);
        }
    }
}
