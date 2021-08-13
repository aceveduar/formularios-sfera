// Configuración del calendario de rangos
$(function() {
    $('input[name="daterange"]').daterangepicker({
      timePicker: false,
      startDate: moment().startOf('hour'),
      endDate: moment().startOf('hour').add(32, 'hour'),
      locale: {
        format: 'DD/MM/YYYY',
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sá"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
      }
    });
  });



// Utilizaré una función llamada “PasarValor” y en ella llamaremos mediante el identificador ID al input que queremos pasar la información.
 function PasarValor() {
     document.getElementById("nombre2").value = document.getElementById("nombre1").value;
     }






