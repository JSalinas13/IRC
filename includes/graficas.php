  <?php

  include("./conexion/conexion.php");
  ?>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctx = document.getElementById('humedad');
    const ctx1 = document.getElementById('myChart');
    const ctx2 = document.getElementById('phAgua');
    const ctx3 = document.getElementById('phTierra');
    const ctx4 = document.getElementById('phTierra_humedad');

    // <?php echo 'CAMA: ' . $_SESSION['cultivo'] ?>
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: [

          <?php
          $idCul = $_SESSION['cultivo'];
          $sql = "select fechahora from bitacorahum where id_cama=2 order by id_bitacorahum desc limit 10";
          $result = mysqli_query($conexion, $sql);
          while ($registros = mysqli_fetch_array($result)) {
          ?> '<?php echo  $registros["fechahora"] ?>',
          <?php
          }
          ?>
        ],
        datasets: [{
          label: '# of Votes',
          data: [

            <?php
            $idCul = $_SESSION['cultivo'];
            $query = " select humedad from bitacorahum where id_cama=2 order by id_bitacorahum desc limit 10";
            $resultados = mysqli_query($conexion, $query);
            while ($rows = mysqli_fetch_array($resultados)) {
            ?>
              <?php echo $rows["humedad"] ?>,
            <?php
            }
            ?>
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
    new Chart(ctx1, {
      type: 'line',
      data: {
        labels: [

          <?php
          $idCul = $_SESSION['cultivo'];
          $sql = "select fechahora from bitacoratemp where id_cama=$idCul order by id_bitacoratemp desc limit 10";
          $result = mysqli_query($conexion, $sql);
          while ($registros = mysqli_fetch_array($result)) {
          ?> '<?php echo  $registros["fechahora"] ?>',
          <?php
          }
          ?>
        ],
        datasets: [{
          label: '# of Votes',
          data: [

            <?php
            $idCul = $_SESSION['cultivo'];
            $query = " select temperatura from bitacoratemp where id_cama=$idCul order by id_bitacoratemp desc limit 10";
            $resultados = mysqli_query($conexion, $query);
            while ($rows = mysqli_fetch_array($resultados)) {
            ?>
              <?php echo $rows["temperatura"] ?>,
            <?php
            }
            ?>
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
    new Chart(ctx2, {
      type: 'line',
      data: {
        labels: [

          <?php
          $idCul = $_SESSION['cultivo'];
          $sql = "select fechahora from bitacoraphagua where id_cama=$idCul order by id_bitacoraphagua desc limit 10";
          $result = mysqli_query($conexion, $sql);
          while ($registros = mysqli_fetch_array($result)) {
          ?> '<?php echo  $registros["fechahora"] ?>',
          <?php
          }
          ?>
        ],
        datasets: [{
          label: '# of Votes',
          data: [

            <?php
            $idCul = $_SESSION['cultivo'];
            $query = " select phagua from bitacoraphagua where id_cama=$idCul order by id_bitacoraphagua desc limit 10";
            $resultados = mysqli_query($conexion, $query);
            while ($rows = mysqli_fetch_array($resultados)) {
            ?>
              <?php echo $rows["phagua"] ?>,
            <?php
            }
            ?>
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    new Chart(ctx3, {
      type: 'line',
      data: {
        labels: [

          <?php
          $idCul = $_SESSION['cultivo'];
          $sql = "select fechahora from bitacoraphtierra where id_cama=$idCul order by id_bitacoraphtierra desc limit 10";
          $result = mysqli_query($conexion, $sql);
          while ($registros = mysqli_fetch_array($result)) {
          ?> '<?php echo  $registros["fechahora"] ?>',
          <?php
          }
          ?>
        ],
        datasets: [{
          label: '# of Votes',
          data: [

            <?php
            $idCul = $_SESSION['cultivo'];
            $query = " select phtierra from bitacoraphtierra where id_cama=$idCul order by id_bitacoraphtierra desc limit 10";
            $resultados = mysqli_query($conexion, $query);
            while ($rows = mysqli_fetch_array($resultados)) {
            ?>
              <?php echo $rows["phtierra"] ?>,
            <?php
            }
            ?>
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    new Chart(ctx4, {
      type: 'line',
      data: {
        labels: [

          <?php
          $idCul = $_SESSION['cultivo'];
          $sql = "select fechahora from bitacoraphtierrahumedad where id_cama=$idCul order by bitacoraphtierrahumedad desc limit 10";
          $result = mysqli_query($conexion, $sql);
          while ($registros = mysqli_fetch_array($result)) {
          ?> '<?php echo  $registros["fechahora"] ?>',
          <?php
          }
          ?>
        ],
        datasets: [{
          label: '# of Votes',
          data: [

            <?php
            $idCul = $_SESSION['cultivo'];
            $query = " select phtierra from bitacoraphtierrahumedad where id_cama=$idCul order by bitacoraphtierrahumedad desc limit 10";
            $resultados = mysqli_query($conexion, $query);
            while ($rows = mysqli_fetch_array($resultados)) {
            ?>
              <?php echo $rows["phtierra"] ?>,
            <?php
            }
            ?>
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>