let productCreator = function() {

        // webstorage
        let productsArray = getProductsKeys();
        let form = window.addEventListener("load", function() {

            form = document.getElementById("addproduct");
            let formelements = [form.name, form.description, form.price, form.quantity, form.prodid];
            for (let i = 0; i < formelements.length; i++) {
                formelements[i].addEventListener('blur', (event) => {
                    isValid(event.target);
                });
            }

            form.addEventListener("submit", formValidate);
            form.addEventListener("submit", function(event) {
                event.preventDefault()
            });
        });
        // ellenőrzi, hogy a megadott input megfelelő-e
        function isValid(input) {
            let x = input.parentElement;
            let condition;

            let errormessage;
            // ha a vizsgált elem az ár vagy mennyiség mező, akkor azt nézi, hogy szám-e, illetve üres-e (ez lesz a vizsgált feltétel)
            if (input.name === "price" || input.name === "quantity") {
                condition = (isNaN(input.value) || input.value === "");
                // ennek megfelelően állítja be a hibaüzenetet
                errormessage = "Nem megfelelő szám!";
            }
            // ha a vizsgált elem a többi mező, akkor csak azt vizsgálja, hogy üres-e (ez lesz a vizsgált feltétel)
            else {
                condition = input.value === "";
                errormessage = "Kötelező mező!";
            }
            // ha üres az érték (vagy nem szám), akkor beszúrja mögé a hibaüzenetet
            if (condition) {

                let node = document.createElement("SPAN");
                node.classList.add("error");
                let textnode = document.createTextNode(errormessage);
                // ha az elem szülőelemének utolsó gyermeke nem error, akkor beszúrja a hibaüzenetet
                if (x.lastChild.className !== "error") {
                    node.appendChild(textnode);
                    x.appendChild(node);
                }
                // és visszatér hamis értékkel
                return false;
            }
            // ha nem üres, és van hibaüzenet, akkor törli a hibaüzenetet
            else {
                if (x.lastChild.className === "error") {
                    x.lastChild.remove();

                }
                // és visszatér igaz értékkel
                return true;
            }
        }

        function formValidate() {
            // űrlap és elemei meghatározása
            let form = document.getElementById("addproduct");
            let name = form.name;
            let prodid = form.prodid;
            let price = form.price;
            let description = form.description;
            let quantity = form.quantity;
            let picid = form.picid;
            let regexDrive = /[-\w]{25,}/g;




            // hozzárendeli az elemekhez, hogy az isValid() függvény igaz, vagy hamis értékkel tért vissza
            let values = [name, prodid, price, description, quantity].map(el => isValid(el));

            // ha az összes elemet igazra értékeli
            if (values.every(Boolean)) {
                // akkor készít egy objektumot

                let pId = name.value + prodid.value;
                let Product = {
                        "name": name.value,
                        "quantity": quantity.value,
                        "price": price.value,
                        "description": description.value,
                        "prodid": pId,
                        "picid" : picid.value.match(regexDrive) === null ? "1c0-ie6crNSqFwqo-pwOgvfC2y1HIoTTp" : picid.value.match(regexDrive)[0]
                    }
                    // majd az objektumot elmenti a localStorage-ba
                localStorage.setItem(pId, JSON.stringify(Product));
                productsArray.push(pId);
                localStorage.setItem('productsArray', JSON.stringify(productsArray))
                    // végül beküldi az űrlapot, és az oldal újratöltődik
                form.submit();

            }

        }
        // localStorage-ból lekéri az elmentett elemeket
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

        return {
            getProducts: getProducts,
            getProductsKeys: getProductsKeys
        }
    }
    ();
