//query string name: inpText

/*let searchProducts = function() {
        function getResults(inpText, prodArr) {
            if (inpText && inpText !== "") {
                let results = [];
                let kws = inpText.split(' ');
                prodArr.forEach(function(p) {
                    //name,description

                    kws.forEach(function(kw) {
                        if (p.name.toLowerCase().includes(kw.toLowerCase()) || p.description.toLowerCase().includes(kw.toLowerCase()))
                            results.push(p);
                    });

                });

				
                return results;     
            }

            return [];
        }

        function getProductsKeys() {
            let productsArray = JSON.parse(localStorage.getItem('productsArray'));

            if (Array.isArray(productsArray))
                return productsArray;
            else
                return [];
        }

        function getProducts() {
            return getProductsKeys().map(pKey => JSON.parse(localStorage.getItem(pKey)));
        }

        let searchText = new URLSearchParams(window.location.search).get('inpText');
        let resultProdArray = getResults(searchText, getProducts());
		
		if (resultProdArray.length)
			document.getElementById('resList').style.display="block";
		
        return {
            resultProdArray: resultProdArray
        }
    }
    ()*/