let littleCart = document.getElementById("header-container");
let products = [];

class Product {
    constructor(name, price, storage, catalog, mainImage, quantity) {
        this.name = name;
        this.price = price;
        this.storage = storage;
        this.catalog = catalog;
        this.mainImage = mainImage;
        this.quantity = quantity;
    }
}

function rebuildCart() {
    let lastChild = littleCart.lastChild;

    while(lastChild) {
        littleCart.removeChild(lastChild);
        lastChild = littleCart.lastChild;
    }

    products.forEach(product => {
        littleCart.innerHTML += 
							'<li class="header-cart-item">' +
								'<div class="header-cart-item-img">' +
									'<img src="images/models/' + product.mainImage + '" alt="IMG">' +
								'</div>' +
								'<div class="header-cart-item-txt">' +
									'<a href="product-detail.php?catalog=' + product.catalog + '" class="header-cart-item-name">' +
										product.name +
									'</a>' +
									'<span class="header-cart-item-info">' +
										product.quantity + ' x R$' + product.price +
									'</span>' +
								'</div>' +
							'</li>';
        console.log(product.catalog);
        document.getElementById("cartItemsCount").innerText = products.length;
    });
}