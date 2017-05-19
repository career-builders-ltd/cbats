$(document).ready(function(){

		/////////********** TouchSpin **********//////////

	$("#num_of_openings").TouchSpin({min:0,max:25,step:1,decimals:0,boostat:1,maxboostedstep:1,postfix:"Openings"});
	$("#exp_years_add").TouchSpin({min:0,max:10,step:1,decimals:0,boostat:1,maxboostedstep:1,postfix:"Years"});
	$("#exp_months_add").TouchSpin({min:0,max:11,step:1,decimals:0,boostat:1,maxboostedstep:1,postfix:"Months"});
	$('#summernote_2').summernote({height: 300});

		/////////********** client select **********//////////

	$("#select_client_button").click(function() {
		 $("#search_client").addClass("active");
		 $("#select_client_tab").addClass("active");
		 $("#new_client_tab").removeClass("active");
		 $("#add_client").removeClass("active");
		/* $("#client_update").removeClass("hide");
		 $("#client_save").addClass("hide");*/
	});
	$("#new_client_button").click(function() {
		 $("#add_client").addClass("active");
		 $("#new_client_tab").addClass("active");
		 $("#select_client_tab").removeClass("active");
		 $("#search_client").removeClass("active");
		/* $("#client_save").removeClass("hide");
		 $("#client_update").addClass("hide");*/
	});

	/////////********** select2 **********//////////
		$("#status,#priority,#category,#district_1,#industry").select2({
			width:'100%',
		});

		//$("#mySelect2,#mySelect3").select2({width:'100%'});


////////////*******   typeahead   *********////////////

		//typeahead for location

	$("#location").typeahead();
	$("#srch_client").typeahead();


	var substringMatcher = function(strs) {
	  return function findMatches(q, cb) {
	    var matches, substringRegex;

	    // an array that will be populated with substring matches
	    matches = [];

	    // regex used to determine if a string contains the substring `q`
	    substrRegex = new RegExp(q, 'i');

	    // iterate through the pool of strings and for any string that
	    // contains the substring `q`, add it to the `matches` array
	    $.each(strs, function(i, str) {
	      if (substrRegex.test(str)) {
	        matches.push(str);
	      }
	    });

	    cb(matches);
	  };
	};

	var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
	  'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
	  'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
	  'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
	  'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
	  'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
	  'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
	  'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
	  'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
	];

	$('#location').typeahead({
	  hint: true,
	  highlight: true,
	  minLength: 1
	},
	{
	  name: 'states',
	  source: substringMatcher(states)
	});

			//typeahead for company

	var substringMatcher = function(strs) {
		return function findMatches(q, cb) {
			var matches, substringRegex;

			// an array that will be populated with substring matches
			matches = [];

			// regex used to determine if a string contains the substring `q`
			substrRegex = new RegExp(q, 'i');

			// iterate through the pool of strings and for any string that
			// contains the substring `q`, add it to the `matches` array
			$.each(strs, function(i, str) {
				if (substrRegex.test(str)) {
					matches.push(str);
				}
			});

			cb(matches);
		};
	};
	// example array for company
	var company=['career builders','travelasia vacations','job vacancies','kandy offset']
	$('#srch_client').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},
	{
		name: 'states',
		source: substringMatcher(company)
	});


/*************** new client ****************/
$("#client_save").on('click',function(){
//ajax post
var client_details={
	"cmp_name":$("#company_name_add").val(),
	"cmp_address":$("#company_address_add").val(),
	"cmp_city":$("#company_city_add").val(),
	"district_id":$("#district_1").val(),
	"country_id":$(".country_id").attr('data-countryid'),
	"industry_id":$("#industry").val(),
	"cp_name":$("#cperson_name_add").val(),
	"cp_contact":$("#cperson_contact_add").val(),
	"cp_email":$("#cperson_email_add").val(),
	"reg_date":moment().format('YYYY-MM-DD'),
}
	$.ajax({
		url:"/newclient",
		method:"post",
		data: client_details,
		success:function(response){
			alert(response);
		},
		error:function(err){
			alert(response);
		}
	});

//select cliet details
$("#client").val($("#company_name_add").val());
$("#client_name").val($("#cperson_name_add").val());
$("#client_contact").val($("#cperson_contact_add").val());

//close modal
//$("#client_details").modal('toggle');
});


});
