"use strict";
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function () {
	// console.log(animating);
	// if(animating) return false;
	// animating = true;

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	$('.error').text('');
	$('.error').removeClass('alert-danger');

	if (current_fs.hasClass('first-step')) {
		var item_option = $("input[name='option']:checked").val();

		var item_menu = $("input[name='item_menu']:checked").val();
		var qty = $(".stepper-value").text();
		if (!item_option) {
			$('.error').text('Plesae select an item');
			$('.error').addClass('alert-danger');
			$(window).scrollTop(0);
			return false;
		} else {

			if (!item_menu) {
				$('.error').text('Plesae select an item Menu');
				$('.error').addClass('alert-danger');
				$(window).scrollTop(0);
				return false;
			} else {
				if (qty == 0) {
					$('.error').text('Plesae add quantity');
					$('.error').addClass('alert-danger');
					$(window).scrollTop(0);
					return false;
				}
			}
		}
	}

	if (current_fs.hasClass('second-step')) {
		var listing = $('.items-listing').length;
		if (listing == 0) {
			$('.error').text('Sorry you cannot proceed because no item in listing');
			$('.error').addClass('alert-danger');
			$(window).scrollTop(0);
			return false;
		}
	}
	if (current_fs.hasClass('third-step')) {
		var helper = $("input[name='helper']:checked").val();
		var pickup = $("input[name='pickup']:checked").val();
		if (!helper) {
			$('.error').text('Plesae select any helper');
			$('.error').addClass('alert-danger');
			$(window).scrollTop(0);
			return false;
		}
		if (!pickup) {
			$('.error').text('Plesae select any pickup vehicle');
			$('.error').addClass('alert-danger');
			$(window).scrollTop(0);
			return false;
		}
	}
	if (current_fs.hasClass('fourth-step')) {
		var start = $("#start-time-input").val();
		var date = $("#datepicker").val();
		var timeline = $("#timelines").val();
		var first_name = $("#f_name").val();
		var last_name = $("#l_name").val();
		var email = $("#email").val();
		var phone = $("#phone").val();
		var address = $("#address").val();
		if (!date) {
			$('.error').text('Plesae select date');
			$('.error').addClass('alert-danger');
			$(window).scrollTop(0);
			return false;
		}
		if (!timeline) {
			$('.error').text('Plesae select time');
			$('.error').addClass('alert-danger');
			$(window).scrollTop(0);
			return false;
		}
		if (!first_name) {
			$('.error').text('Plesae add first name');
			$('.error').addClass('alert-danger');
			$(window).scrollTop(0);
			return false;
		}
		if (!last_name) {
			$('.error').text('Plesae add last name');
			$('.error').addClass('alert-danger');
			$(window).scrollTop(0);
			return false;
		}
		if (!email) {
			$('.error').text('Plesae enter email');
			$('.error').addClass('alert-danger');
			$(window).scrollTop(0);
			return false;
		}
		if (!phone) {
			$('.error').text('Plesae enter phone');
			$('.error').addClass('alert-danger');
			$(window).scrollTop(0);
			return false;
		}
		if (!address) {
			$('.error').text('Plesae enter address');
			$('.error').addClass('alert-danger');
			$(window).scrollTop(0);
			return false;
		}
		$('.price-estimate').text('$'+$('.total_amount').val());
	}
	if (current_fs.hasClass('fifth-step')) {
		alert('your request submit successfully admin respond you soon');
		location.reload();
	}
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	//show the next fieldset
	next_fs.show();
	//hide the current fieldset with style
	current_fs.animate({ opacity: 0 }, {
		step: function (now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50) + "%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({ 'transform': 'scale(' + scale + ')' });
			next_fs.css({ 'left': left, 'opacity': opacity });
		},
		duration: 500,
		complete: function () {
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeOutQuint'
	});
});

$(".previous").click(function () {
	if (animating) return false;
	animating = true;

	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();

	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

	//show the previous fieldset
	previous_fs.show();
	//hide the current fieldset with style
	current_fs.animate({ opacity: 0 }, {
		step: function (now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1 - now) * 50) + "%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({ 'left': left });
			previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
		},
		duration: 500,
		complete: function () {
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeOutQuint'
	});
});

$(".submit").click(function () {
	return false;
})

$(document).ready(function () {
	$('select').material_select();
});

