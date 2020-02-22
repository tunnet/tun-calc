
jQuery(document).ready(function(){
	let 	weekly 			= jQuery("#weekly"),
			year 			= jQuery("#annual"),
			profit 			= jQuery("#profit"),
			giftPrice 		= jQuery("#giftprice"),
			gift 			= parseInt(jQuery("#gift").text()),
			purchase 		= parseInt(jQuery("#purchase").text()),
			percentVal 		= jQuery("input[name='percent_status']:checked").val(),
			input 			= jQuery("#tuncalc");
	window.inputVal 		= jQuery("#tuncalc").val();
	window.tunCustomItems 	= [];

	let 	weeklyVal,
			yearVal,
			profitVal,
			giftResult,
			numsert;


	jQuery('#percent').change(function(){
        percentVal = jQuery("input[name='percent_status']:checked").val();
        calc();
    });
	jQuery("#tuncalc").on('input', function () {
	  	inputVal = this.value;	
		tunCustomItems.forEach(function(item, i, arr) {
		  jQuery(item).text(numberWithSpaces(inputVal));
		});
	  calc();
	});

	

	function calc() {


		weeklyVal = Math.round((percentVal / 100) * inputVal);
		yearVal = Math.round(weeklyVal * 52);
		profitVal = Math.round(yearVal - inputVal);

		giftshow();
		changeText();

	}


	function changeText() {
		weekly.text(numberWithSpaces(weeklyVal));
		giftPrice.text(numberWithSpaces(numsert));
		year.text(numberWithSpaces(yearVal));
		profit.text(numberWithSpaces(profitVal));
	}

	function giftshow() {
		if(inputVal >= purchase){
			if (inputVal >= 5000  && inputVal < 9000) {
				numsert = 1 * gift;
			}
			else if(inputVal >= 9000  && inputVal < 15000){
				numsert = 2 * gift;
			}
			else if(inputVal >= 15000  && inputVal < 25000){
				numsert = 4 * gift;
			}
			else if(inputVal >= 25000  && inputVal < 50000){
				numsert = 6 * gift;
			}
			else if(inputVal >= 50000  && inputVal < 100000){
				numsert = 13 * gift;
			}
			else if(inputVal >= 100000  && inputVal < 200000){
				numsert = 27 * gift;
			}
			else if(inputVal >= 200000){
				numsert = 55 * gift;
			}
			jQuery( "#gift_row, #gift_addition" ).fadeIn();
		}
		else{
			jQuery( "#gift_row, #gift_addition" ).fadeOut();
		}
	}

	calc();



});


function showSum() {
	for (let arg of arguments){
		jQuery(arg).text(numberWithSpaces(inputVal));
		tunCustomItems.push(arg);
	};
}
function numberWithSpaces(x) {
	  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}