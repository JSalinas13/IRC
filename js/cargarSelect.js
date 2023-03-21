function listarEstados() {
  $.ajax({
    url: "./cargar/listar_estados.php",
    type: "POST",
  }).done(function (resp) {
    var data = JSON.parse(resp);
    var cadena = "";

    if (data.length > 0) {
      for (var i = 0; i < data.length; i++) {
        cadena +=
          "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
      }

      $("#estados").html(cadena);
      var idestado = $("#estados").val();
      listarMunicipio(idestado);
    } else {
      cadena += "<option value=''>No se encontraron registros estados</option>";
      $("#estados").html(cadena);
    }
  });
}

function listarMunicipio(idestado) {
  $.ajax({
    url: "./cargar/listar_municipio.php",
    type: "POST",
    data: {
      idestado: idestado,
    },
  }).done(function (resp) {
    var data = JSON.parse(resp);
    var cadena = "";

    if (data.length > 0) {
      for (var i = 0; i < data.length; i++) {
        cadena +=
          "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
      }

      $("#municipios").html(cadena);
      var idmunicipio = $("#municipios").val();
      listarLocalidades(idmunicipio);
    } else {
      cadena +=
        "<option value=''>No se encontraron registros municipios</option>";
      $("#municipios").html(cadena);
    }
  });
}

function listarLocalidades(idmunicipio) {
  $.ajax({
    url: "./cargar/listar_localidades.php",
    type: "POST",
    data: {
      idmunicipio: idmunicipio,
    },
  }).done(function (resp) {
    var data = JSON.parse(resp);
    var cadena = "";

    if (data.length > 0) {
      for (var i = 0; i < data.length; i++) {
        cadena +=
          "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
      }
      $("#localidades").html(cadena);
    } else {
      cadena +=
        "<option value=''>No se encontraron registros municipios</option>";
      $("#localidades").html(cadena);
    }
  });
}

// CAMAS
function listarInvernaderos(jefe) {
  $.ajax({
    url: "./cargar/cargarInvernaderos.php",
    type: "POST",
    data: {
      jefe: jefe,
    },
  }).done(function (resp) {
    var data = JSON.parse(resp);
    var cadena = "";
    // alert(resp);

    if (data.length > 0) {
      cadena += "<option value='0'> Invernaderos: </option>";

      for (var i = 0; i < data.length; i++) {
        cadena +=
          "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
      }

      $("#inver").html(cadena);
      var idinver = $("#inver").val();
      listarCamas(idinver);
    } else {
      cadena += "<option value=''>No existen invernaderos</option>";
      $("#inver").html(cadena);
    }
  });
}

function listarCamas(inver) {
  $.ajax({
    url: "./cargar/cargarCamas.php",
    type: "POST",
    data: {
      inver: inver,
    },
  }).done(function (resp) {
    var data = JSON.parse(resp);
    var cadena = "";
    // alert(resp);

    if (data.length > 0) {
      cadena += "<option value='0'> Camas: </option>";
      for (var i = 0; i < data.length; i++) {
        cadena +=
          "<option value='" + data[i][0] + "'>" + data[i][3] + "</option>";
      }
      $("#camas").html(cadena);
    } else {
      cadena += "<option value=''>No se encontraron registros camas</option>";
      $("#camas").html(cadena);
    }
  });
}

// CAMAS
function listarInvernaderos2(jefe) {
  $.ajax({
    url: "./cargar/cargarInvernaderos.php",
    type: "POST",
    data: {
      jefe: jefe,
    },
  }).done(function (resp) {
    var data = JSON.parse(resp);
    var cadena = "";

    if (data.length > 0) {
      cadena += "<option value='0'> Invernaderos: </option>";

      for (var i = 0; i < data.length; i++) {
        cadena +=
          "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
      }

      $("#inver2").html(cadena);
      var idinver = $("#inver2").val();
      listarCamas2(idinver);
    } else {
      cadena += "<option value=''>No se encontraron invernaderos</option>";
      $("#inver2").html(cadena);
    }
  });
}

function listarCamas2(inver) {
  $.ajax({
    url: "./cargar/cargarCamasUsadas.php",
    type: "POST",
    data: {
      inver: inver,
    },
  }).done(function (resp) {
    var data = JSON.parse(resp);
    var cadena = "";

    if (data.length > 0) {
      cadena += "<option value='0'> Camas: </option>";
      for (var i = 0; i < data.length; i++) {
        cadena +=
          "<option value='" + data[i][0] + "'>" + data[i][3] + "</option>";
      }
      $("#camas2").html(cadena);
    } else {
      cadena += "<option value=''>No hay camas ocupadas</option>";
      $("#camas2").html(cadena);
    }
  });
}
