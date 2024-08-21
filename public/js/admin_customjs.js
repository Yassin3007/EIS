$(function () {
  
  //Custom Input file
  bsCustomFileInput.init();
  
  //Table Configurations
  $("#tableContainer").DataTable({
    "ordering": false,
    "paging": false,
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "searching": false,
    "info": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print"]
  }).buttons().container().appendTo('#tableContainer_wrapper .col-md-6:eq(0)');
  
  //Current Year
  let date =  new Date().getFullYear();
  $('.current_year').text(date);
  $("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  });
  
  //Initialize Select2 Elements
  $('select').select2();
  
  // $('#timepicker').datetimepicker({
  //   format: 'LT'
  // });
  // $('#reservationdate').datetimepicker({
  //     format: 'L'
  // });
 


});
