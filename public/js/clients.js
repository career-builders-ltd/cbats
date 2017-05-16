$(document).ready(function() {
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
