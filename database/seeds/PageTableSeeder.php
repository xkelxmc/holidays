<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageTableSeeder extends Seeder
{
    /**
     * The settings to add.
     */
    protected $settings = [
        [
            'template' => 'meta',
            'name' => 'test',
            'title' => 'Тест',
            'slug' => 'test',
            'content' => '<p>Тест</p>',
            'extras' => '{"meta_title":"\u0442\u0435\u0441\u0442","meta_description":"\u0442\u0435\u0441\u0442","meta_keywords":"\u0442\u0435\u0441\u0442"}',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting) {
            $result = DB::table('pages')->insert($setting);

            if (!$result) {
                $this->command->info("Insert failed at record $index.");

                return;
            }
        }

        $this->command->info('Inserted ' . count($this->settings) . ' records.');
    }
}
