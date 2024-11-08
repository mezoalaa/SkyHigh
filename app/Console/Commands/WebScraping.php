<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpClient\HttpClient;

class WebScraping extends Command
{
    protected $signature = 'scrape:flights';
    protected $description = 'Scrape flight data';

    public function handle()
    {
        $client=new Client();
        $crawler=$client->request('GET','https://www.kiwi.com/en/search/tiles/$departureCityUrlParam/anywhere/$from/$to?sortAggregateBy=price');
        // $div=$crawler->filter('.relative bg-ink-normal')->first();
        if ($crawler->filter('.relative.bg-ink-normal')->count() > 0) {
            $div = $crawler->filter('.relative.bg-ink-normal')->first();
            // $subPage=$div->filter('.flex flex-col gap-xs ld:flex-row a')->first();
            if ($div->filter('.flex flex-col gap-xs ld:flex-row a')->count() > 0) {
                $subPage = $div->filter('.flex flex-col gap-xs ld:flex-row a')->first();
                dd($subPage->attr('class'));
            } else {
                dd('No link found in the specified structure.');
            }

        } else {
            dd('No elements found with the specified classes.');
        }




        return 0;

    }

    // public function handle()
    // {
    //     $client = new Client();
    //     $departureCityUrlParam = 'vilnius-lithuania'; // Placeholder variable, define these as per your logic
    //     $from = '2023-01-01'; // Example start date
    //     $to = '2023-01-02'; // Example end date

    //     // Using double quotes to allow variable interpolation
    //     $crawler = $client->request('GET', "https://www.kiwi.com/en/search/tiles/$departureCityUrlParam/anywhere/$from/$to?sortAggregateBy=price");

    //     // Correct selector usage for classes
    //     if ($crawler->filter('.relative bg-ink-normal')->count() > 0) {
    //         $div = $crawler->filter('.relative.bg-ink-normal')->first();
    //         // if ($div->filter('.flex.flex-col.gap-xs.ld:flex-row a')->count() > 0) {
    //         //     $subPage = $div->filter('.flex.flex-col.gap-xs.ld\\:flex-row a')->first();
    //         //     dd($subPage->attr('a'));
    //         // } else {
    //         //     dd('No link found in the specified structure.');
    //         // }
    //     } else {
    //         dd('No elements found with the specified classes.');
    //     }

    //     return 0;
    // }


}














// class WebScraping extends Command
// {
//     protected $signature = 'scrape:flights';
//     protected $description = 'Scrape flight data';

//     public function handle()
//     {
//         $client = new Client(HttpClient::create(['timeout' => 60]));
//         $departureCityUrlParam = 'vilnius-lithuania';
//         $priceThreshold = 100;
//         $weekends = $this->getUpcomingWeekends(10);
//         $flightData = [];

//         foreach ($weekends as $weekend) {
//             $from = $weekend['friday'];
//             $to = $weekend['sunday'];

//             $crawler = $client->request('GET', "https://www.kiwi.com/en/search/tiles/$departureCityUrlParam/anywhere/$from/$to?sortAggregateBy=price");

//             // Handle initial cookie acceptance
//             $crawler->filter('#cookies_accept')->each(function ($node) use ($client) {
//                 $client->click($node->link());
//             });

//             $crawler->filter('[data-test=PictureCard]')->each(function ($node) use (&$flightData, $priceThreshold, $from, $to) {
//                 $textContent = $node->text();
//                 $price = filter_var($textContent, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

//                 if ($price < $priceThreshold) {
//                     $city = str_replace(' ', '-', trim(substr($textContent, strpos($textContent, 'From'))));
//                     $flightData[] = [
//                         'from' => $from,
//                         'to' => $to,
//                         'city' => $city,
//                         'price' => $price
//                     ];
//                 }
//             });
//         }

//         if (!empty($flightData)) {
//             $jsonData = json_encode($flightData, JSON_PRETTY_PRINT);
//             $filePath = 'flights_data.json';  // Simplified for clarity
//             Storage::disk('public')->put($filePath, $jsonData);  // Write directly using Storage

//             // Debugging output to console
//             $this->info('JSON data written to public storage.');
//             $fullPath = storage_path('app/public') . '/' . $filePath;
//             $this->info('Full path: ' . $fullPath);

//             // Check if file exists
//             if (file_exists($fullPath)) {
//                 $this->info('File exists and is written successfully.');
//             } else {
//                 $this->error('Failed to write the file.');
//             }
//             Storage::disk('public')->put('test.txt', 'Test content');

//         }

//     }

//     private function getUpcomingWeekends($numberOfWeekends)
//     {
//         $weekends = [];
//         $currentDate = new \DateTime();
//         for ($i = 0; $i < $numberOfWeekends; $i++) {
//             $friday = (clone $currentDate)->modify('next friday')->format('Y-m-d');
//             $sunday = (clone $currentDate)->modify('next sunday')->format('Y-m-d');
//             $weekends[] = ['friday' => $friday, 'sunday' => $sunday];
//             $currentDate->modify('+1 week');
//         }
//         return $weekends;
//     }
// }
