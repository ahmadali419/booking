/*=========================================================================================
    File Name: form-wizard.js
    Description: wizard steps page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  var bsStepper = document.querySelectorAll('.bs-stepper'),
    select = $('.select2'),
    horizontalWizard = document.querySelector('.horizontal-wizard-example'),
    verticalWizard = document.querySelector('.vertical-wizard-example'),
    modernWizard = document.querySelector('.modern-wizard-example'),
    modernVerticalWizard = document.querySelector('.modern-vertical-wizard-example');

  // Adds crossed class
  if (typeof bsStepper !== undefined && bsStepper !== null) {
    for (var el = 0; el < bsStepper.length; ++el) {
      bsStepper[el].addEventListener('show.bs-stepper', function (event) {
        var index = event.detail.indexStep;
        var numberOfSteps = $(event.target).find('.step').length - 1;
        var line = $(event.target).find('.step');

        // The first for loop is for increasing the steps,
        // the second is for turning them off when going back
        // and the third with the if statement because the last line
        // can't seem to turn off when I press the first item. ¯\_(ツ)_/¯

        for (var i = 0; i < index; i++) {
          line[i].classList.add('crossed');

          for (var j = index; j < numberOfSteps; j++) {
            line[j].classList.remove('crossed');
          }
        }
        if (event.detail.to == 0) {
          for (var k = index; k < numberOfSteps; k++) {
            line[k].classList.remove('crossed');
          }
          line[0].classList.remove('crossed');
        }
      });
    }
  }

  // select2
  select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      placeholder: 'Select value',
      dropdownParent: $this.parent()
    });
  });

  // Horizontal Wizard
  // --------------------------------------------------------------------
  if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
    var numberedStepper = new Stepper(horizontalWizard),
      $form = $(horizontalWizard).find('form');
    $form.each(function () {
      var $this = $(this);

      $this.validate({
        rules: {
          first_name: {
            required: true
          },
          s_name: {
            required: true
          },
          email: {
            required: true
          },
          password: {
            required: true,
            minlength: 8,
          },
          'confirm-password': {
            required: true,
            minlength: 8,
            equalTo: '#password'
          },
          city: {
            required: true
          },
          country: {
            required: true
          },
          phone: {
            required: true
          },
          dob: {
            required: true
          },
          cost: {
            required: true
          },
          profile_url: {
            required: true,
            url: true
          },
          gender: {
            required: true,

          },
          ethincity: {
            required: true,

          },
          eye_color: {
            required: true,

          },
          date: {
            required: true,

          }
        },
        errorPlacement: function (error, element) {
          if (element.attr("name") == "date") {
            error.appendTo(element.parent("div").next("div"));
          } else {
            error.insertAfter(element.parent());
          }
        }
      });
    });

    $(horizontalWizard)
      .find('.btn-next')
      .each(function () {
        $(this).on('click', function (e) {



          var isValid = $(this).parent().siblings('.validation_form').find('input,select').valid();
          var id = $('#id').val();
          if (id != '' && id != undefined) {
            if ($('.password').val() != '' && $('.confpass').val() != '' && $('.password').val() != $('.confpass').val()) {
              $('#msg_cnf').text('Password should be same');
              return false;
              // Prevent form submission
              event.preventDefault();
            } else {
              $('#msg_cnf').text('');
              // return true;
            }
          }

          if (isValid) {
            numberedStepper.next();
          } else {
            e.preventDefault();
          }
        });
      });

    $(horizontalWizard)
      .find('.btn-prev')
      .on('click', function () {
        numberedStepper.previous();
      });

    $(horizontalWizard)
      .find('.btn-submit')
      .on('click', function () {
        var number = $(".profiles:not([src=''])").length;
        var feature_image = $(".featured_image:not([src=''])").length;
        var id = $('#id').val();
        if ($("input:radio[name=date]:checked").length == 0) {
          $(window).scrollTop(0);
          $('#msg_datefan').html('This field is required');
          return false;
        } else {
          $('#msg_datefan').html('');
        }
        if (id == '') {
          if (number < 3) {
            $('#msg_photos_upload').html('Please upload atleast 3 photos');
            $(window).scrollTop(0);
            return false;
          } else {
            $('#msg_photos_upload').html('');
          }
        }
        if (feature_image == 0) {
          $(window).scrollTop(0);
          $('#msg_feature_image').html('Please upload featured image');
          return false;
        } else {
          $('#msg_feature_image').html('');
        }

        
        var isValid = $('#candidate_form').valid();
        if (isValid) {
          $('#candidate_form').trigger('submit');
        }
      });
  }

  $('.btn-next').attr('type', 'button');
  $('.btn-prev').attr('type', 'button');


});