var counter = 0;
var orderCounter = 1;
function newKeyword() {

	$(".keywords").append('<div class=\"row rowKey animated zoomIn2\">\r\n        <div class=\"input-field col s6\" style=\"\r\n    width: 42%;\r\n\">\r\n          \r\n          <input id=\"icon_prefix1' + counter + '\" type=\"text\" class=\"validate\">\r\n          <label for=\"icon_prefix1' + counter + '\" class=\"\">Keyword<\/label>\r\n        <\/div>\r\n   <div class=\"row\">\r\n    <!--<div style=\"    top: 0.8rem;\" class=\"col s2\"> Density :<\/div> -->\r\n     <div class=\"input-field col s2\" style=\"    top: 0.7rem;\"> Density<\/div>\r\n        <div class=\"input-field col s2\">\r\n          <input id=\"icon_telephone1' + counter + '\" type=\"number\" class=\"validate\">\r\n          <label for=\"icon_telephone1' + counter + '\" class=\"\">Min<\/label>\r\n        <\/div>\r\n        <div class=\"input-field col s2\">\r\n          <input id=\"max1' + counter + '\" type=\"number\" class=\"validate\">\r\n          <label for=\"max1' + counter + '\" class=\"\">Max<\/label>\r\n        <\/div>\r\n    <i class=\"material-icons prefix remove active\" style=\"\r\n    margin-top: 1.7rem; cursor: pointer;color: #607D8B;\r\n\">close<\/i><\/div>\r\n       <\/div>');
	counter++;
};

$(".promo-example").hover(
	function () {
		$(this).addClass("hovered");
	},
	function () {
		$(this).removeClass("hovered");
	}
);



$(".promo-example").click(
	function () {
		$(".promo-example").removeClass("selected")
		$(this).addClass("selected");
	}
);

$(".promo-example2").hover(
	function () {
		$(this).addClass("hovered");
	},
	function () {
		$(this).removeClass("hovered");
	}
);



$(".promo-example2").click(
	function () {
		$(".promo-example").removeClass("selected")
		$(this).addClass("selected");
	}
);

$(".keywords").delegate(".remove", "click", function () {
	$(this).closest('.rowKey').remove();
}
);


function newOrder() {
	var orderNumber = $(".card").length;
	//var orderNumber = $(".card").index(this);
	$(".creation").prepend('<div class=\"card animated zoomIn\">\r\n\t\t<h2 class=\"fs-title\" style=\"    padding-top: 25px;\r\n    padding-left: 25px;\r\n    text-align: left;\r\n    width: 100%;\">Product description n\u00B0' + orderNumber + '<\/h2>\r\n<div class=\"row\">\r\n      <div class=\"input-field col s12\">\r\n          <input  id=\"first_name' + orderNumber + '\" type=\"text\" class=\"validate\">\r\n          <label for=\"first_name' + orderNumber + '\">Order name<\/label> \r\n        <\/div> \r\n  <div class=\"row col s12\" style=\"color:grey;font-size: 10px;text-align: left;margin-top: -10px;margin-left: 0px\">Name your order, you can also use a reference Id from your system to find it easily <\/div>\r\n      <\/div>\r\n    <div class=\"row\">\r\n      <div class=\"input-field col s12\">\r\n          <input  id=\"first_name2' + orderNumber + '\" type=\"text\" class=\"validate\">\r\n          <label for=\"first_name2' + orderNumber + '\">URL (optional)<\/label> \r\n        <\/div> \r\n     \r\n      <div class=\"row col s12\" style=\"color:grey;font-size: 10px;text-align: left;margin-top: -10px;margin-left: 0px\">You can add an url to give more informations to the writer<\/div> <\/div> \r\n      \r\n       <div class=\"row\">\r\n      <div class=\"input-field col s12\">\r\n          <input  id=\"first_name2' + orderNumber + '\" type=\"text\" class=\"validate\">\r\n          <label for=\"first_name2' + orderNumber + '\">Reference id (optional)<\/label> \r\n        <\/div> \r\n     \r\n      <div class=\"row col s12\" style=\"color:grey;font-size: 10px;text-align: left;margin-top: -10px;margin-left: 0px\">You can add a reference id to match the order with your system<\/div> <\/div>  \r\n  <div class=\"keywords\">    \r\n<!-- <div class=\"row\">\r\n        <div class=\"input-field col s6\">\r\n          <i class=\"material-icons prefix\">label<\/i>\r\n          <input id=\"icon_prefix' + orderNumber + '\" type=\"text\" class=\"validate\">\r\n          <label for=\"icon_prefix' + orderNumber + '\">Keyword<\/label>\r\n        <\/div>\r\n   <div class=\"row\">\r\n    <div style=\"margin-top:2rem\" class=\"col s2\"> Density<\/div> \r\n     <div class=\"input-field col s2\"> Density<\/div>\r\n        <div class=\"input-field col s2\">\r\n          <input id=\"icon_telephone' + orderNumber + '\" type=\"number\" class=\"validate\">\r\n          <label for=\"icon_telephone' + orderNumber + '\">Min<\/label>\r\n        <\/div>\r\n        <div class=\"input-field col s2\">\r\n          <input id=\"max' + orderNumber + '\" type=\"number\" class=\"validate\">\r\n          <label for=\"max' + orderNumber + '\">Max<\/label>\r\n        <\/div>\r\n    <\/div>\r\n       <\/div>-->\r\n    \r\n\r\n    <\/div>\r\n          <div><a class=\"waves-effect waves-light btn\" onClick=\"newKeyword()\"><i class=\"material-icons left\">add<\/i>Add a Keyword<\/a><\/div> \r\n      <\/div>\r\n    <\/div>');
	orderCounter++;
	counter++;
};

