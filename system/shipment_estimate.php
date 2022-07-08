<?php
    $from = $_POST['from'];
    $destination = $_POST['destination'];
    $total_post = $_POST['total'];
    $weight = $_POST['weight'];
    $total = substr($total_post, 3, strlen($total_post) - 3);
    $url = "https://portal.kangu.com.br/tms/transporte/simular";
    $products_json = json_decode($_POST['products'], true);
    $products = [];

    $data = array();
    $data['cepOrigem'] = $from;
    $data['cepDestino'] = $destination;
    $data['origem'] = 'Blink Modas';
    $data['produtos'] = array();
    $data['ordenar'] = "preco";

    
    foreach($products_json as $product)
        array_push($data['produtos'], $product);

    $data['servicos'] = array('E','X');

    $json = json_encode($data);
    $curlHandler = curl_init();

    curl_setopt_array($curlHandler,
    [
        CURLOPT_URL => 'https://portal.kangu.com.br/tms/transporte/simular',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $json,
        CURLOPT_HTTPHEADER =>
        array(
            'Content-Type:application/x-www-form-urlencoded',
            'token: 5ca927920b076df54d50847d3253ed1c',
            'Content-Length: ' . strlen($json)
        )
    ]);

    $response = curl_exec($curlHandler);
    curl_close($curlHandler);

    $result = json_decode($response);
    echo $response;
?>