$(document).ready(function() {
  var base_url = $("meta[name='base_url']").attr('content');
  $.ajaxSetup({
    'headers':{
      'X-CSRF-TOKEN':$("meta[name='csrf_token']").attr('content'),
    }
  });

  var switchtab=false;
  $(".nav.nav-tabs").find("li a").on('click',function(e){
    if(!switchtab){
      e.preventDefault();
      return false;
    }
  });

  $("#clients_grid").find('a[data-resp="tab"]').on('click',function(){
    var respTab = $(this).attr('hrefurl');
    var clientId = $(this).attr('data-clientID');
    App.blockUI();
    $.ajax({
      url:base_url+"load-clientData",
      method:"post",
      data:{cid:clientId},
      dataType:"json",
      success : function(resp){
        App.unblockUI();
        data = resp.data;
        $("#cmp_nameh,#cmp_name").html(data.cmp_name);
        $("#cmp_addr").html(data.cmp_addr);
        $("#cmp_addrh").html(data.cmp_addr+" "+data.cmp_location)
        $("#cmp_location").html(data.cmp_location);
        $("#cmp_district").html(data.cmp_district);
        $("#cmp_industry").html(data.cmp_industry);
        $("#cmp_contact").html(data.cmp_contact);
        $("#cmp_fax").html(data.cmp_fax);
        $("#cmp_email").html(data.cmp_email);
        $("#cmp_website").html(data.cmp_website);
        $("#cmp_contperson").html(data.cmp_contperson);
        $("#cmp_cpcont").html(data.cmp_cpcont);
        $("#cmp_cpemail").html(data.cmp_cpemail);
        $("#cmp_desc").html(data.cmp_desc);
        $("#cmp_regdate").html(data.cmp_regdate);
        $("#cmp_addedperson").html(data.cmp_addedperson);
        switchtab=true;
        $("ul[role='tab-options'][section='clients']").find('a[href="'+respTab+'"]').trigger('click');
      },
      error : function(err){
        App.unblockUI();
      }
    });
  });

  $("#clients_grid").dataTable({
    "language": {
      "aria": {
        "sortAscending": ": activate to sort column ascending",
        "sortDescending": ": activate to sort column descending"
      },
      "emptyTable": "No data available in table",
      "info": "Showing _START_ to _END_ of _TOTAL_ records",
      "infoEmpty": "No records found",
      "infoFiltered": "(filtered1 from _MAX_ total records)",
      "lengthMenu": "Show _MENU_",
      "search": "Search:",
      "zeroRecords": "No matching records found",
      "paginate": {
        "previous": "Prev",
        "next": "Next",
        "last": "Last",
        "first": "First"
      }
    },
    "bStateSave": true,
    "lengthMenu": [
      [10, 20, 50, 100, -1],
      [10, 20, 50, 100, "All"]
    ],
    "pageLength": 10,
    "columnDefs": [{
      'orderable': false,
      'targets': [4]
    }, {
      "searchable": false,
      "targets": [4]
    }],
    "order": [
      [0, "asc"]
    ]
  });
});
