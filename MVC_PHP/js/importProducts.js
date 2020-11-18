//restore products for testing
let importProducts = function () {
	let content = {
		"productsArray": "[\"Covid teszt123456\",\"Lélegeztetőgép4567123\",\"Gumikesztyű987678\",\"Maszk547382\",\"Kézfertőtlenítő3342546\",\"Liszt9284799\",\"Élesztő1998234\",\"Wc papír4447774\"]",
		"CART": "{}",
		"Liszt9284799": "{\"name\":\"Liszt\",\"quantity\":\"1234\",\"price\":\"169\",\"description\":\"Glutén tartalmzú búzafinomliszt\",\"prodid\":\"Liszt9284799\",\"picid\":\"11_1XOrQ3rL-aATuJsHGLmByC_rs7K-A6\"}",
		"Maszk547382": "{\"name\":\"Maszk\",\"quantity\":\"5000\",\"price\":\"500\",\"description\":\"Eldobható arcmaszk\",\"prodid\":\"Maszk547382\",\"picid\":\"1DY45y--Ohg0yU4JjHGJvVxhNcU-VIzCR\"}",
		"Wc papír4447774": "{\"name\":\"Wc papír\",\"quantity\":\"987\",\"price\":\"120\",\"description\":\"Popsibarát wc papír\",\"prodid\":\"Wc papír4447774\",\"picid\":\"1HKceNwaGV0IlX6o9jgyGt3TQTk6N7UCO\"}",
		"Élesztő1998234": "{\"name\":\"Élesztő\",\"quantity\":\"5467\",\"price\":\"50\",\"description\":\"wannaCookBread ? buyYeast : leaveItOnTheShelfForTeOthers\",\"prodid\":\"Élesztő1998234\",\"picid\":\"1tXDcDKePqu0iHPsKj7SaOphY9jHMDhn7\"}",
		"Kézfertőtlenítő3342546": "{\"name\":\"Kézfertőtlenítő\",\"quantity\":\"497\",\"price\":\"1000\",\"description\":\"Baktérium- és vírusölő kézfertőtlenítő\",\"prodid\":\"Kézfertőtlenítő3342546\",\"picid\":\"1c0-ie6crNSqFwqo-pwOgvfC2y1HIoTTp\"}",
		"Gumikesztyű987678": "{\"name\":\"Gumikesztyű\",\"quantity\":\"1200001\",\"price\":\"300\",\"description\":\"Vírusmentes gumikesztyű\",\"prodid\":\"Gumikesztyű987678\",\"picid\":\"1BNHuDjrK_hLmAJplRR7YDpdh1yfW-CmL\"}",
		"Covid teszt123456": "{\"name\":\"Covid teszt\",\"quantity\":\"1000\",\"price\":\"12000\",\"description\":\"Tutira negatív covid teszt\",\"prodid\":\"Covid teszt123456\",\"picid\":\"1-VdE1LVgFL9hh2i2mKJInke6qBCO4Mqo\"}",
		"Lélegeztetőgép4567123": "{\"name\":\"Lélegeztetőgép\",\"quantity\":\"1\",\"price\":\"1200000\",\"description\":\"stay at home lélegeztetőgép\",\"prodid\":\"Lélegeztetőgép4567123\",\"picid\":\"1sU71LaF_uveO5KSMLp71YJnfFXSmaaxO\"}"
	};

	function restore(items) {
		Object.keys(items).forEach(function (k) {
			localStorage.setItem(k, items[k]);
		})
	}

	document.getElementById('restore').addEventListener('click', function () {
		//clear current state
		localStorage.clear();
		//restore
		restore(content);
	});

}
();
