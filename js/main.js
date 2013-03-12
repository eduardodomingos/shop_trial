var usd_currency = 1.30;
var brl_currency = 2.56;

$(document).ready(function(){
	$('.flexslider').flexslider({animation: "slide",slideshowSpeed: 5000});
	check_currency();
	$('#currency').change(function() {
		var selected_currency = $(this).find(":selected").text();
		//set a cookie storing the new currency
		$.cookie('currency', selected_currency,{ expires: 7, path: '/' });
		updatePage(selected_currency);
	});//end change
	manage_nav_active_button();
});//end ready

function manage_nav_active_button(){
	var url = window.location;
	$('ul.nav a').filter(function() {
	    return this.href == url;
	}).parent().addClass('active');
}

function convert_from_euro(euro_price,currency){
	return $.number(euro_price*currency,2);
}

function check_currency(){
	switch($.cookie('currency'))
	{
	case 'USD':
	  $("select#currency").prop('selectedIndex', 2);//update selected element
	  updatePage('USD');
	  break;
	case 'BRL':
	  $("select#currency").prop('selectedIndex', 1);//update selected element
	   updatePage('BRL');
	  break;
	default:
	  $("select#currency").prop('selectedIndex', 0);//update selected element
	   updatePage('EUR');
	}
}

function updatePage(selected_currency){
	$( 'span.price' ).each(function (i) {
			var euro_price = $.number($(this).attr("data-price"),2);
			if(selected_currency=='EUR'){
				$(this).text(euro_price+' €');
			}
			else if(selected_currency=='BRL'){
				$(this).text('R$ '+convert_from_euro(euro_price,brl_currency));
			}
			else if(selected_currency=='USD'){
				$(this).text('$ '+convert_from_euro(euro_price,usd_currency));
			}
	});//end each
}