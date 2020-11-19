# Covidshop_PHP
TODO:
1. listing.js helyett php fájlt írni, mert a Model fogja lekérdezni az adatbázisból a dolgokat egy függvénnyel
2. searchProducts.js maradhat érintetlenül, de az még a localstorage-ból keres, ezért a getProductKeys() és a getProducts() függvényeket át kellene írni, majd a php egy controller segítségével fogja ezt is kiszolgálni - Máté meggyógyította
3. még mindig a searchProduct fájlban a localstorageból való lekérdezés helyett fetch/ajax hívással controlleren keresztül( pontosabban a products.php-n keresztül) lekéri az adatokat a DB-ből  - Máté meggyógyította
4. addProducts.hmtl-benvan egy form, aminek az action-je egy Controllerre kéne, hogy mutasson
5. cart.js maradhat, mert a localstorage-ba tároljuk a kosár tartalmát, viszont a checkput-ba bele kell nyúlni, hogy menjen egy ajax/fetch kérés egy controllernek, ami a checkoutot nézi és az alapján csökkenti az adatbázisban a termékek mennyiségét.
