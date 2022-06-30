<?php
namespace App\Traits;

use App\Models\CultureDataModel;
use App\Models\CultureModel;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;

trait Table
{
    public function getData()
    {
        $crawler = new Crawler(file_get_contents(env('URL_COPAGRIL')));

        $table = $crawler->filter('table')->filter('tr')->each(function($tr, $i) {
            if ($i == 0) {
                return $tr->filter('th')->each(function($th, $i) {
                    return trim($th->text());
                });
            } else {
                return $tr->filter('td')->each(function($td, $i) {
                    return trim($td->text());
                });
            }
        });

        DB::table('cultures_data')->delete();
        DB::table('cultures')->delete();

        $cultureIds = [];

        foreach ($table as $i => $row) {
            if ($i == 0) {
                foreach ($row as $j => $culture) {
                    if ($j == 0) {
                        continue;
                    }

                    $result = CultureModel::create([
                        'name' => $row[$j]
                    ]);

                    array_push($cultureIds, $result->id);
                }
            } else {
                $counter = 0;

                foreach ($row as $j => $culture) {
                    if ($j == 0) {
                        continue;
                    }

                    $dayAndHour = explode('-', $row[0]);
                    $dayParts = explode('/', $dayAndHour[0]);

                    $dbDateFormat = trim($dayParts[2]) . '-' . $dayParts[1] . '-' . $dayParts[0] . ' ' . $dayAndHour[1];

                    CultureDataModel::create([
                        'date' => $dbDateFormat,
                        'culture_id' => $cultureIds[$counter],
                        'value' => (float) str_replace('R$', '', $row[$j])
                    ]);

                    $counter++;
                }
            }
        }
    }
}
