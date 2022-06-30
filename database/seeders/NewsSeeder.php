<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
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
                'source' => '',
                'title' => 'Kabupaten Samosir',
                'body' => 'Samosir Island',
                'thumbnail' => '1656294790.jpeg',
                'created_by' => 1,
            ],
            [
                'source' => ' https://m-kumparan-com.cdn.ampproject.org/v/s/m.kumparan.com/amp/kumparannews/heboh-wakapolres-samosir-marahi-pastor-berujung-restorative-justice-1yJjaQcl1c9?amp_gsa=1&amp_js_v=a9&usqp=mq331AQKKAFQArABIIACAw%3D%3D#amp_tf=From%20%251%24s&aoh=16562930887191&referrer=https%3A%2F%2Fwww.google.com&ampshare=https%3A%2F%2Fkumparan.com%2Fkumparannews%2Fheboh-wakapolres-samosir-marahi-pastor-berujung-restorative-justice-1yJjaQcl1c9',
                'title' => 'Heboh Wakapolres Samosir Marahi Pastor, Berujung Restorative Justice',
                'body' => 'Wakapolres Samosir Kompol Tongap M Lumban Tobing, terlibat perselisihan dengan Pastor bernama Sabat Nababan. Peristiwa tersebut terjadi di Desa Wisata Tomok, Kecamatan Simanindo, Kabupaten Samosir, Sumatera Utara, Kamis (16/6).',
                'thumbnail' => '1656294691.jpeg',
                'created_by' => 1,
            ],
            [
                'source' => 'https://travel-tempo-co.cdn.ampproject.org/v/s/travel.tempo.co/amp/1604815/main-mainlah-ke-bukit-holbung-samosir-lokasi-film-ngeri-ngeri-sedap?amp_gsa=1&amp_js_v=a9&usqp=mq331AQKKAFQArABIIACAw%3D%3D#amp_tf=From%20%251%24s&aoh=16562931407597&referrer=https%3A%2F%2Fwww.google.com&ampshare=https%3A%2F%2Ftravel.tempo.co%2Fread%2F1604815%2Fmain-mainlah-ke-bukit-holbung-samosir-lokasi-film-ngeri-ngeri-sedap',
                'title' => 'Mainlah Ke Bukit Holbung Samosir, Lokasi Film Ngeri Ngeri Sedap',
                'body' => 'Film Ngeri-ngeri Sedap yang disutradarai dan ditulis oleh Bene Dion Rajagukguk berhasil menyita hati para penonton tanah air, khususnya yang berasal dari Sumatra Utara. Salah satu lokasi syuting film ini di Bukit Holbung, Samosir. Seperti apa keistimewaan Bukit Holbung tersebut?',
                'thumbnail' => '1656294698.jpeg',
                'created_by' => 1,
            ],
            [
                'source' => 'https://samosirkab.go.id/2022/06/19/pemkab-samosir-ikuti-penilaian-verifikasi-lapangan-hybrid-vlh-evaluasi-kabupaten-layak-anak-tahun-2022/',
                'title' => 'Pemkab Samosir Ikuti Penilaian Verifikasi Lapangan Hybrid VLH Evaluasi Kabupaten Layak Anak Tahun 2022',
                'body' => 'Pemerintah Kabupaten Samosir mengikuti penilaian Verifikasi Lapangan Hybrid (VLH) evaluasi Kabupaten Layak Anak (KLA) Tahun 2022 yang diselenggarakan secara hybrid (virtual dan tatap muka) di Aula Kantor dan Lobi lt. 2 Kantor Kantor Bupati Samosir, Pangururan, Jumat (17/6).',
                'thumbnail' => '1656294705.jpeg',
                'created_by' => 1,
            ]
        );

        foreach ($data as $key => $value) {
            \App\Models\News::create($value);
        }
    }
}
