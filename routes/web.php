<?php

use App\Models\User;

Route::get('/demo', function () {
    $client = new \GuzzleHttp\Client();
    $requestApi = $client->get('https://json.extendsclass.com/bin/89470a930f58');
    $result = $requestApi->getBody();
    $data = json_decode($result);

    $dataFiltered = [];
    foreach ($data as $item) {
        $user = User::where('email', $item->email)->first();
        array_push($dataFiltered, ['email' => $item->email, 'referral' => optional($user)->referral ?: '-']);
    }
    return $dataFiltered;
});
