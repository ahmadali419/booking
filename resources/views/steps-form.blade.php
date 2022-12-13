<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/8.2.1/nouislider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/image-picker/0.2.4/image-picker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css"> --}}
        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
        type="text/css" />
    </head>

<body>



    <div id="modal2" class="modal">
        <div class="modal-content">
            <h4>There might be a better way!</h4>
            <p>If you plan on ordering more than 10 texts, it will be faster to upload them with one of our standard
                files</p>

        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Got it</a>
        </div>
    </div>
    <!-- multistep form -->
    <form id="msform">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <!-- fieldsets -->
        <div class="row">
            <div class="col-12">
                <p class="text-danger alert  error"></p>
            </div>
        </div>
        <input type="hidden" name="total_amount" class="total_amount" value="0">
        <fieldset class="first-step">
            <h2 class="fs-title"><b>Add an Item</b></h2>
            <h3 class="fs-subtitle"><a href="#" style="text-decoration:underline!important;color:black">See Item Size
                    Guide</a></h3>

            <div class="form-group " style="position: relative;">
                <div role="combobox" aria-haspopup="listbox" aria-owns="react-autowhatever-1" aria-expanded="false"
                    class="react-autosuggest__container input-box"><input type="text" autocomplete="off"
                        aria-autocomplete="list" aria-controls="react-autowhatever-1" class="form-control item-text"
                        placeholder="Enter an item" name="item" value="">
                    <div id="react-autowhatever-1" role="listbox" class="react-autosuggest__suggestions-container">
                    </div>
                </div>
            </div>
            <div>
                <hr class="hr-text" data-content="or">
                <p class="" style="text-align: center!important;">Select a popular item from this list:</p>
                @forelse ($lists as $list)
                @php  $index = $loop->iteration; @endphp
                <div class="popular-items-wrapper page-item-details" id="{{ $list->name }}-list" rel="model_{{ $loop->iteration }}">
                    <div class="helper-container-wrap list_block">
                        <div class="helper-container disabled clickable" style="pointer-events: auto;">
                            <div class="helper-top-content">
                                <div class="helper-icon-container"><img class="helper-icon"
                                        src="{{ !empty($list->image) ? asset($list->image) : 'https://s3-us-west-2.amazonaws.com/dolly-images/icon_popular_items_chair.png' }}">
                                </div>
                                <div class="helper-title-container labl">
                                    <div class="helper-title">{{ $list->name }}</div>
                                    <input type="radio" name="option" value="{{ $list->name ?? '' }}" class="main-option main-item" />
                                    <input type="hidden" name="price" value="30" class="Chair-price"> 
                                </div>
                            </div>
                        </div>
                        <div class="helper-buttons"></div>
                        <div class="model" style="display:none" data-title="{{ $item->name ?? '' }}" id="model_{{ $index }}" style="display: none;">
                            @if(!empty($list->itemMenus))
                            @foreach ($list->itemMenus as $menu)
                            <div data-key="[object Object]-Dining">
                                <div class="form-group radio no-margin selected_model "><input name="item_menu"
                                        input="[object Object]" meta="[object Object]" label="{{ $menu->name }}" id="{{ $menu->name }}"
                                        for="{{ $menu->name }}" class="no-margin selected_model item-suboption" type="radio"
                                        value="{{ $menu->name }}" data-gtm-form-interact-field-id="0"><label
                                        for="{{ $menu->name ??'' }}">{{ $menu->name ?? '' }}</label>
                                        <div style="float:right">
                                            <b>{{ '$'.$menu->price ?? '' }}</b>
                                        </div>
                                
                                    </div>
                            </div>
                            
                            @endforeach
                            @endif
                            {{-- <div data-key="[object Object]-Office">
                                <div class="form-group radio no-margin selected_model "><input name="item_menu"
                                        input="[object Object]" meta="[object Object]" label="Office" id="Office"
                                        for="Office" class="no-margin selected_model item-suboption" type="radio"
                                        value="office"><label for="Office">Office</label></div>
                            </div>
                            <div data-key="[object Object]-Folding">
                                <div class="form-group radio no-margin selected_model "><input name="item_menu"
                                        input="[object Object]" meta="[object Object]" label="Folding" id="Folding"
                                        for="Folding" class="no-margin selected_model item-suboption" type="radio"
                                        value="folding"><label for="Folding">Folding</label></div>
                            </div>
                            <div data-key="[object Object]-Arm">
                                <div class="form-group radio no-margin selected_model "><input name="item_menu"
                                        input="[object Object]" meta="[object Object]" label="Arm" id="Arm" for="Arm"
                                        class="no-margin selected_model item-suboption" type="radio" value="arm"><label
                                        for="Arm">Arm</label></div>
                            </div> --}}
                        </div>


                    </div>
                </div>
                    
                @empty
                    <p class="text-danger">Sorry no item found</p>
                @endforelse
               
            </div>
            <div class="row count-wrapper" style="display: none;">
                <div class="col-12" style="background: white">

                    <div class="input-container stepper-container ">
                        <div class="stepper-label input-section">How Many?</div>
                        <div class="stepper-buttons-container">
                            <div class="stepper-button clickable disabled minus-icon" style="cursor: pointer;">–</div>
                            <div class="stepper-value">0</div>
                            <div class="stepper-button clickable plus-icon" style="cursor:pointer">+</div>
                        </div>
                    </div>
                </div>
            </div>

            <!--<select class="image-picker">
    <option data-img-src="https://cdn4.iconfinder.com/data/icons/flat-education-icons/500/translate2-128.png" value="1">  Page 1  </option>
    <option data-img-src="https://cdn1.iconfinder.com/data/icons/modern-it-services-flat-icons/113/letter_business_letter_contract_agreement_treaty_pact_write-512.png" value="2">  Page 2  </option>
      </select>-->


            <input type="button" name="next" class="next action-button add-item" value="Add Item" />
        </fieldset>
        <fieldset class="second-step">
            <h2 class="fs-title" style="font-weight:bold">Add Items to Your Dolly
                <p class="help-link"><span></span></p>
            </h2>
            <h3 class="fs-subtitle"><a href="#" style="text-decoration:underline!important;color:black!important">See
                    Item Size Guide</a></h3>


            <div class="page-item-list page">
                <div class="wrapper">
                    <div class="item-entry item-total">
                        <div class="item-count total-items">9</div>
                        <div class="item-title item-total">
                            <div>Total Items</div>
                        </div>
                        <div class="item-buttons item-total"></div>
                    </div>
                    <div class="items-list">

                    </div>





                </div>
                <!-- <input type="button" name="previous" class=" previous action-button" value="Previous" /> -->

                <a class="btn optional  add-another-item" type="button">Add Another Item</a>
            </div>

            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>

        {{-- <fieldset class="third-step">
            <h2 class="fs-title" style="font-weight: bold;">How many Helpers would you like?</h2>

            <div class="page-helper-count page helper-count">
                <div class="heading-help">
                    <p class="help-link"><span></span></p>
                </div>
                <div class="helper-container-wrap list_block helper-block">
                    <div class="helper-container disabled clickable" style="pointer-events: auto;">
                        <div class="helper-top-content">
                            <div class="helper-icon-container"><img class="helper-icon"
                                    src="https://dolly-images.s3-us-west-2.amazonaws.com/helper-icon-2helpers.png">
                            </div>
                            <div class="helper-title-container">
                                <div class="helper-title">2 Helpers</div>
                                <div class="helper-title-container labl">
                                    <input type="radio" name="helper" value="2 Helpers"
                                        class="main-option helper-option" />
                                </div>
                                <div class="helper-bottom-content">Two Helpers with a pickup truck will arrive to get
                                    your Dolly done quick and easy.</div>
                            </div>
                        </div>
                    </div>
                    <div class="helper-buttons"></div>
                </div>
                <div class="helper-container-wrap list_block helper-block">
                    <div class="helper-container disabled clickable" style="pointer-events: auto;">
                        <div class="helper-top-content">
                            <div class="helper-icon-container"><img class="helper-icon"
                                    src="https://dolly-images.s3-us-west-2.amazonaws.com/helper-icon-1helperplusyou.png">
                            </div>
                            <div class="helper-title-container">
                                <div class="helper-title">1 Helper + You</div>
                                <div class="helper-title-container labl">
                                    <input type="radio" name="helper" value="1 Helper"
                                        class="main-option helper-option" />
                                </div>
                                <div class="helper-bottom-content">If your Dolly needs 2 people to lift and carry, you
                                    can save money by helping!</div>
                            </div>
                        </div>
                    </div>
                    <div class="helper-buttons"></div>
                </div>
                <div class="page-vehicle-types page">
                    <hr>
                    <h1 class="fs-title" style="font-weight: bold;">What size vehicle do you prefer?</h1>
                    <div class="helper-container-wrap list_block pick-block">
                        <div class="helper-container disabled clickable" style="pointer-events: auto;">
                            <div class="helper-top-content">
                                <div class="helper-icon-container"><img class="helper-icon"
                                        src="https://dolly-images.s3-us-west-2.amazonaws.com/pickup_truck.png"></div>
                                <div class="helper-title-container">
                                    <div class="helper-title">Pickup Truck</div>
                                    <div class="helper-title-container labl">
                                        <input type="radio" name="pickup" value="Pickup Truck"
                                            class="main-option pickup-option" />
                                    </div>
                                    <div class="helper-bottom-content">Includes tarps and tie-downs for weather</div>
                                </div>
                            </div>
                        </div>
                        <div class="helper-buttons"></div>
                    </div>
                    <div class="helper-container-wrap list_block pick-block">
                        <div class="helper-container disabled clickable" style="pointer-events: auto;">
                            <div class="helper-top-content">
                                <div class="helper-icon-container"><img class="helper-icon"
                                        src="https://dolly-images.s3-us-west-2.amazonaws.com/van.png"></div>
                                <div class="helper-title-container">
                                    <div class="helper-title">Cargo Van</div>
                                    <div class="helper-title-container labl">
                                        <input type="radio" name="pickup" value="Cargo Van"
                                            class="main-option pickup-option" />
                                    </div>
                                    <div class="helper-bottom-content">Complete protection and added capacity</div>
                                </div>
                            </div>
                        </div>
                        <div class="helper-buttons"></div>
                        <div class="price-quote">
                            <p>$$</p>
                        </div>
                    </div>
                    <div class="helper-container-wrap list_block pick-block">
                        <div class="helper-container disabled clickable" style="pointer-events: auto;">
                            <div class="helper-top-content">
                                <div class="helper-icon-container"><img class="helper-icon"
                                        src="https://dolly-images.s3-us-west-2.amazonaws.com/box_truck.png"></div>
                                <div class="helper-title-container">
                                    <div class="helper-title">Box Truck</div>
                                    <div class="helper-title-container labl">
                                        <input type="radio" name="pickup" value="Box Truck"
                                            class="main-option pickup-option" />
                                    </div>
                                    <div class="helper-bottom-content">Complete protection and our largest capacity
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="helper-buttons"></div>
                        <div class="price-quote">
                            <p>$$$</p>
                        </div>
                    </div>
                    <p class="tiny text-light"></p>
                </div>
                <footer class="page-navigation clearfixundefined">
                    <div class="app-progress-black">
                        <div class="app-progress-inner-black" style="width: 50%;"></div>
                    </div>

                </footer>
            </div>

            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset> --}}

        <fieldset class="fourth-step">
            <h2 class="fs-title" style="font-weight: bold;">Select a Date</h2>
            <div class="">
                {{-- <div id="calendars" class="hasDatepicker">
                </div> --}}
                <div class="form-group">
                    <label for="">Date <span>*</span></label>
                    <input type="text" name="date" id="datepicker" class="form-control">
                </div>
                <div class="form-group timelines">
                  
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-6">
                  <div class="form-group">
                    <label for="">First Name <span>*</span></label>
                    <input type="text" name="f_name" id="f_name" class="form-control" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Last Name <span>*</span></label>
                    <input type="text" name="l_name" id="l_name" class="form-control" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Email <span>*</span></label>
                    <input type="text" name="email" id="email" class="form-control" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Address <span>*</span></label>
                    <input type="text" name="address" id="address" class="form-control" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Phone <span>*</span></label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                  </div>
                </div>
            </div>
            </h2>

            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />

        </fieldset>
        <fieldset style="margin-bottom:80px" class="fifth-step">
            <div class="creation page-servicelevel page">
                <div class="row">
                    <div class="col-12">
                        <h3>Order Confirmation</h3>
                    </div>
                </div>
                <div class="row" style="background: white!important">
                    <div class="col-12">
                      <span><b>Booking Contact</b> <span class="booking-contact"></span></span>
                      <span><b>Email</b> <span class="booking-email"></span></span>
                      <span><b>Date</b> <span class="booking-date"></span></span>
                      <span><b>Arrival Window</b> <span class="booking-time"></span></span>
                      <span><b>Adderss</b> <span class="booking-address"></span></span>
                      <span><b>Postal code</b> <span class="booking-postalcode"></span></span>
                      <span><b>Service Type</b> <span class="booking-service"></span></span>
                      <span><b>Total To Pay</b> <span class="booking-total"></span></span>
                    </div>
                </div>
                {{-- <div class="heading-help">
                    <h2 class="fs-title" style="font-weight: bold;">Price Estimate: <span class="price-estimate"></span></h2>
                    <p class="help-link"><span></span></p>
                </div>
                <div>
                    <p class="text-center tiny haul-away-disposal-fee-disclaimer"><strong>*This estimate is based on a
                            distance of 5 miles. Add all locations to see the final price.</strong></p>
                </div> --}}
                {{-- <div>
                    <div style="margin: 20px 0px;">
                        <div class="price-breakdown-title-wrapper">Included with your Dolly</div>
                        <div class="price-breakdown-wrapper"
                            style="background-color: white; border-radius: 0px 0px 4px 4px;">
                            <div style="margin: 0px auto; padding: 5px;">
                                <div style="margin-bottom: 10px; font-size: 16px; font-weight: 800;"><span><strong
                                            class="helper-vehicle-option">2 Helpers, 1 Pickup Truck</strong></span>
                                </div>
                                <div class="selling-point-row-test">
                                    <div class="selling-point-image"><img src="./assets/images/dolly.svg"></div>
                                    <div><span class="selling-point-name-test"><strong>Upfront Pricing.</strong></span>
                                    </div>
                                </div>
                                <div class="selling-point-row-test">
                                    <div class="selling-point-image"><img src="./assets/images/star.svg"></div>
                                    <div><span class="selling-point-name-test"><strong>Customer support 7 days a
                                                week.</strong></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="social-signifier-container">
                    <div id="trust-message-container"><img src="./assets/images/truck.png" alt=""><span>Over 2000 store
                            deliveries were booked with Dolly last week.</span></div>
                </div>
                <div>
                    <div class="add-on-wrapper">
                        <div style="overflow: hidden;">
                            <div class="helper-container-wrap list_block">
                                <div class="helper-container  no_border"
                                    style="pointer-events: auto; margin-bottom: 0px;">
                                    <div class="selected-check-wrapper" style="top: 16px;"></div>
                                    <div class="helper-top-content">
                                        <div class="helper-title-container">
                                            <div class="helper-title small">Standard Service</div>
                                            <div class="helper-bottom-content gray">Your Helper will load, transport,
                                                and place item(s) in the room of your choice.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="helper-buttons"></div>
                            </div>
                            <div class="helper-container-wrap list_block">
                                <div class="helper-container disabled clickable no_border"
                                    style="pointer-events: auto; margin-bottom: 0px;">
                                    <div class="selected-check-wrapper" style="top: 16px;"></div>
                                    <div class="helper-top-content">
                                        <div class="helper-title-container">
                                            <div class="helper-title small">No-Contact Service</div>
                                            <div class="helper-bottom-content gray">Your Helper will load, transport,
                                                and drop off outside in a safe place. You’ll need to bring items inside.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="helper-buttons"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="price-breakdown-container">
                    <div class="price-breakdown-title-wrapper">Price breakdown</div>
                    <div class="price-breakdown-wrapper">
                        <div class="price-title-wrapper"><span class="price-title main">Total Price</span><span
                                class="breakdown-price main price-estimate">$133</span></div>
                        <hr class="price-breakdown-divider">
                        <div class="price-title-wrapper"><span class="price-title">Subtotal</span><span
                                class="breakdown-price price-estimate">$133</span></div>
                        <div class="price-title-wrapper"><span class="price-title">Taxes</span><span
                                class="breakdown-price">Included</span></div>
                    </div>
                </div> --}}

            </div>

            {{-- <input type="button" name="previous" class="previous action-button" value="Previous" /> --}}
            <input type="button" name="next" class="next action-button" value="Confirm & Pay" />
            <!-- <div class="down">
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="button" name="next" class="next action-button" value="Next" />
            </div> -->
        </fieldset>
    </form>
