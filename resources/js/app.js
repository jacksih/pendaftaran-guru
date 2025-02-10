import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $(function () {
    $("#contoh").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false
    //   "buttons": ["colvis"] // Hanya tombol colvis yang dipertahankan
    }).buttons().container().appendTo('#contoh_wrapper .col-md-6:eq(0)');

});

