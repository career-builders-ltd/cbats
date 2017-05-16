$(document).ready(function(){
	$("#num_of_openings").TouchSpin({min:0,max:25,step:1,decimals:0,boostat:1,maxboostedstep:1,postfix:"Openings"});
	$("#exp_years_add").TouchSpin({min:0,max:10,step:1,decimals:0,boostat:1,maxboostedstep:1,postfix:"Years"});
	$("#exp_months_add").TouchSpin({min:0,max:11,step:1,decimals:0,boostat:1,maxboostedstep:1,postfix:"Months"});
	$('#summernote_2').summernote({height: 300});

	$("#select_client_button").click(function() {
		 $("#search_client").addClass("active");
		 $("#select_client_tab").addClass("active");
		 $("#new_client_tab").removeClass("active");
		 $("#add_client").removeClass("active");
		 $("#client_update").removeClass("hide");
		 $("#client_save").addClass("hide");
	});
	$("#new_client_button").click(function() {
		 $("#add_client").addClass("active");
		 $("#new_client_tab").addClass("active");
		 $("#select_client_tab").removeClass("active");
		 $("#search_client").removeClass("active");
		 /*$("#client_save").removeClass("hide");
		 $("#client_update").addClass("hide");*/
	});

	$("#status,#priority").select2({
		width:'100%',
	});

});