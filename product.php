<!DOCTYPE html>
<html lang="en">
<head>
	<title>Loja</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	<!-- Title Page -->
	<?php 
		$page = "tudo";
		if(isset($_GET["page"])) {
			$page = $_GET["page"];
		}
		require("header.php");
	    require('system/Connection.php');
	    require('system/functions.php');

		if($page == "male")	$sex = "Masculino";
		else if($page == "female") $sex = "Feminino";
		else if($page == "unissex") $sex = "Unissex";
		else
		{
			$sex = "Tudo";
			$page = "all";
		}

		echo
		'<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/new/' . $page . '_cover.jpg);">
			<h2 class="l-text2 t-center">
				' . $sex . '
			</h2>
			<p class="m-text13 t-center">
				Aproveite nossa nova coleção de verão
			</p>
		</section>
		';
	    
	    if($sex == "Tudo") $query = "SELECT * FROM products";
	    else $query = "SELECT * FROM products WHERE sex = 'U' OR sex = '" . substr($sex, 0, 1) . "'";

	    $totalRow = 0;
	    $results = 0;

	    if($rs = mysqli_query($conn, $query))
	    {
	    	$response['status'] = "OK";
	    	while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
	    	{
				$json = json_decode($row['storage'], true);

				foreach($json as $jsonRow)
				{
					$total = $jsonRow["UNIQUE"] + $jsonRow["P"] + $jsonRow["M"] + $jsonRow["G"] + $jsonRow["GG"];
					if($total > 0)
	    				$totalRow++;
				}

    			if(isset($_GET["filter"]))
    			{
					if($totalRow > 0 && strpos($row["tags"], $_GET["filter"]))
						$results++;
				}

				$totalRow = 0;
	    	}
    		//$results = mysqli_num_rows($rs);
	    }
	    else
	    {
	        $response['status'] = "error";
		    $response['error'] = mysqli_error($conn);
	    }
	?>

	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categorias
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="?page=all" class="s-text13 <?php if($sex == "All") echo "active1"; ?>">
									Tudo
								</a>
							</li>

							<li class="p-t-4">
								<a href="?page=female" class="s-text13 <?php if($sex == "Feminino") echo "active1"; ?>">
									Feminino
								</a>
							</li>

							<li class="p-t-4">
								<a href="?page=male" class="s-text13 <?php if($sex == "Masculino") echo "active1"; ?>">
									Masculino
								</a>
							</li>

							<li class="p-t-4">
								<a href="?page=unissex" class="s-text13 <?php if($sex == "Unissex") echo "active1"; ?>">
									Unissex
								</a>
							</li>
						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-7">
							Geral
						</h4>

						<ul class="p-b-54">

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Camisas
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Camisetas
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Calças
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Saias
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Vestidos
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Uniformes
								</a>
							</li>
						</ul>

						<h4 class="m-text14 p-b-7">
							Frio
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="#" class="s-text13 active1">
									Blusas
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Casacos
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Calças moletom
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Leggings
								</a>
							</li>
						</ul>

						<h4 class="m-text14 p-b-7">
							Casa
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="#" class="s-text13 active1">
									Cama, mesa e banho
								</a>
							</li>
						</ul>

						<h4 class="m-text14 p-b-7">
							PETs
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="#" class="s-text13">
									Vestuário
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Acessórios
								</a>
							</li>
						</ul>

						<h4 class="m-text14 p-b-7">
							Outros
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="#" class="s-text13 active1">
									Enchoval Infantil
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Meias
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Meias ortopédicas
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Perfumes
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Maquiagens
								</a>
							</li>
						</ul>
						<!--
						<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">

									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
								</div>
							</div>
						</div>
						<div class="filter-color p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-12">
								Color
							</div>

							<ul class="flex-w">
								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
									<label class="color-filter color-filter1" for="color-filter1"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
									<label class="color-filter color-filter2" for="color-filter2"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
									<label class="color-filter color-filter3" for="color-filter3"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
									<label class="color-filter color-filter4" for="color-filter4"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
									<label class="color-filter color-filter5" for="color-filter5"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
									<label class="color-filter color-filter6" for="color-filter6"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
									<label class="color-filter color-filter7" for="color-filter7"></label>
								</li>
							</ul>
						</div>
						-->
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Padrão</option>
									<option>Popular</option>
									<option>Preço crescente</option>
									<option>Preço decrescente</option>
								</select>
							</div>
						</div>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size12 p-l-23 p-r-50" type="text" name="search-product" placeholder="Pesquisar...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>

					<div class="flex-sb-m flex-w p-b-35" style="margin-top: -30px;">
						<span class="s-text8 p-t-5 p-b-5">
							Mostrando
							<?php
								if($results >  12) echo "12 peças de " . $results . " disponíveis";
								else if($results == 1) echo "a única peça disponível";
								else echo "todas as " . $results . " peças disponíveis";
							?>
						</span>
					</div>
					<!-- Product -->
					<div class="row">
						<?php
						    if($rs = mysqli_query($conn, $query))
						    {
						    	while($row = mysqli_fetch_assoc($rs))
						    	{
									$json = json_decode($row['storage'], true);
									$totalRow = 0;
									foreach($json as $jsonRow)
									{
										$total = $jsonRow["UNIQUE"] + $jsonRow["P"] + $jsonRow["M"] + $jsonRow["G"] + $jsonRow["GG"];
										if($total > 0)
						    				$totalRow++;
									}

						    		if($row['sale_price'] != "0" && $totalRow > 0)
						    		{
						    			$image = explode(";", $row["images"]);
						    			if(isset($_GET["filter"]))
						    			{
						    				if(strpos($row["tags"], $_GET['filter']))
						    					echo_promo($image[0], $row["catalog"], $row["name"], $row["price"], $row["sale_price"]);
						    			}
						    			else
						    			{
					    					echo_promo($image[0], $row["catalog"], $row["name"], $row["price"], $row["sale_price"]);
						    			}
									}
									else if($totalRow > 0)
									{
						    			$image = explode(";", $row["images"]);
						    			if(isset($_GET["filter"]))
						    			{
						    				if(strpos($row["tags"], $_GET['filter']))
				    							echo_no_promo($image[0], $row["catalog"], $row["name"], $row["price"]);
						    			}
						    			else
						    			{
				    						echo_no_promo($image[0], $row["catalog"], $row["name"], $row["price"]);
						    			}
									}

									$totalRow = 0;
						    	}
						    }
						    else
						    {
						        $response['status'] = "error";
							    $response['error'] = mysqli_error($conn);
						    }
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
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
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				//swal(nameProduct, "foi adicionado ao carrinho !", "success");
				swal(nameProduct, "O site está funcionando apenas como exposição, ainda não é possível realizar compras.", "error");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				//swal(nameProduct, "foi adicionado à lista de desejos !", "success");
				swal(nameProduct, "O site está funcionando apenas como exposição, ainda não é possível realizar compras.", "error");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
