
var data;
var img;
var name;
var i = 1;

$(document).ready(function() {
	setPokemonInfo();

	$("#prev").click(function() {
		if(i > 1) {
			i--;
			setPokemonInfo();
		}
		else if(i == 1) {
			i = 898;
		}
	});

	$("#next").click(function() {
		if(i < 898) {
			i++;
			setPokemonInfo();
		}
		else if(i == 898) {
			i = 1;
		}
	});
});

function setPokemonInfo() {
	data = $.getJSON(`https://pokeapi.co/api/v2/pokemon/${i}/`, function(result) {
		img = result.pokemon[i].img;
		$("#pokemonImage").attr("src", img);

		name = result.pokemon[i].name;
		$("#pokemonName").text(name);

		$("#pokemonBody").text("Number: " + result.pokemon[i].num + 
			", Height: " + result.pokemon[i].height + 
			", Weight: " + result.pokemon[i].weight + 
			", Spawn Chance: " + result.pokemon[i].spawn_chance);

		$("#pokemonType").text("Type: " + result.pokemon[i].type + 
			" Weaknesses: " + result.pokemon[i].weaknesses);
	});
}