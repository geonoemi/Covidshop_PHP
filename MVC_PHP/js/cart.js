let cart = function () {

	//create ccart in localstorage
	if (!localStorage.getItem('CART')) {
		localStorage.setItem('CART', '{}');
	}
	let getCart = () => JSON.parse(localStorage.getItem('CART'));
	//console.log(getCart(),localStorage.getItem('CART'));
	let setCart = (C) => localStorage.setItem('CART', JSON.stringify(C));

	function addToCart(id, increaseVal) {
		console.log(increaseVal);
		let CART = getCart();
		if (!CART[id]) {
			CART[id] = increaseVal;
		} else {
			CART[id] = Number(CART[id]) + increaseVal;
		}
		setCart(CART);
		updateCart();
	}

	function removeFromCart(id, decreaseVal) {
		let CART = getCart();
		if (CART[id]) {
			CART[id] = CART[id] - decreaseVal;
			if (CART[id] < 0)
				delete CART[id];
		}
		setCart(CART);
		updateCart();
	}

	let cartWrapper = document.getElementById('cartWrapperItems');
	let checkoutButton = document.getElementById('checkout');
	let showCartButton = document.getElementById('showCart');
	let cartContainer=document.getElementById('cart');
	
	
	function createCartItem(name, price, quantity, prod) {
		let wrapper = document.createElement('div');
		wrapper.setAttribute('data-prodId', prod.prodid);
		price=Number(price);
		wrapper.innerHTML = `
		<h3 class="cart_prodname">${name}</h3>
		<input type="number" data-quantity="${quantity}" class="cart_quantity" value="${quantity}">
		<button class="cart_delete">Törlés</button>
		<span class="cart_fullprice">${price} Ft</span>
		`;

		return wrapper;

	}

	function attachListenersToItem(item, prod) {

		//quantity change CALCULATE NEW PRICE/ ONLY DECREASE / AT 0 DELETE FROM CART
		let quantityInput = document.querySelector(`div[data-prodid="${prod.prodid}"] .cart_quantity`);
		
		quantityInput.addEventListener('change', function () {
			let quVal = quantityInput.value;
			console.log(quVal);
			//parsing input (some letters enabled)
			if (isNaN(quVal) && (quVal != ' ' || quVal != '')) {
				quantityInput.style.color = 'red';
				return;
			} else {
				quantityInput.style.color = 'black';
			}

			//input quantity is lower?
			if (Number(quVal) > Number(quantityInput.getAttribute('data-quantity'))) {
				quantityInput.value = quantityInput.getAttribute('data-quantity');
				return;
			} else {
				quantityInput.setAttribute('data-quantity', quVal);
			}

			//calculate price
			document.querySelector(`div[data-prodid="${prod.prodid}"] .cart_fullprice`).value = Number(quVal) * Number(prod.price);

		});

		//delete from cart
		document.querySelector(`div[data-prodid="${prod.prodid}"] .cart_delete`).addEventListener('click', function () {
			removeFromCart(item.getAttribute('data-prodId'));
			item.remove();
		});

	}

	function updateCart() {
		let cartArr = getCart();
		//clear cart
		cartWrapper.innerHTML = '';
		//iterate cartArr ---> add items
		Object.keys(cartArr).forEach(function (k) {
			let qu=cartArr[k];
			
			if (!cartArr[k])
				return;
			
			let product = JSON.parse(localStorage.getItem(k));
			let item = createCartItem(product.name, product.price * qu, qu, product);
			cartWrapper.append(item);
			attachListenersToItem(item, product);
		});
	}

	//CHECKOUT
	checkoutButton.addEventListener('click', function () {
		cartWrapper.innerHTML = '';
		localStorage.setItem('CART','{}');
	});

	//SHOW/HIDE cartContainer
	showCartButton.addEventListener('click', function () {
		if (cartContainer.style.display == "none")
			cartContainer.style.display = 'block';
		else
			cartContainer.style.display = 'none';
	});
	//hide cart if user clicks elsewhere
	document.body.addEventListener('click',function(e){
		let itsCart=false;
		e.path.forEach(function(el){
			if (el.id=="cart" || el.id=="showCart")
				itsCart=true;
		});
		
		if (!itsCart)
			cartContainer.style.display="none";
		
	});
	
	
	return {
		updateCart: updateCart,
		addToCart: addToCart,
		removeFromCart: removeFromCart
	}
}
();

cart.updateCart();