</body>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"
    type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/8.2.1/nouislider.min.js" type="text/javascript"></script> --}}
<script src="{{ asset('assets/js/script.js') }}"></script>
<script>
    
$(document).on('change', '#datepicker', function () {
	var date = $(this).val();
    getTimeSlots(date);
});

function getTimeSlots(date){
	$.ajax({
		type: "GET",
		url: "{{ route('getTimeSlots') }}", // your php file name
		data: {date:date},
		dataType: "json",
		contentType: false,
		headers: {
			'X-CSRF-TOKEN':  "{{ csrf_token() }}",
		},
		
		success: function (data) {
         $('.timelines').html();
		 if(data){
            $('.timelines').html(data.timelineHtml);
         }
			// $('.benefit_partner').html('');
			// $('.benefit_partner').html(data.offersHtml);

			// var $datepicker = $('#calendars');
			// $datepicker.datepicker();
			// $datepicker.datepicker('setDate', new Date(date));
			// $('.ui-datepicker-inline').addClass('notranslate');

		},
		error: function (errorString) {

		}
	});
}


$(document).on('click', '.add-item', function () {
	index++;
	var option = $('input[name="option"]:checked').val();
	console.log(option);
	var sub_option = $('div').attr('data-title', option).find('input[name="item_menu"]:checked').val();
	var stepper_value = $('.stepper-value').text();
	var item_html = `
        <div class="item-entry undefined items-listing" id="list-${index}"  data-title="Chair">
        <div class="item-count" data-title="Chair" >${stepper_value}</div>
        <div class="item-title undefined" data-title="Chair">
            <div data-title="Chair">${option}</div>

            <div data-title="Chair">
                <p class="subtitle tiny no-margin-bottom" style="text-transform: capitalize;"> ${sub_option}</p>
                
            </div>
            
        </div>
        <div class="item-buttons undefined"><button class="item-edit" type="button" data-index = "${index}" data-qty="${stepper_value}" data-sublist = "${sub_option}" data-list = "${option}" style="margin-right: 10px;">Edit</button><button
        class="item-delete">Remove</button></div>
        </div>`;
	$('.items-list').append(item_html);
	var div_length = $('.items-listing').length;
	$('.total-items').text(div_length);
    var items_arr = [];
    items_arr['item'] = 
    // $.ajax({
	// 	type: "GET",
	// 	url: "{{ route('setSession') }}", // your php file name
	// 	data: {item:option , item_menu: sub_option ,qty:stepper_value},
	// 	dataType: "json",
	// 	contentType: false,
	// 	headers: {
	// 		'X-CSRF-TOKEN':  "{{ csrf_token() }}",
	// 	},
		
	// 	success: function (data) {
    //      $('.timelines').html();
		
	// 		// $('.benefit_partner').html('');
	// 		// $('.benefit_partner').html(data.offersHtml);

	// 		// var $datepicker = $('#calendars');
	// 		// $datepicker.datepicker();
	// 		// $datepicker.datepicker('setDate', new Date(date));
	// 		// $('.ui-datepicker-inline').addClass('notranslate');

	// 	},
	// 	error: function (errorString) {

	// 	}
	// });
});
</script>

</html>