<?php
    if(empty($_POST)) {
        header("location: index.php");
    }

    $products = json_decode($_POST["products"], true);
    $total = 0;

    foreach($products as $product) {
        $total += $product["valor"];
    }

    $total += $_POST["shipping"];
    echo $total;
    
    $request = [
        'referenceId' => microtime(true),
        'callbackUrl' => 'http://' . $_SERVER['HTTP_HOST'] . '/notificacao.php',
        'value' => $total,
        'buyer' => [
            'firstName' => 'Matheus',
            'lastName' => 'Souza Arruda',
            'document' => '010.091.001-91',
            'email' => 'teste@picpay.com',
            'phone' => '+55 14 98802-9482'
        ]
    ];

    $picPayToken = '3cae4c2a-680b-4d1a-8545-2a0d13724401';
    $picPayUrl = 'https://appws.picpay.com/ecommerce/public/payments';

    $headers = [
        'Content-Type: application/json',
        'X-Picpay-Token: ' . $picPayToken
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $picPayUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($result, true);
    if(curl_errno($ch)){
        die('Erro ' . curl_errno($ch));
    }
    
    echo $result;
?>