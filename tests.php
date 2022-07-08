<html>
	<header>
		<title>Testes</title>
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
		<link rel="stylesheet" type="text/css" href="css/testing_page.css">
	</header>
	<?php 
		$products = [];
		$product1 =
			array(
	            'peso'=>1.200,
	            'altura'=> 12,
	            'largura'=> 70,
	            'comprimento'=> 50,
	            'tipo' => 'E',
	            'valor' => 125.00
			);
		/*
		$product2 =
			array(
	            'peso'=>0.300,
	            'altura'=> 3,
	            'largura'=> 70,
	            'comprimento'=> 50,
	            'tipo' => 'E',
	            'valor' => 20.00
			);
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
		/*
		array_push($products, $product2);
		array_push($products, $product3);
		array_push($products, $product4);
		*/
	?>
	<body style="margin-left: 20px; margin-right: 20px; margin-top: 20px;">
		<div class="row">
			<div class="col">
				<button type="button" class="btn btn-primary" id="search">Fire</button>
			</div>
		</div>


		<div class="size13 bo4 m-b-12">
			<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="city" placeholder="Cidade">
		</div>

		<div class="size13 bo4 m-b-22">
			<input id="CEP" class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="CEP" value="18608336">
		</div>
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
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script type="text/javascript">
			$("#search").on('click', function() {
				var json;

				const swal = Swal.fire({
					title: 'Calculando frete',
					html: 'Aguarde enquanto o site retorna as opções de frete',
					timerProgressBar: true,
					didOpen: () =>{
						Swal.showLoading()
						Swal.addClass("swal-dialog")
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
					var model = '<li class="shipping-parent"><button type="button" class="shipping-result"><div class="row d-flex justify-content-center"><span class="company-name">{1}</span></div><div class="row d-flex justify-content-center"><img src="images/icons/{0}.png" class="company-logo"></img></div><div class="row d-flex justify-content-center"><span class="price-tag">R$ {2}</span> </div><div class="row d-flex justify-content-center"><span class="delivery">{3} dias</span></div></button></li>';

					for(var i = 0; i < json.length; i++)
					{
						str = str.concat(model.replace("{0}", json[i].descricao.substring(10).split(" ")[0].toLowerCase()).replace("{1}", json[i].descricao.substring(10)).replace("{2}", json[i].vlrFrete.toString().replace(".", ",")).replace("{3}", (json[i].prazoEnt + 2)));
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
									$(".shipping-result").each(function () {
										$(this).removeClass("selected");
									});

									//use a class, since your ID gets mangled
									$(this).addClass("selected");      //add the class to the clicked element
								});
			 				}
						//'<div class="row"> <div> <image src="images/icons/correios.jpg" class="ship-icon"> </div> <div> <a href="#">Correios - R$ 20,00</br> 15 dias</a> </br> </div> </div>'
					});
				});

				//var json = '[ { "vlrFrete":28.59, "prazoEnt":9, "dtPrevEnt":"2022-01-19 09:31", "tarifas":[ { "valor":28.59, "descricao":"Frete Peso + Seguro" } ], "error":{ "codigo":"", "mensagem":"" }, "idSimulacao":252030920, "idTransp":9900, "cnpjTransp":"99999999000000", "idTranspResp":9900, "alertas":null, "descricao":"Kangu com Correios PAC", "servico":"E", "referencia":"kangu_E_99999999000000_252030920" }, { "vlrFrete":110.28, "prazoEnt":6, "dtPrevEnt":"2022-01-14 09:31", "tarifas":[ { "valor":110.28, "descricao":"Frete Peso + Seguro" } ], "error":{ "codigo":"", "mensagem":"" }, "idSimulacao":252031788, "idTransp":9900, "cnpjTransp":"99999999000000", "idTranspResp":9900, "alertas":null, "descricao":"Kangu com Correios Sedex", "servico":"X", "referencia":"kangu_X_99999999000000_252031788" } ]';

			});

			/*
			*/
		</script>
	</body>
</html>