$(document).ready(function(){
  var base_url = $("meta[name='base_url']").attr('content');
  $.ajaxSetup({
    'headers':{
      'X-CSRF-TOKEN':$("meta[name='csrf_token']").attr('content'),
    }
  });

  /*
  * Plugins initializations
  */

  $('.init-datepicker').datepicker({format : "M dd, yyyy",orientation: "left",autoclose: true});
  $("#num_openings").TouchSpin({min:0,max:25,step:1,decimals:0,boostat:1,maxboostedstep:1,postfix:"Openings"});
	$("#exp_years").TouchSpin({min:0,max:10,step:1,decimals:0,boostat:1,maxboostedstep:1,postfix:"Years"});
	$("#exp_months").TouchSpin({min:0,max:11,step:1,decimals:0,boostat:1,maxboostedstep:1,postfix:"Months"});
  $('#job_description').summernote({height: 300});

  $("#ov_status_edit,#ov_priority_edit").select2({
    width:'100%',    
  });


  /*
  * End Plugins initializations
  */

  var statSlider='';
  function initOverview(data){
    title = data.data.ov_title.split(" : ");
    $("#pg_jobTitle").html(title[1]).parent().parent().removeClass('hide');

    $.each(data.data,function(key,val){
      elem = "#"+key;
      $(elem).html(val);
    });

    if(data.stdset!=''){
      if(statSlider!=''){
          statSlider.destroy();
      }

      $("#ov_status_view").ionRangeSlider({
        grid: !0,
        from: data.stdset.status,
        values: data.stdset.order_status
      });
      statSlider = $("#ov_status_view").data("ionRangeSlider");
    }

    $("ul[role='tab-options'][section='jobs']").find("li > a").removeAttr("disabled");

    $("button[btn-role='edit-order']").on('click',function(){
      var respTab = $(this).attr('hrefurl');
      var editTab = $("ul[role='tab-options'][section='jobs']").find('a[href="'+respTab+'"]');
      initEdit(data,editTab);
      $("ul[role='tab-options'][section='jobs']").find("li > a").attr("disabled","disabled");
      editTab.removeClass('hide').removeAttr('disabled').trigger('click');
      editTab.parent().css("display","block");
    });
    return true;
  }

  function initEdit(data,editTab){
      var editHandler,cancelHandler;
      editHandler = function(){

      },
      cancelHandler = function(){
        editTab.attr('disabled','disabled');
        editTab.parent().css("display","none");
        $("ul[role='tab-options'][section='jobs']").find("li > a").eq(0).removeAttr('disabled').trigger('click');
      }
      $("button[btn-role='cancel-order']").on('click',cancelHandler);
      $("button[btn-role='update-order']").on('click',editHandler);
  }

  var activeTab = '';
  $("#joblist").find("a[data-resp='tab']").on('click',function(){
    respID = $(this).attr('data-orderId');
    respTab = $(this).attr('hrefurl');
    App.blockUI();
    $.ajax({
      url : base_url+'load-job',
      data : {jobid : respID},
      method : 'post',
      dataType : 'json',
      success : function(resp){
        App.unblockUI();
        if(initOverview(resp)){
            $("ul[role='tab-options'][section='jobs']").find('a[href="'+respTab+'"]').removeAttr('disabled').trigger('click');
            activeTab = respTab;
        }
      },error:function(err){
        App.unblockUI();
      }
    });
  });

  function viewJobList(){
    $("ul[role='tab-options'][section='jobs']").find('a[href="#editjob"]').parent().css('display','none');
    $("ul[role='tab-options'][section='jobs']").find("li > a").attr("disabled","disabled");
    $("ul[role='tab-options'][section='jobs']").find('a[href="#joblist"]').removeAttr("disabled");
    if($("#pg_jobTitle").html()!=''){
      $("#pg_jobTitle").html('').parent().parent().addClass('hide');
    }
  }

  $("ul.nav.nav-tabs[role='tab-options'][section='jobs']").find("a[data-toggle='tab']").on('click',function(event){
    if($(this).attr('disabled')){
      return false;
      event.stopImmediatePropagation();
    }
    if($(this).attr('href')=='#joblist'){
        viewJobList();
    }
  });
});
