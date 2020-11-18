let listing = function () {

	//termékek tömb Mátétól
	let productsArray = [];
		
	if (typeof searchProducts != 'undefined') {
		productsArray = searchProducts.resultProdArray;
	} else {
	//lekérjük localStorage-ból a termékek tömböt
		productsArray = JSON.parse(localStorage.getItem('productsArray')).map(function (prodKey) {
				return JSON.parse(localStorage.getItem(prodKey));
			});
	}
	
	let i = 0;

	//termékek hozzáadása a székesegyházhoz
	productsArray.forEach(function (prod) {
		
		//ha nincs a termékből, átlépjük
		if (prod.quantity==0) return;
		
		let ul = $('#products');
		let li = $('<li></li>');
		let span = $('<span></span>');
		let div = $('<div></div>');
		let input = $('<input></input>');
		let button = $('<button></button>');
		div.attr("id", i);

		//termékek listázása <ul><li><span>productArray[i]</span></li></ul>
		$(span).text(prod.name);
		//console.log("product element " + i + ": " + span.text());
		$(div).append(span);
		$(li).append(div);
		$(ul).append(li);

		//kép hozzáadása <div id=i><img id=i src="" alt="placeholderPic"></div>
		//src-nek átadjuk a termék ID-jéhez tartozó kép drive linkjét
		let img = $('<img src="https://drive.google.com/uc?id='+prod.picid+'" alt="https://drive.google.com/uc?id=1c0-ie6crNSqFwqo-pwOgvfC2y1HIoTTp">');
		img.attr("id", i);
		$(div).append(img);

		//input a termékeknél,number típusú léptetővel
		input.attr("id", i);
		input.attr("type", "number");
		input.attr("name", "quantity");
		input.attr("min", "1");
		input.attr("max", prod.quantity); //annyi a max, ahány db van raktáron
		$(div).append(input);

		//kosárba gomb, amivel el lehet menteni egy tömbbe a kosárba tett termékeket
		button.attr = ("id", i);
		$(button).text("Kosárba");
		$(div).append(button);
		$(button).attr('data-prodid',prod.prodid);

		//kosár gombra kattintáshoz eseményfigyelő
		$(button).click(function () {
			let quantity = $(input).val();
			let productActual=JSON.parse(localStorage.getItem($(button).attr('data-prodid')));

			//ha nincs elég raktáron -> inaktív kosárba gomb
			if (Number(quantity) > productActual.quantity) {
				button.disabled;
				alert("Sajna ennyi nincs belőle :( \nA raktárkészlet jelenleg: "+productActual.quantity+"DB");
			
			//ha van elég raktáron, kosárba tesszük, input értékét töröljük
			} else {
				button.disabled = false;
								
				cart.addToCart(productActual.prodid, Number(input.val()));
				
				productActual.quantity=Number(productActual.quantity)-Number(input.val());
				
				localStorage.setItem(productActual.prodid,JSON.stringify(productActual));

				$(input).val(' ');
			}

		});

		i++;
	});

	if (productsArray.length == 0) {
		let ul = $('#products');
		let li = $('<li></li>');
		let node = document.createElement("SPAN");

		node.classList.add("error");
		let inpTextExists=new URLSearchParams(window.location.search).get('inpText');
		if (typeof searchProducts != 'undefined'  && inpTextExists){
			errormessage = "Nem található keresésnek megfelelő termék az adatbázisunkban!";
			let textnode = document.createTextNode(errormessage);
			node.appendChild(textnode);

			li.append(node);
			ul.append(li);
			
		}


	}

	return {}

}
();