$("fieldset").delegate(".removeOrder", "click", function () {
	$(this).closest('.card').remove();
}
);

$('.page-item-details').on('click', function () {
	var target = $(this).attr('rel');
    var target_value	= $(this).find('input.main-item').val();
	target_value = target_value.trim();
    var target_price =	$('.'+target_value+'-price').val();
	// $("#"+target).show().siblings("div").hide();
	$("#" + target).show();
	$("#" + target).parent().parent().siblings("div").hide();
});

$(document).on('change', '.selected_model', function () {
	$('.count-wrapper').show();
});

$(document).on('click', '.minus-icon', function () {
	var current_counter_val = 0;
	var counter_value = $('.stepper-value').text();
	if (counter_value > 0) {
		current_counter_val = parseInt(counter_value) - 1;
	}
	$('.stepper-value').text(current_counter_val);
	var prev = $('.total_amount').val();
	var newPrice = parseInt(prev) - parseInt(price);
	$('.total_amount').val(newPrice)
	console.log(current_counter_val);
});

$(document).on('click', '.plus-icon', function () {
	var current_counter_val = 0;
	var counter_value = $('.stepper-value').text();
	current_counter_val = parseInt(counter_value) + 1;
	$('.stepper-value').text(current_counter_val);
	var price = current_counter_val * 30;
	var prev = $('.total_amount').val();
	var newPrice = parseInt(prev) +  parseInt(price);
	$('.total_amount').val(newPrice);
});
var index = 0;


$(document).on('click', '.helper-container', function () {
	$(this).find('input.main-option').attr('checked', true);
	//   console.log($(this).find('input.main-option'));
})

$(document).on('click', '.item-delete', function () {
	$(this).parent().parent().remove();
	var div_length = $('.items-listing').length;
	$('.total-items').text(div_length);
})



$(document).on('click', '.helper-block', function () {
	$(this).find('div.helper-container').addClass('active-block');
	$(this).siblings("div.helper-block").remove();
	$(this).find('main-option').attr('checked', true);
	var helper = $("input[name='helper']:checked").val();
	var pickup = $("input[name='pickup']:checked").val();
	$('.helper-vehicle-option').text(helper + ' ,' + pickup);
})
$(document).on('click', '.pick-block', function () {
	$(this).find('div.helper-container').addClass('active-block');
	$(this).siblings("div.pick-block").remove();
	$(this).find('main-option').attr('checked', true);
	var helper = $("input[name='helper']:checked").val();
	var pickup = $("input[name='pickup']:checked").val();
	$('.helper-vehicle-option').text(helper + ' ,' + pickup);

})
var currentTime = new Date() 
var maxDate =  new Date(currentTime.getFullYear(), currentTime.getMonth() +1, +0); // one day before next month
$('#datepicker').datepicker({
	// defaultDate: "+1w",
    // changeMonth: true,
	// numberOfMonths: 1,
	minDate: 0,
	maxDate:maxDate

	// inline: true,
	// firstDay: 1,
	// "setDate": "12/10/22",
	// showOtherMonths: true,
	// dayNamesMin: ['S', 'M', 'T', 'W', 'T', 'F', 'S']
});

$(document).on('click', '.item-edit', function () {
	current_fs = $(this).parent().parent().parent().parent().parent().parent();
	previous_fs = $(this).parent().parent().parent().parent().parent().parent().prev();
	console.log(current_fs);
	console.log(previous_fs);
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	previous_fs.show();
	//hide the current fieldset with style
	current_fs.animate({ opacity: 0 }, {
		step: function (now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1 - now) * 50) + "%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({ 'left': left });
			previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
		},
		duration: 500,
		complete: function () {
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeOutQuint'
	});
	var list_name = $(this).attr('data-list');
	var sublist = $(this).attr('data-sublist');
	var qty = $(this).attr('data-qty');
	var index = $(this).attr('data-index');
	var list_name = list_name.trim();
	console.log(list_name);
	//   console.log(list_name);
	$('#' + list_name + '-list').show();
	$('#' + list_name + '-list').find('div.model').show();
	console.log($("input[value=" + sublist + "]"));
	$("input[value=" + sublist + "]").prop("checked", true);
	$("input[value=" + list_name + "]").prop("checked", true);
	$('.stepper-value').text(qty);
	$('#' + list_name + '-list').siblings("div").hide();
	$('#list-' + index).remove();
});
$(document).on('click', '.add-another-item', function () {
	current_fs = $(this).parent().parent();
	previous_fs = $(this).parent().parent().prev();
	console.log(previous_fs);
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	previous_fs.show();
	//hide the current fieldset with style
	current_fs.animate({ opacity: 0 }, {
		step: function (now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1 - now) * 50) + "%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({ 'left': left });
			previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
		},
		duration: 500,
		complete: function () {
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeOutQuint'
	});
	$('.page-item-details').show();
	$('.count-wrapper').hide();
	$('.model').hide();
	$('.selected_model').attr('checked', false);
	// $('.main-item').attr('checked', false);
});


