<?php
	function echo_promo($image, $catalog, $name, $price, $sale_price)
	{
		echo
			'<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
						<img src="images/models/' . $image . '" alt="IMG-PRODUCT">

						<div class="block2-overlay trans-0-4">
							<!--
							<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
								<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
								<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
							</a>
							-->

							<div class="block2-btn-addcart w-size1 trans-0-4">
								<!-- Button -->
								<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
									<i class="lnr lnr-cart icon-1x"></i>
								</button>
							</div>
						</div>
					</div>

					<div class="block2-txt p-t-20">
						<a href="product-detail.php?catalog=' . $catalog . '" class="block2-name dis-block s-text3 p-b-5">
							' . $name . '
						</a>

						<span class="block2-oldprice m-text7 p-r-5">
							R$ ' . $price . '
						</span>

						<span class="block2-newprice m-text8 p-r-5">
							R$ ' . $sale_price . '
						</span>
					</div>
				</div>
			</div>';
	}

	function echo_no_promo($image, $catalog, $name, $price)
	{

		echo
			'<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-img wrap-pic-w of-hidden pos-relative">
						<img src="images/models/' . $image. '" alt="IMG-PRODUCT">

						<div class="block2-overlay trans-0-4">
							<!--
							<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
								<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
								<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
							</a>
							-->

							<div class="block2-btn-addcart w-size1 trans-0-4">
								<!-- Button -->
								<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
									<i class="lnr lnr-cart icon-1x"></i>
								</button>
							</div>
						</div>
					</div>

					<div class="block2-txt p-t-20">
						<a href="product-detail.php?catalog=' . $catalog . '" class="block2-name dis-block s-text3 p-b-5">
							' . $name . '
						</a>

						<span class="block2-price m-text6 p-r-5">
							R$ ' . $price . '
						</span>
					</div>
				</div>
			</div>';
	}

	function shipment_estimate($sender, $receiver, $products)
	{
	    $data = array();
	    $data['cepOrigem'] = $sender;
	    $data['cepDestino'] = $receiver;
	    $data['origem'] = 'Blink Modas';

	    $data['produtos'] = [];
	    foreach($products as $product)
	        array_push($data['produtos'], $product);

	    $data['servicos'] = array('E','X','R');

	    $json = json_encode($data);
	    $curlHandler = curl_init();
	    curl_setopt_array($curlHandler, [
	    CURLOPT_URL => 'https://portal.kangu.com.br/tms/transporte/simular',
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_SSL_VERIFYPEER => false,
	    CURLOPT_POST => true,
	    CURLOPT_POSTFIELDS => $json,
	    CURLOPT_HTTPHEADER =>
	    array(
	        'Content-Type:application/x-www-form-urlencoded',
	        'token:5ca927920b076df54d50847d3253ed1c',
	        'Content-Length:' . strlen($json)
	        )
	    ]);

	    $response = curl_exec($curlHandler);
	    curl_close($curlHandler);

	    $result = json_decode($response, true);

	    $fields = "";
	    foreach($result as $single)
	    {
	        $fields .= '
	                    <div class="row">
	                        <div>
	                            <image src="images/icons/correios.jpg" class="ship-icon">
	                        </div>
	                        <div>
	                            <a href="#">'
	                                . substr($single["descricao"], 10, strlen($single["descricao"]) - 10)
	                                . ' - R$ ' . str_replace(".", ",", $single["vlrFrete"])
	                                . '</br>'
	                                . strval(intval($single["prazoEnt"]) + 2) . ' dias</a>
	                            </br>
	                        </div>
	                    </div>';
	    }

	    return $fields;
	}
?>