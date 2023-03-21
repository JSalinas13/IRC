 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

 <script src="lib/chart/chart.min.js"></script>
 <script src="lib/easing/easing.min.js"></script>
 <script src="lib/waypoints/waypoints.min.js"></script>
 <script src="lib/owlcarousel/owl.carousel.min.js"></script>
 <script src="lib/tempusdominus/js/moment.min.js"></script>
 <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
 <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

 <!-- Template Javascript -->
 <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->


 <script src="js/main.js"></script>

 <!-- select2 -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 <script src="js/cargarSelect.js"></script>
 <script>
     $(document).ready(function() {
         $('.js-example-basic-single').select2();
         //  listarEstados();
         listarInvernaderos(<?php echo $id_user ?>);
         listarInvernaderos2(<?php echo $id_user ?>);
     });

     $("#estados").change(function() {
         var idestado = $("#estados").val();
         listarMunicipio(idestado);
     })

     $("#municipios").change(function() {
         var idmunicipio = $("#municipios").val();
         listarLocalidades(idmunicipio);
     })

     $("#inver").change(function() {
         var inver = $("#inver").val();
         //alert(inver);
         listarCamas(inver);
     })

     $("#inver2").change(function() {
         var inver2 = $("#inver2").val();
         //  alert(inver2);
         listarCamas2(inver2);
     })
 </script>

 </body>

 </html>