    $client = new GuzzleHttp\Client([
        'base_uri' => "http://mora-sa.com/api/v1/"
    ]);
    // $key = "api_key=88acd4567fac2adaec0d64134d1cd5c974ad391d&username=mabdulmonem";
    $key = "api_key=ba817ecd7da9aa5b1bab0fc2bfe0d4d32b2a4084&username=mabdulmonem";
    // $res = $client->request('GET', "sendsms?$key&message=test&sender=mohamed&numbers=01099647084", [
    //     'api_key' => '88acd4567fac2adaec0d64134d1cd5c974ad391d',
    //     'username' => 'mabdulmonem',
    //     'sender' => 'mohamed',
    //     'numbers' => '01099647084',
    //     'message' => 'test',
    //     'return' => 'json'
    // ]);
    // $res = $client->request('GET', "sender_names?$key");
    try {
        $res = $client->request('GET', "sendsms?$key");
        echo $res->getStatusCode();
    } catch (\Throwable $th) {
        $a =explode("\n",$th->getMessage());
        json_decode($a[1]);
    }
    // "200"
    // echo $res->getHeader('content-type')[0];
    // // 'application/json; charset=utf8'
    // echo $res->getBody();
    // {"type":"User"...'
        
    // Send an asynchronous request.

