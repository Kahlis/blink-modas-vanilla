<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cart</title>
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
			$page = "cart";
			require("header.php");
			require("system/functions.php");
		?> 
		<!-- Title Page -->
		<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/new/cart_cover.jpg);">
			<h2 class="l-text2 t-center">
				Carrinho de compras
			</h2>
		</section>

		<!-- Cart -->
		<section class="cart bgwhite p-t-70 p-b-100">
			<?php 
				$products = [];
				$product1 =
					array(
			            'peso'=>1.200,
			            'altura'=> 12,
			            'largura'=> 70,
			            'comprimento'=> 50,
			            'tipo' => 'E',
			            'valor' => 1.00
					);
				$product2 =
					array(
			            'peso'=>0.300,
			            'altura'=> 3,
			            'largura'=> 70,
			            'comprimento'=> 50,
			            'tipo' => 'E',
			            'valor' => 1.00
					);
				/*
				$product3 =
					array(
			            'peso'=>0.300,
			            'altura'=> 3,
			            'largura'=> 70,
			            'comprimento'=> 50,
			            'tipo' => 'E',
			            'valor' => 30.00
					);
				$product4 =
					array(
			            'peso'=>0.300,
			            'altura'=> 3,
			            'largura'=> 70,
			            'comprimento'=> 50,
			            'tipo' => 'E',
			            'valor' => 35.00
					);
				*/


				array_push($products, $product1);
				array_push($products, $product2);
				/*
				array_push($products, $product3);
				array_push($products, $product4);
				*/
			?>
			<div class="container">
				<!-- Cart item -->
				<div class="container-table-cart pos-relative">
					<div class="wrap-table-shopping-cart bgwhite">
						<table class="table-shopping-cart">
							<tr class="table-head">
								<th class="column-1"></th>
								<th class="column-2">Produto</th>
								<th class="column-3">Preço</th>
								<th class="column-4 p-l-20">Quantidade</th>
								<th class="column-5">Cor</th>
								<th class="column-6">Total</th>
							</tr>

							<tr class="table-row">
								<td class="column-1">
									<div class="cart-img-product b-rad-4 o-f-hidden">
										<img src="images/item-10.jpg" alt="IMG-PRODUCT">
									</div>
								</td>
								<td class="column-2">Um nome extremamente grande de uma roupa para testar o design</td>
								<td class="column-3">$36.00</td>
								<td class="column-4">
									<div class="flex-w bo5 of-hidden w-size17">
										<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
										</button>

										<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="1">

										<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
										</button>
									</div>
								</td>
								<td class="column-5">
									<ul class="flex-w color-ul">
										<li class="m-r-10">
											<input class="checkbox-color-filter" id="color-filter0" type="checkbox" name="color">
											<label class="color-filter" for="color-filter0" style="background-color: #8ee1f8"></label>
										</li>
										<li class="m-r-10">
											<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color">
											<label class="color-filter" for="color-filter1" style="background-color: #ab4502"></label>
										</li>
										<li class="m-r-10">
											<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color">
											<label class="color-filter" for="color-filter2" style="background-color: #19bc0a"></label>
										</li>
										<li class="m-r-10">
											<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color">
											<label class="color-filter" for="color-filter3" style="background-color: #d79b0d"></label>
										</li>
										<li class="m-r-10">
											<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color">
											<label class="color-filter" for="color-filter4" style="background-color: #1dae8e"></label>
										</li>
										<li class="m-r-10">
											<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color">
											<label class="color-filter" for="color-filter5" style="background-color: #b9920f"></label>
										</li>
										<li class="m-r-10">
											<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color">
											<label class="color-filter" for="color-filter6" style="background-color: #375469"></label>
										</li>
										<li class="m-r-10">
											<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color">
											<label class="color-filter" for="color-filter7" style="background-color: #1414a2"></label>
										</li>
										<li class="m-r-10">
											<input class="checkbox-color-filter" id="color-filter8" type="checkbox" name="color">
											<label class="color-filter" for="color-filter8" style="background-color: #64b434"></label>
										</li>
									</ul>
								</td>
								<td class="column-6">$36.00</td>
							</tr>

							<tr class="table-row">
								<td class="column-1">
									<div class="cart-img-product b-rad-4 o-f-hidden">
										<img src="images/item-05.jpg" alt="IMG-PRODUCT">
									</div>
								</td>
								<td class="column-2">Mug Adventure</td>
								<td class="column-3">$16.00</td>
								<td class="column-4">
									<div class="flex-w bo5 of-hidden w-size17">
										<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
										</button>

										<input class="size8 m-text18 t-center num-product" type="number" name="num-product2" value="1">

										<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
										</button>
									</div>
								</td>
								<td class="column-5">$16.00</td>
							</tr>
						</table>
					</div>
				</div>

				<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
					<div class="flex-w flex-m w-full-sm">
						<div class="size11 bo4 m-r-10">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
						</div>

						<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
							<!-- Button -->
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Aplicar cupom
							</button>
						</div>
					</div>

					<div class="size10 trans-0-4 m-t-10 m-b-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Atualizar
						</button>
					</div>
				</div>

				<!-- Total -->
				<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
					<h5 class="m-text20 p-b-24">
						Total no carrinho
					</h5>

					<!--  -->
					<div class="flex-w flex-sb-m p-b-12">
						<span class="s-text18 w-size19 w-full-sm">
							Subtotal:
						</span>

						<span class="m-text21 w-size20 w-full-sm">
							R$39.00
						</span>
					</div>

					<!--  -->
					<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
						<span class="s-text18 w-size19 w-full-sm">
							Entrega:
						</span>

						<div class="w-size20 w-full-sm">
							<div class="s-text8 p-b-23" id="shipping_response">
							</div>

							<span class="s-text19">
								Calcular Entrega
							</span>

							<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
								<select class="selection-2" name="country">
									<option>Selecione um estado...</option>
									<option>Acre</option> 					<option>Alagoas</option>
									<option>Amapá</option> 					<option>Amazonas</option>
									<option>Bahia</option> 					<option>Ceará</option>
									<option>Disrtito Federal</option>		<option>Espírito Santo</option>
									<option>Goiás</option> 					<option>Maranhão</option>
									<option>Mato Grosso</option> 			<option>Mato Grosso do Sul</option>
									<option>Minas Gerais</option> 			<option>Pará</option>
									<option>Paraíba</option> 				<option>Paraná</option>
									<option>Pernambuco</option> 			<option>Piauí</option>
									<option>Rio de Janeiro</option> 		<option>Rio Grande do Sul</option>
									<option>Rondônia</option> 				<option>Roraima</option>
									<option>Santa Catarina</option> 		<option>São Paulo</option>
									<option>Sergipe</option> 				<option>Tocantins</option>
								</select>
							</div>

							<div class="size13 bo4 m-b-12">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="city" placeholder="Cidade">
							</div>

							<div class="size13 bo4 m-b-22">
								<input id="CEP" class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="CEP">
							</div>

							<div class="size14 trans-0-4 m-b-10">
								<!-- Button -->
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" id="search">
									Pesquisar
								</button>
							</div>
						</div>
					</div>

					<!--  -->
					<div class="flex-w flex-sb-m p-t-26 p-b-30">
						<span class="m-text22 w-size19 w-full-sm">
							Total:
						</span>

						<span class="m-text21 w-size20 w-full-sm text-right" id="total">
							R$ 70.00
						</span>
					</div>

					<div class="size15 trans-0-4">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" id="checkout">
							Continuar compra
						</button>
					</div>
				</div>
			</div>
		</section>



		<!-- Footer -->
		<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
			<div class="flex-w p-b-90">
				<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
					<h4 class="s-text12 p-b-30">
						GET IN TOUCH
					</h4>

					<div>
						<p class="s-text7 w-size27">
							Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
						</p>

						<div class="flex-m p-t-30">
							<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
							<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
							<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
							<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
							<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
						</div>
					</div>
				</div>

				<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
					<h4 class="s-text12 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-9">
							<a href="#" class="s-text7">
								Men
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								Women
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								Dresses
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								Sunglasses
							</a>
						</li>
					</ul>
				</div>

				<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
					<h4 class="s-text12 p-b-30">
						Links
					</h4>

					<ul>
						<li class="p-b-9">
							<a href="#" class="s-text7">
								Search
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								About Us
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								Contact Us
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								Returns
							</a>
						</li>
					</ul>
				</div>

				<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
					<h4 class="s-text12 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-9">
							<a href="#" class="s-text7">
								Track Order
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								Returns
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								Shipping
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
					<h4 class="s-text12 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="effect1 w-size9">
							<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
							<span class="effect1-line"></span>
						</div>

						<div class="w-size2 p-t-20">
							<!-- Button -->
							<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
								Subscribe
							</button>
						</div>

					</form>
				</div>
			</div>

			<div class="t-center p-l-15 p-r-15">
				<a href="#">
					<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
				</a>

				<a href="#">
					<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
				</a>

				<a href="#">
					<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
				</a>

				<a href="#">
					<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
				</a>

				<a href="#">
					<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
				</a>

				<div class="t-center s-text8 p-t-20">
					Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				</div>
			</div>
		</footer>



		<!-- Back to top -->
		<div class="btn-back-to-top bg0-hov" id="myBtn">
			<span class="symbol-btn-back-to-top">
				<i class="fa fa-angle-double-up" aria-hidden="true"></i>
			</span>
		</div>

		<!-- Container Selection -->
		<div id="dropDownSelect1"></div>
		<div id="dropDownSelect2"></div>

		<!--
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
		-->
	<!--===============================================================================================-->
		<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
		<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
		<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
		<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
		<script type="text/javascript" src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
		<!--<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>-->
		<script type="text/javascript" src="vendor/sweetalert2.js"></script>
		<script type="text/javascript">
			let obj = {
				"products": `"${<?php echo json_encode($products); ?>}"`
			}
			
			let selected = {
				description: "",
				price: 0
			}

			$("#checkout").on('click', function() {
				$.ajax({
					method: "POST",
					url: "system/buy.php",
					data: {
						products: <?php echo "'" . json_encode($products) . "'"; ?>,
						shipping: selected.price,
						description: selected.description
					}
				}).done(function( response ) {
					alert(response);
					console.log(response);
				});
			});

			$("#search").on('click', function() {

				var json;

				const swal = Swal.fire({
					title: 'Calculando frete',
					html: 'Aguarde enquanto o site retorna as opções de frete',
					timerProgressBar: true,
					didOpen: () =>{
						Swal.showLoading()
    					document.querySelector('.swal2-container').style.zIndex = 100000;
					}
				});

				$.ajax({
					method: "POST",
					url: "system/shipment_estimate.php",
					data: {
						from: "13213150",
						destination: document.querySelector("#CEP").value,
						total: $("#total").text(),
						weight: 1,
						products: <?php echo "'" . json_encode($products) . "'"; ?>
					}
				}).done(function( response ) {
					json = JSON.parse(response);

					var str = "";
					var model = '<li class="shipping-parent"><button type="button" class="shipping-result" id="{4}"><div class="row d-flex justify-content-center"><span class="company-name">{1}</span></div><div class="row d-flex justify-content-center"><img src="images/icons/{0}.png" class="company-logo"></img></div><div class="row d-flex justify-content-center"><span class="price-tag">R$ {2}</span> </div><div class="row d-flex justify-content-center"><span class="delivery">{3} dias</span></div></button></li>';

					for(var i = 0; i < json.length; i++)
					{
						str = str.concat(model.replace("{0}", json[i].descricao.substring(10)
																.split(" ")[0].toLowerCase())
																.replace("{1}", json[i].descricao.substring(10))
																.replace("{2}", json[i].vlrFrete.toString().replace(".", ","))
																.replace("{3}", (json[i].prazoEnt + 2))
																.replace("{4}", ("e-" + i)));
					}

					swal.close();
					Swal.fire({
						html: 
						'Escolha a forma de envio</br></br><ul class="list-inline justify-content-center row shipping-result-container">' + str + '</ul>',
			 				confirmButtonText: 'Confirmar',
			 				didOpen: () =>
			 				{
								$(".shipping-result").click(function()
								{ 
									console.log(json);
									$(".shipping-result").each(function () {
										$(this).removeClass("selected");
									});

									//use a class, since your ID gets mangled
									$(this).addClass("selected");      //add the class to the clicked element
									
									let id = 0;
									let i = {};
									json.forEach((elem) => {
										console.log(document.getElementById("e-" + id).classList.contains('selected'));
										if(document.getElementById("e-" + id).classList.contains("selected")){
											i = elem;
										}
										id++;
									})

									selected.description = i.descricao;
									selected.price = i.vlrFrete;
									console.log(selected);
								});
			 				}
						//'<div class="row"> <div> <image src="images/icons/correios.jpg" class="ship-icon"> </div> <div> <a href="#">Correios - R$ 20,00</br> 15 dias</a> </br> </div> </div>'
					});
				});
			});

			$(".selection-1").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect1')
			});

			$(".selection-2").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect2')
			});

			$("input:checkbox").on('click', function() {
				// in the handler, 'this' refers to the box clicked on
				var $box = $(this);
				if ($box.is(":checked"))
				{
					$id = $box.attr('id').replace(/color-filter/, '');
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
		</script>
	<!--===============================================================================================-->
		<script src="js/main.js"></script>
	</body>
</html>
