<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	<?php
		$hasProducts = false;
		$page = "female";
		require("header.php");
	    require('system/Connection.php');
	    $query = "SELECT * FROM products WHERE catalog = '". $_GET['catalog'] . "'";
	    if($rs = mysqli_query($conn, $query))
	    {
    		if(mysqli_num_rows($rs) > 0)
    		{
	    		if($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
	    		{
	    			$response['status'] = 'OK';
					$json = json_decode($row['storage'], true);
	    		}
	    	}
	    }
	    else
	    {
	        $response['status'] = "error";
		    $response['error'] = mysqli_error($conn);
	    }
	?> 
	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.html" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.html" class="s-text16">
			Women
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="#" class="s-text16">
			T-Shirt
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			Boxy T-Shirt with Roll Sleeve Detail
		</span>
	</div>
	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>
					<div class="slick3">
						<?php
							$splitted = explode(";", $row["images"]);
							foreach($splitted as $split)
							{
								echo
								'<div class="item-slick3" data-thumb="images/models/' . $split . '">
									<div class="wrap-pic-w">
										<img src="images/models/' . $split . '" alt="IMG-PRODUCT">
									</div>
								</div>';
							}
						?>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?php echo $row['name']; ?>
				</h4>
				<?php
					$total = 0;

					foreach($json as $value)
					{
						$total += $value["P"];
						$total += $value["M"];
						$total += $value["G"];
						$total += $value["GG"];
						$total += $value["UNIQUE"];
					}

					if($total > 0)
					{
						if($row["sale_price"] != "0")
						{
							echo
							'<span class="m-text18"><s>R$ '.
								  $row['price']  
							. ' </s></span></br>';
							echo
							'	<span class="m-text17" id="price" style="color: #e65540">R$ '.
								  $row['sale_price']  
							. '</span>';
						}
						else
						{
							echo
							'<span class="m-text17" id="price">R$ '.
								  $row['price']  
							. '</span>';
						}
					}
					else
					{
							echo
							'<span class="m-text18">
								INDISPONÍVEL
							</s></span></br>';
					}
				?>

				<p class="s-text8 p-t-10">
					<?php echo $row['description']; ?>
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Tamanho
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select id="dropdown" class="selection-2" name="size">
								<option>Escolha um tamanho</option>
								<option id="size-p">P</option>
								<option id="size-m">M</option>
								<option id="size-g">G</option>
								<option id="size-gg">GG</option>
							</select>
						</div>
					</div>

					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Cor
						</div>

							<ul class="flex-w">
								<?php
									$id = 0;
									foreach($json as $storage)
									{
										echo
										'<li class="m-r-10">
											<input class="checkbox-color-filter" id="color-filter' . $id . '" type="checkbox" name="color">
											<label class="color-filter" for="color-filter' . $id . '" style="background-color: ' . $storage['color'] . '"></label>
										</li>';
										$id++;
									}
								?>
							</ul>
					</div>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div id="buy-amount" class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1" id="quantity">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10" id="add-cart-btn">
								<!-- Button -->
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									<i class="lnr lnr-cart icon-1x"></i>
								</button>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-4">
						<span class="s-text8 m-r-35" id="SKU">SKU: <?php echo $row["catalog"] ?></span>
					</div>
					<div class="col-8">
						<span class="s-text8">Tags:
							<?php
								$tags = explode(",", $row["tags"]);
								$tagID = 0;
								foreach($tags as $tag)
								{
									if($tagID != count($tags) - 1)
									{
										echo $tag . ", ";
									} 
									else
									{
										echo $tag . ".";
									}
								}
							?>
						</span>
					</div>
				</div>
				</br>

				<!--  -->
				<?php

					if($row["description"] != "")
					{
						echo
						'<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
							<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
								Descrição
								<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
								<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
							</h5>
							<div class="dropdown-content dis-none p-t-15 p-b-23">
								<p class="s-text8">
									' . $row["description"] . '
								</p>
							</div>
						</div>';
					}

					if($row["info"] != "")
					{
						echo 
						'<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
							<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
								Informações adicionais
								<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
								<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
							</h5>

							<div class="dropdown-content dis-none p-t-15 p-b-23">
								<p class="s-text8">
								' . $row["info"] . '
								</p>
							</div>
						</div>';
					}
				?>
				<!--
				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Reviews (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>
				-->
			</div>
		</div>
	</div>


	<!--
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Produtos relacionados
				</h3>
			</div>

			<!-- Slide2 ->
			<div class="wrap-slick2">
				<div class="slick2">

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 ->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="images/item-02.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button ->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Herschel supply co 25l
								</a>

								<span class="block2-price m-text6 p-r-5">
									$75.00
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 ->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="images/item-03.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button ->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Denim jacket blue
								</a>

								<span class="block2-price m-text6 p-r-5">
									$92.50
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 ->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="images/item-05.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button ->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Coach slim easton black
								</a>

								<span class="block2-price m-text6 p-r-5">
									$165.90
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 ->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
								<img src="images/item-07.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button ->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Frayed denim shorts
								</a>

								<span class="block2-oldprice m-text7 p-r-5">
									$29.50
								</span>

								<span class="block2-newprice m-text8 p-r-5">
									$15.90
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 ->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="images/item-02.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button ->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Herschel supply co 25l
								</a>

								<span class="block2-price m-text6 p-r-5">
									$75.00
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 ->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="images/item-03.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button ->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Denim jacket blue
								</a>

								<span class="block2-price m-text6 p-r-5">
									$92.50
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 ->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="images/item-05.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button ->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Coach slim easton black
								</a>

								<span class="block2-price m-text6 p-r-5">
									$165.90
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 ->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
								<img src="images/item-07.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button ->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Frayed denim shorts
								</a>

								<span class="block2-oldprice m-text7 p-r-5">
									$29.50
								</span>

								<span class="block2-newprice m-text8 p-r-5">
									$15.90
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
	-->
	<?php require("footer.php") ?>
	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		jQuery.fn.toggleOption = function( show ) {
		    jQuery( this ).toggle( show );
		    if( show ) {
		        if( jQuery( this ).parent( 'span.toggleOption' ).length )
		            jQuery( this ).unwrap( );
		    } else {
		        if( jQuery( this ).parent( 'span.toggleOption' ).length == 0 )
		            jQuery( this ).wrap( '<span class="toggleOption" style="display: none;" />' );
		    }
		};
		
		var storage = <?php echo $row["storage"]; ?>;
		jQuery.fn.changeOptions = function( id )
		{
			$('#dropdown').empty();

    		var optionP = $('<option id="size-p">P</option>');
    		var optionM = $('<option id="size-m">M</option>');
    		var optionG = $('<option id="size-g">G</option>');
    		var optionGG = $('<option id="size-gg">GG</option>');
    		var optionUnique = $('<option id="size-unique">Único</option>');

			if(storage[id].P > 0) $('#dropdown').append(optionP);
			if(storage[id].M > 0) $('#dropdown').append(optionM);
			if(storage[id].G > 0) $('#dropdown').append(optionG);
			if(storage[id].GG > 0) $('#dropdown').append(optionGG);
			if(storage[id].UNIQUE > 0) $('#dropdown').append(optionUnique);

			if(storage[id].P + storage[id].M + storage[id].G + storage[id].GG + storage[id].UNIQUE <= 0)
			{
        		var newOption = $('<option>Cor indisponível</option>');
				$('#dropdown').empty();
        		$('#dropdown').append(newOption);
    
        		$('#add-cart-btn').toggle(false)
        		$('#buy-amount').toggle(false);

				$('.selection').css({"pointer-events": "none", "cursor": "default"});
        		$('.selection').trigger("liszt:updated");
			}
			else
			{
        		$('#add-cart-btn').css('visibility', 'visible');
        		$('#buy-amount').css('visibility', 'visible');
    
        		$('#add-cart-btn').toggle(true)
        		$('#buy-amount').toggle(true);

				$('.selection').css({"pointer-events": "", "cursor": ""});
        		$('.selection').trigger("liszt:updated");
			}
		};

		$("input:checkbox").on('click', function() {
			// in the handler, 'this' refers to the box clicked on
			var $box = $(this);
			if ($box.is(":checked"))
			{
				$id = $box.attr('id').replace(/color-filter/, '');
				$box.changeOptions($id);
				// the name of the box is retrieved using the .attr() method
				// as it is assumed and expected to be immutable
				var group = "input:checkbox[name='" + $box.attr("name") + "']";
				// the checked state of the group/box on the other hand will change
				// and the current value is retrieved using .prop() method
				$(group).prop("checked", false);
				$box.prop("checked", true);
			} else {
				$(group).prop("checked", false);
				$box.prop("checked", true);
			}
		});

		var choose = false;
		$("input:checkbox").each(function(index, element)
		{
			if(storage[index].P + storage[index].M + storage[index].G + storage[index].GG + storage[index].UNIQUE > 0 && choose == false)
			{
				$('#color-filter'+index).prop("checked", true);
				jQuery($('#color-filter'+index)).changeOptions(index);
				choose = true;
			}
		});

		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "foi adicionado ao carrinho !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				//swal(nameProduct, "foi adicionado à sua lista de desejos !", "success");
				swal(nameProduct, "foi adicionado ao carrinho !", "success");
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			$(this).on('click', function(){
				let nameProduct = $('.product-detail-name').html();
				let price = document.getElementById("price").innerText.substring(2);
				let storage = <?php echo $row["storage"]; ?>;
				let catalog = document.getElementById("SKU").innerText.substring(5);
				console.log(catalog);
				let mainImg = <?php echo "'" . explode(";", $row["images"])[0] . "'"; ?>;
				let quantity = document.getElementById("quantity").value;
				//swal(nameProduct, "foi adicionado ao carrinho !", "success");
				products.push(new Product(nameProduct, price, storage, catalog, mainImg, quantity))
				rebuildCart();
				swal(nameProduct, "foi adicionado ao carrinho !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
