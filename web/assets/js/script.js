function loadPush(){
  $.fn.dataTable.ext.search.push(
    function( settings, searchData, index, rowData, counter ) {
      var selectedCountryItem = $('#countryFilter').val();
  
      if (selectedCountryItem === "" || searchData[0].includes(selectedCountryItem)) {
        return true;
      }
      return false;
    }
  );

  $.fn.dataTable.ext.search.push(
    function( settings, searchData, index, rowData, counter ) {
      var selectedStatusItem = $('#statusFilter').val();
      if (selectedStatusItem === "" || searchData[3].includes(selectedStatusItem)) {
        return true;
      }
      return false;
    }
  );
}

$(document).ready(function() {
  var table = $('#dataTable').DataTable({
    "pageLength": 10,
    "responsive": true,
    "lengthChange": false,
    initComplete: function () {
      loadPush();
    }
  });


  $("#countryFilter").change(function (e) {
    table.draw();
  });

  $("#statusFilter").change(function (e) {
    table.draw();
  });

  table.draw();
});

