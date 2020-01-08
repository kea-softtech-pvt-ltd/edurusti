function placeholder_details(){
	var  cate_add_id =  $('#cate_add_id').val();
	var  cate_sub_id =  $('#cate_sub_id').val();
	var  full_name =  $('#full_name').val();
	var  email =  $('#email').val();
	var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
	var flag = 0;
	
	var  mobile_number =  $('#mobile_number').val();
	var  pin_code =  $('#pin_code').val();
	var  address =  $('#address').val();
	var  address1 =  $('#address1').val();
	var  landmark =  $('#landmark').val();
	var  city =  $('#city').val();
	if(full_name == ""){
		$( "span.error-email" ).html( 'Please enter valid email id' );
		
	}if (email == '' || !re.test(email))
	{
		$( "span.error-email" ).html( 'Please enter valid email id' );
	    flag++;
	} else if(mobile_number.length > 10 || mobile_number.length < 10) 
	{
		$('span.error-phone').html('Please enter a valid mobile number.');
	}else if(pin_code.length > 6 || mobile_number.length < 6) 
	{
		$('span.error-pin_code').html('Please enter Pin code number.');
	}
	
	
	else{
	$.ajax({
	type :"POST",
	url: "ajax/ajax_placeorder.php",				
	data:"full_name="+full_name+"&email="+email+"&mobile_number="+mobile_number+"&pin_code="+pin_code+"&address="+address+"&address1="+address1+"&landmark="+landmark+"&city="+city+"&cate_add_id="+cate_add_id+"&cate_sub_id="+cate_sub_id+"&action=placeorder",
	success: function(data){
		alert(data);
		// var obj = JSON.parse(data);
		// alert(obj.message);
		// $('#otp_verify').val(data) 
	 }
	});		
	}
	
	
	
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
	$(function ()
	{
		$("#wizard").steps({
			headerTag: "h2",
			bodyTag: "section",
			transitionEffect: "slideLeft",
			onStepChanging : function (event, currentIndex, newIndex) { return true; }
		});
	});
	$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      //if (isValid)
          //nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});


    $(document).ready(function() {

      $(".only-numeric").bind("keypress", function (e) {

          var keyCode = e.which ? e.which : e.keyCode

               

          if (!(keyCode >= 48 && keyCode <= 57)) {

            $(".error1").css("display", "inline");

            return false;

          }else{

            $(".error1").css("display", "none");

          }

      });

    });
	
	
	$(document).ready(function() {

      $(".only-pin").bind("keypress", function (e) {

          var keyCode = e.which ? e.which : e.keyCode

               

          if (!(keyCode >= 48 && keyCode <= 57)) {

           
            $(".pin_code_").css("display", "inline");

            return false;

          }else{

           
            $(".pin_code_").css("display", "none");

          }

      });

    });
	
	