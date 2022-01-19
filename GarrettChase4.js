
var fontsize = 16;

$(document).ready(function() {
	//functions to change font colors to red, green, and blue
		$("#redfont").click(function() {
			$("#content").css("color", "red");
		});

		$("#greenfont").click(function() {
			$("#content").css("color", "green");
		});

		$("#bluefont").click(function() {
			$("#content").css("color", "blue");
		});

		$("#decsize").click(function() {
			fontsize = fontsize - 1;
			$("#content").css("font-size", fontsize);
		});

		$("#incsize").click(function() {
			fontsize = fontsize + 1;
			$("#content").css("font-size", fontsize);
		});

		$("#submitrgb").click(function() {
			$("body").css("background-color", "rgb("+ $('#redval').val() +","+ $('#greenval').val() +","+ $('#blueval').val() +")");
		});

	});