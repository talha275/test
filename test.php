<?php  



    require("OAuth.php");
     
    $cc_key  = "b4a6165824bb45fcb991483230f60af6";
    $cc_secret = "70391396dc6145f3b19fcdd6bd1df8dc";
    $url = "http://api.thenounproject.com/icons/5";
    $args = array();
    $args["limit"] = 10;
     
    $consumer = new OAuthConsumer($cc_key, $cc_secret);
    $request = OAuthRequest::from_consumer_and_token($consumer, NULL,"GET", $url, $args);
    $request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, NULL);
    $url = sprintf("%s?%s", $url, OAuthUtil::build_http_query($args));
    $ch = curl_init();
    $headers = array($request->to_header());
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $rsp = curl_exec($ch);
    $results = json_decode($rsp);
    // print_r($results);
    // echo "<pre>";print_r($results);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

.main-row {
    float: left;
    width: 100%;
}
.col {
    float: left;
    width: 33.33%;
    padding: 20px;
    text-align: center;
    border: 1px solid #333;
    box-sizing: border-box;
}
.col img {
    width: 200px;
}
.col a {
    width: 100px;
    display: block;
    margin: 0 auto;
    background: #a54141;
    color: #fff;
    border-radius: 5px;
    padding: 12px;
    font-size: 18px;
    text-decoration: none;
    margin-top: 20px;
}
</style>
<body>
    <div class="wrapper">

            <div class="main-row">

                <div class="col">
                    <img src="img.png" />
                    <a href="#">Button</a>
                </div>

                <div class="col">
                    <img src="img.png" />
                    <a href="#">Button</a>
                </div>

                <div class="col">
                    <img src="img.png" />
                    <a href="#">Button</a>
                </div>

            </div>

    </div>
</body>
</html>