var timer;
var timeout = 1000;



// $('#BPMCO2WLTP,#BPMCO2,#percentage').keyup(function () {
//     clearTimeout(timer);
//     if ($('#SoortVoertuig').val() > 0 && $('#BPMbrandstof').val() > 0 && $('#datepicker1').val() != null && $('#datepicker2').val() != null && $('#BPMCO2WLTP').val() != null) {
//         console.log($('#datepicker1').val() != null);
//         console.log($('#datepicker2').val() != null);
//         timer = setTimeout(function () {
//             var carSelector = $('#SoortVoertuig').val();
//             var bpmbrandstof = $('#BPMbrandstof').val();
//             var datepicker1 = $('#datepicker1').val();
//             var datepicker2 = $('#datepicker2').val();
//             var datepicker3 = $('#datepicker3').val();
//             var co2wltp = $('#BPMCO2WLTP').val();
//             var percentage3 = $('#percentage').val();
//             if (percentage3 == '') {
//                 percentage3 = 0;
//             }
//             $.ajax({
//                 type: "POST",
//                 url: '../bpm/BPMUpdateTest.php',
//                 data: {
//                     SoortVoertuig: carSelector,
//                     BPMbrandstof: bpmbrandstof,
//                     BPMproductiedatum: datepicker1,
//                     BPMtenaamstellingNL: datepicker3,
//                     variabeledatumbpm: datepicker2,
//                     BPMCO2WLTP: co2wltp,
//                     percentage: percentage3,
//                 },
//                 success: function (data) {
//                     // console.log(json[0]['BPMCO2WLTP']);
//                     var json = JSON.parse(data);

//                     $('#brutobpm').val(json[0]['bpmprice']);
//                     $('#forfaitaire').val(json[0]['a']);
//                     $('#PercentageBerekening').val(json[0]['percentage']);
//                     if ($('#addRest_BPM').length) {
//                         $('#addRest_BPM').val(json[0]['bpmprice']);
//                     }
//                 }
//             });

//         }, timeout);
//     }
// });
// $('#BPMbrandstof').change(function () {
//     if ($('#BPMCO2').length && $('#BPMCO2WLTP').length) {
//         $('#BPMCO2WLTP').keyup();
//     }
//     else if ($('#BPMCO2').length) {
//         $('#BPMCO2').keyup();

//     } else if ($('#BPMCO2WLTP').length) {
//         $('#BPMCO2WLTP').keyup();
//     }
// });

// $('#BPMCO2').keyup(function () {
//     clearTimeout(timer);
//     console.log($('#datepicker4').val() != null);
//     if ($('#SoortVoertuig').val() > 0 && $('#BPMbrandstof').val() > 0 && $('#datepicker3').val() != null && $('#datepicker4').val() != null) {
//         console.log($('#datepicker3').val() != null);
//         console.log($('#datepicker4').val() != null);
//         timer = setTimeout(function () {
//             var carSelector = $('#SoortVoertuig').val();
//             var bpmbrandstof = $('#BPMbrandstof').val();
//             var datepicker1 = $('#datepicker3').val();
//             var datepicker2 = $('#datepicker4').val();
//             var co2wltp = $('#BPMCO2').val();
//             var percentage3 = $('#percentage').val();
//             if (percentage3 == '') {
//                 percentage3 = 0;
//             }
//             $.ajax({
//                 type: "POST",
//                 url: '../bpm/BPMUpdate.php',
//                 data: {
//                     SoortVoertuig: carSelector,
//                     BPMbrandstof: bpmbrandstof,
//                     BPMproductiedatum: datepicker1,
//                     BPMtenaamstellingNL: datepicker2,
//                     variabeledatumbpm: datepicker2,
//                     BPMCO2: co2wltp,
//                     percentage: percentage3,
//                 },
//                 success: function (data) {
//                     var json = JSON.parse(data)
//                     // console.log(json[0]['BPMCO2WLTP']);
//                     var floornumbruto = Math.floor(json[0]['bpmprice']);
//                     var forfaitairenum = Math.floor(json[0]['a']);
//                     var PercentageBerekening = Math.floor(json[0]['percentage']);
//                     $('#brutobpm').val(floornumbruto);
//                     $('#forfaitaire').val(forfaitairenum);
//                     $('#PercentageBerekening').val(PercentageBerekening);
//                 }
//             });

//         }, timeout);
//     }
// });

// $('#switchBTW').click(function () {
//     $('#inkoopprijs_ex_ex').change();
// });


// $('#inkoopprijs_ex_ex').change(function () {
//     var value = $(this).val();
//     var restbpm = $('#addRest_BPM').val();
//     var addOpknapkosten = $('#addOpknapkosten').val();
//     var addTransport_Buitenland = $('#addTransport_Buitenland').val();
//     var addTaxatie_Kostene = $('#addTaxatie_Kostene').val();
//     var addAfleverkosten = $('#addAfleverkosten').val();
//     var btw = $('#addBTW_21').val();
//     var addFee = $('#addFee').val();
//     var addLeges = $('#addLeges').val();
//     var transport_binnenland = $('#addTransport_Binnenland').val();
//     if (restbpm) { } else { restbpm = 0; };
//     if ($('#addBTW_21').length) { btw = value * 0.21 } else { btw = 0 };
//     if (addOpknapkosten) { } else { addOpknapkosten = 0; };
//     if (addTransport_Buitenland) { } else { addTransport_Buitenland = 0; };
//     if (addTaxatie_Kostene) { } else { addTaxatie_Kostene = 0; };
//     if (addFee) { } else { addFee = 0; };
//     if (addLeges) { } else { addLeges = 0; };
//     if (transport_binnenland) { } else { transport_binnenland = 0; };
//     if (addAfleverkosten) { } else { addAfleverkosten = 0; };
//     var feetotal = parseInt(addOpknapkosten) + parseInt(addTransport_Buitenland) + parseInt(addTaxatie_Kostene) + parseInt(addFee) + parseInt(transport_binnenland) + parseInt(addLeges) + parseInt(addAfleverkosten);
//     // var prc = value * 0.21;
//     var total = parseInt(value) + parseInt(btw) + parseInt(restbpm) + parseInt(feetotal);
//     var Verkoopprijs = parseInt(value) + parseInt(feetotal);
//     clearTimeout(timer);

//     timer = setTimeout(function () {

//         var price = $('#inkoopprijs_ex_ex').val();
//         if ($('#switchBTW').is(':checked')) {
//             var priceVAT = price * 0.21;
//         } else {
//             priceVAT = 0;
//         }
//         var totalWithVAT = parseFloat(price) + parseFloat(priceVAT);
//         var restBPM = $("#addRest_BPM").val();
//         if (!isNaN(parseFloat(restBPM))) {
//             var total = parseFloat(totalWithVAT) + parseFloat(restBPM);
//         } else {
//             var total = parseFloat(totalWithVAT);
//         }

//         $('#addVerkoopprijs_Marge_incl').val(total);
//         $('#addKosten_Totaal').val(feetotal);
//         $('#addTransport_Buitenland').val(addTransport_Buitenland);
//         $('#addOpknapkosten').val(addOpknapkosten);
//         $('#addTaxatie_Kostene').val(addTaxatie_Kostene);
//         $('#addAfleverkosten').val(addAfleverkosten);
//         $('#addBTW_21').val(btw);
//         $('#addFee').val(addFee);
//         $('#addLeges').val(addLeges);
//         $('#addTransport_Binnenland').val(transport_binnenland);
//         $('#addVerkoopprijs_Marge_Excl').val(parseFloat(total) + parseFloat(feetotal));

//         if ($('#switchBTW').is(':checked')) {
//             $('#addBTW_21no').val(parseFloat($("#inkoopprijs_ex_ex").val()) * 0.21);
//         } else {
//             $('#addBTW_21no').val(0);
//         }

//     }, timeout);
// });
// $('#addVerkoopprijs_Marge_incl').keyup(function () {
//     var value = $(this).val();
//     var restbpm = $('#addRest_BPM').val();
//     var inkoopprijs_ex_ex = $('#inkoopprijs_ex_ex').val();
//     var addOpknapkosten = $('#addOpknapkosten').val();
//     var addTransport_Buitenland = $('#addTransport_Buitenland').val();
//     var addTaxatie_Kostene = $('#addTaxatie_Kostene').val();
//     var addAfleverkosten = $('#addAfleverkosten').val();
//     var btw = $('#addBTW_21').val();
//     var addFee = $('#addFee').val();
//     var addLeges = $('#addLeges').val();
//     var transport_binnenland = $('#addTransport_Binnenland').val();
//     if (restbpm) { } else { restbpm = 0; };
//     if ($('#addBTW_21').length) { btw = value * 0.21 } else { btw = 0 };
//     if (addOpknapkosten) { } else { addOpknapkosten = 0; };
//     if (addTransport_Buitenland) { } else { addTransport_Buitenland = 0; };
//     if (addTaxatie_Kostene) { } else { addTaxatie_Kostene = 0; };
//     if (addFee) { } else { addFee = 0; };
//     if (addLeges) { } else { addLeges = 0; };
//     if (transport_binnenland) { } else { transport_binnenland = 0; };
//     if (addAfleverkosten) { } else { addAfleverkosten = 0; };
//     var feetotal = parseInt(addOpknapkosten) + parseInt(addTransport_Buitenland) + parseInt(addTaxatie_Kostene) + parseInt(addFee) + parseInt(transport_binnenland) + parseInt(addLeges) + parseInt(addAfleverkosten);
//     // var prc = value * 0.21;
//     var total = parseInt(value) - (parseInt(btw) + parseInt(restbpm) + parseInt(feetotal));
//     var Verkoopprijs = parseInt(inkoopprijs_ex_ex) + parseInt(feetotal);
//     // var inkooprijs  = parseInt(value) - parseInt(feetotal) - parseInt(restbpm) - parseInt(restbpm) - parseInt(btw) ;
//     clearTimeout(timer);

//     timer = setTimeout(function () {
//         // $('#addBTW_21').val(btw);
//         // if ($('#addBTW_21no').length) {

//         //     $('#addBTW_21no').val(parseFloat(btw));
//         // }

//         if ($('#switchBTW').is(':checked')) {
//             $('#addBTW_21no').val(parseFloat($("#inkoopprijs_ex_ex").val()) * 0.21);
//         }


//         $('#addKosten_Totaal').val(feetotal);
//         $('#addTransport_Buitenland').val(addTransport_Buitenland);
//         $('#addOpknapkosten').val(addOpknapkosten);
//         $('#addTaxatie_Kostene').val(addTaxatie_Kostene);
//         $('#addAfleverkosten').val(addAfleverkosten);
//         $('#addBTW_21').val(btw);
//         $('#addFee').val(addFee);
//         $('#addLeges').val(addLeges);
//         $('#addTransport_Binnenland').val(transport_binnenland);
//         $('#inkoopprijs_ex_ex').val(total);
//         // $('#addVerkoopprijs_Marge_Excl').val(Verkoopprijs);


//     }, timeout);
// });



// $('#addTransport_Buitenland,#addTaxatie_Kostene,#addFee,#addLeges,#addAfleverkosten,#addTransport_Binnenland,#addOpknapkosten').keyup(function () {

//     var addOpknapkosten = $('#addOpknapkosten').val();
//     var addTransport_Buitenland = $('#addTransport_Buitenland').val();
//     var addTaxatie_Kostene = $('#addTaxatie_Kostene').val();
//     var addAfleverkosten = $('#addAfleverkosten').val();
//     var addFee = $('#addFee').val();
//     var addLeges = $('#addLeges').val();
//     var transport_binnenland = $('#addTransport_Binnenland').val();
//     if (addOpknapkosten) { } else { addOpknapkosten = 0; };
//     if (addTransport_Buitenland) { } else { addTransport_Buitenland = 0; };
//     if (addTaxatie_Kostene) { } else { addTaxatie_Kostene = 0; };
//     if (addFee) { } else { addFee = 0; };
//     if (addLeges) { } else { addLeges = 0; };
//     if (transport_binnenland) { } else { transport_binnenland = 0; };
//     if (addAfleverkosten) { } else { addAfleverkosten = 0; };

//     var feetotal = parseInt(addOpknapkosten) + parseInt(addTransport_Buitenland) + parseInt(addTaxatie_Kostene) + parseInt(addFee) + parseInt(transport_binnenland) + parseInt(addLeges) + parseInt(addAfleverkosten);
//     $('#addKosten_Totaal').val(feetotal);
//     if ($('#switchPrice').is(':checked')) {

//         $('#addVerkoopprijs_Marge_incl').keyup();
//     } else {
//         $('#inkoopprijs_ex_ex').keyup();
//     }


// });


// $('#carMake').change(function () {
//     var carvalue = $(this).val();
//     const firstOptionHTML = "<option value='0'> - </option>";
//     const carModel = document.getElementById('carModel');

//     if (!carModel) {
//         return;
//     }

//     const queryString = window.location.search;
//     const parameters = new URLSearchParams(queryString);
//     const value = parameters.get('car_id');

//     if (carvalue > 0) {
//         $.ajax({
//             url: 'marge',
//             type: "POST",
//             data: 'carMakeSelect=' + carvalue,
//             success: function (data) {
//                 carModel.innerHTML = firstOptionHTML + data;
//                 $('#carModel').change();
//             },
//             error: function (XMLHttpRequest, textStatus, errorThrown) {
//                 alert("some error");
//             }
//         })
//     } else {
//         $.ajax({
//             url: 'car_start',
//             type: "GET",
//             data: 'all_car_makes=' + carvalue,
//             success: function (data) {
//                 $('#carMake').innerHTML = firstOptionHTML + data;
//                 // $('#carModel').change();
//             },
//             error: function (XMLHttpRequest, textStatus, errorThrown) {
//                 alert("some error");
//             }
//         })


//     }

//     // if (carvalue == 0) $('#carMakeInput').val('');
//     // else $('#carMakeInput').val($(this).find('option:selected').text());
// });
// $('#carMake_dip').change(function(){
//      var carvalue = $(this).val();

//      if (carvalue > 0) {

//         $.ajax({
//             url:'dossier',
//             type: "POST",
//            data:  'carMakeSelect=' + carvalue,
//             success:function(data){
//                 document.getElementById('carModel_dip').innerHTML = data;
//                 $('#carModel_dip').change();
//             }
//         })

//      }

// });
// $('#carModel_dip').change(function(){
//      var carvalue = $(this).val();

//      if (carvalue > 0) {

//         $.ajax({
//             url:'dossier',
//             type: "POST",
//            data:  'carTrimSelect=' + carvalue,
//             success:function(data){
//                 document.getElementById('carTrim_dip').innerHTML = data;
//                 $('#carTrim_dip').change();
//             }
//         })

//      }

// });

// $('#carModel').change(function () {
//     var carvalue = $(this).val();

//     if (carvalue > 0) {

//         $.ajax({
//             url: 'marge',
//             type: "POST",
//             data: 'carTrimSelect=' + carvalue,
//             success: function (data) {
//                 const carMotor = document.getElementById('carMotor');
//                 if (carMotor) {
//                     carMotor.innerHTML = data;
//                     $('#carMotor').change();
//                 }

//             },
//             error: function (request, status, error) {
//                 console.log(request.responseText);
//             }
//         })
//     }
//     if (carvalue == 0) $('#carModelInput').val('');
//     else $('#carModelInput').val($(this).find('option:selected').text());
// });
// $('#carGeneration').change(function(){
//      var carvalue = $(this).val();

//      if (carvalue > 0) {

//         $.ajax({
//             url:'marge',
//             type: "POST",
//            data:  'carSerieSelect=' + carvalue,
//             success:function(data){
//                 document.getElementById('carSerie').innerHTML = data;
//                 $('#carSerie').change();
//             }
//         })

//      }

// });
// $('#carSerie').change(function(){
//      var carvalue = $(this).val();

//      if (carvalue > 0) {

//         $.ajax({
//             url:'marge',
//             type: "POST",
//            data:  'carTrimSelect=' + carvalue,
//             success:function(data){
//                 document.getElementById('carMotor').innerHTML = data;
//                 // $('#carMotor').change();
//             }
//         })

//      }

// });
// $('#carMotor').change(function(){
//      var carvalue = $(this).val();

//      if (carvalue > 0) {

//         $.ajax({
//             url:'marge',
//             type: "POST",
//            data:  'carEquipmentSelect=' + carvalue,
//             success:function(data){
//                 document.getElementById('carEquipment').innerHTML = data;
//                 $('#carEquipment').change();
//             }
//         })

//      }

// });



$(function () {
    // $("#datepicker1").datepicker();
    $("#datepicker2").datepicker();
    $("#datepicker3").datepicker();
    $("#datepicker4").datepicker();
    $("#datepicker5").datepicker();
    $("#datepicker6").datepicker();
    $("#datepicker7").datepicker();
    $("#datepicker8").datepicker();
    $("#datepicker9").datepicker();
    $("#datepicker10").datepicker();
    $("#datepicker11").datepicker();
    $("#datepicker12").datepicker();
    $("#datepicker13").datepicker();
    $("#datepicker14").datepicker();
    $("#datepicker15").datepicker();
    $("#datepicker16").datepicker();
    $("#datepicker17").datepicker();
    $("#datepicker18").datepicker();
    $("#datepicker19").datepicker();
    $("#datepicker20").datepicker();
    $("#datepicker21").datepicker();
    $("#datepicker22").datepicker();
    $("#datepicker23").datepicker();
    $("#datepicker24").datepicker();
    $("#datepicker25").datepicker();
    $("#datepicker26").datepicker();
    $("#datepicker27").datepicker();
    $("#datepicker28").datepicker();
    $("#datepicker29").datepicker();
    $("#datepicker30").datepicker();
    $("#datepicker99").datepicker();
    $("#datepicker100").datepicker();
});
$('#datepicker1').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker2').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker3').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    orientation: "bottom",
    weekStart: 1
});
$('#datepicker4').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker5').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker6').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker7').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker8').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker9').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker10').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker11').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker12').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker13').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker14').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker15').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker16').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker17').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker18').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker19').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker20').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker21').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker22').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker23').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker24').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker25').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker26').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker27').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker28').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker29').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker99').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});
$('#datepicker100').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    weekStart: 1
});

$('#datepicker1, #datepicker2,#datepicker3,#datepicker4').change(function () {
    if ($('#datepicker1').length && $('#datepicker2').length) {
        d1 = $('#datepicker1').datepicker('getDate');
        d2 = $('#datepicker2').datepicker('getDate');
    } else {
        d1 = $('#datepicker3').datepicker('getDate');
        d2 = $('#datepicker4').datepicker('getDate');
    }

    const monthsBtwnDates = (startDate, endDate) => {
        startDate = new Date(startDate);
        endDate = new Date(endDate);
        return Math.max(
            (endDate.getFullYear() - startDate.getFullYear()) * 12 +
            endDate.getMonth() -
            startDate.getMonth(),
            0
        )
    };
    var howevermanymonths = monthsBtwnDates(d1, d2)
    if (howevermanymonths == 0) {
        percentage = 0;
    } else if (howevermanymonths == 1) {
        percentage = 8;
    } else if (howevermanymonths > 1 && howevermanymonths <= 3) {
        percentage = 8 + (howevermanymonths - 1) * 3;
    } else if (howevermanymonths > 3 && howevermanymonths <= 5) {
        percentage = 14 + (howevermanymonths - 3) * 2.5;
    } else if (howevermanymonths > 5 && howevermanymonths <= 9) {
        percentage = 19 + (howevermanymonths - 5) * 2.25;
    } else if (howevermanymonths > 9 && howevermanymonths <= 18) {
        percentage = 28 + (howevermanymonths - 9) * 1.444;
    } else if (howevermanymonths > 18 && howevermanymonths <= 30) {
        percentage = 41 + (howevermanymonths - 18) * 0.917;
    } else if (howevermanymonths > 30 && howevermanymonths <= 42) {
        percentage = 52 + (howevermanymonths - 30) * 0.833;
    } else if (howevermanymonths > 42 && howevermanymonths <= 54) {
        percentage = 62 + (howevermanymonths - 1) * 0.75;
    } else if (howevermanymonths > 54 && howevermanymonths <= 66) {
        percentage = 71 + (howevermanymonths - 1) * 0.416;
    } else if (howevermanymonths > 66 && howevermanymonths <= 78) {
        percentage = 76 + (howevermanymonths - 1) * 0.416;
    } else if (howevermanymonths > 78 && howevermanymonths <= 90) {
        percentage = 81 + (howevermanymonths - 1) * 0.333;
    } else if (howevermanymonths > 90 && howevermanymonths <= 102) {
        percentage = 85 + (howevermanymonths - 1) * 0.333;
    } else if (howevermanymonths > 102 && howevermanymonths <= 114) {
        percentage = 89 + (howevermanymonths - 1) * 0.25;
    } else {
        percentage = 92 + (howevermanymonths - 1) * 0.083;
    }
    $('#percentage').val(Math.floor(percentage) + "%");
});

$("#updaters_dossier").click(function (event) {

    var carID = $('#car_id').val();
    var dossierReferentie = $('#dossier_referentie').val();
    var vinnummer = $('#vinnummer').val();
    var carMakeDip = $('#carMake_dip').val();
    var carModelDip = $('#carModel_dip').val();
    var uitvoering = $('#uitvoering').val();
    var motor = $('#motor').val();
    var brandstof = $('#brandstof').val();
    var transmissie = $('#transmissie').val();
    var transmissieSoort = $('#transmissieSoort').val();
    var kleur = $('#kleur').val();
    var interieurKleur = $('#interieur_kleur').val();
    var co2 = $('#co2').val();
    var BPMCO2WLTP = $('#BPMCO2WLTP').val();
    var xxx = $('#xxx').val();
    var huidigeRestBpm = $('#huidige_rest_bpm').val();
    var leveringSoort = $('#levering_soort').val();
    var datepicker4 = $('#datepicker4').val();
    var kmStand = $('#km_stand').val();
    var kmVerwacht = $('#km_verwacht').val();
    var bevestigd = $('#bevestigd').val();
    var documentnr = $('#documentnr').val();
    var tenaamStellingsCode = $('#tenaam_stellings_code').val();
    var plaatAfgifteCode = $('#plaat_afgifte_code').val();
    var datepicker1 = $('#datepicker1').val();
    var huidigeDatumBPM = $('#huidigedatumbpm').val();
    var datepicker3 = $('#datepicker3').val();
    var laatsteTenaamstelling = $('#laatste_tenaamstelling').val();
    var kenteken = $('#kenteken').val();
    var tag = $('#tag').val();
    $.ajax({
        type: "POST",
        url: 'dossier',
        data: {
            updaters_dossier: carID,
            carID: carID,
            dossierReferentie: dossierReferentie,
            vinnummer: vinnummer,
            carMakeDip: carMakeDip,
            carModelDip: carModelDip,
            uitvoering: uitvoering,
            motor: motor,
            brandstof: brandstof,
            transmissie: transmissie,
            transmissieSoort: transmissieSoort,
            kleur: kleur,
            interieurKleur: interieurKleur,
            co2: co2,
            BPMCO2WLTP: BPMCO2WLTP,
            restBPMIndicatief: xxx,
            huidigeRestBpm: huidigeRestBpm,
            leveringSoort: leveringSoort,
            verwachtteLevertermijn: datepicker4,
            kmStand: kmStand,
            kmVerwacht: kmVerwacht,
            bevestigd: bevestigd,
            documentnr: documentnr,
            tenaamStellingsCode: tenaamStellingsCode,
            plaatAfgifteCode: plaatAfgifteCode,
            datumEersteToelating: datepicker1,
            huidigeDatumBPM: huidigeDatumBPM,
            eersteTenaamstellingNL: datepicker3,
            laatsteTenaamstelling: laatsteTenaamstelling,
            kenteken: kenteken,
            tag: tag,
        }
    });
    event.preventDefault();
});

$('#BPMCO2WLTP_dip,#BPMCO2_dip,#percentage_dip').keyup(function () {
    clearTimeout(timer);
    if ($('#SoortVoertuig_dip').val() > 0 && $('#BPMbrandstof_dip').val() > 0 && $('#datepicker5').val() != null && $('#datepicker6').val() != null && $('#BPMCO2WLTP_dip').val() != null) {
        // console.log($('#datepicker5').val() != null);
        // console.log($('#datepicker6').val() != null);
        timer = setTimeout(function () {
            var carSelectordip = $('#SoortVoertuig_dip').val();
            var bpmbrandstofdip = $('#BPMbrandstof_dip').val();
            var datepicker5 = $('#datepicker5').val();
            var datepicker6 = $('#datepicker6').val();
            var co2wltpdip = $('#BPMCO2WLTP_dip').val();
            var percentagedip = $('#percentage_dip').val();
            if (percentagedip == '') {
                percentagedip = 0;
            }
            $.ajax({
                type: "POST",
                url: '../bpm/BPMUpdateTest.php',
                data: {
                    SoortVoertuig: carSelectordip,
                    BPMbrandstof: bpmbrandstofdip,
                    BPMproductiedatum: datepicker5,
                    BPMtenaamstellingNL: datepicker6,
                    BPMCO2WLTP: co2wltpdip,
                    percentage: percentagedip,
                },
                success: function (data) {
                    var json = JSON.parse(data);
                    $('#gekozen_bpm_bedrag_dip').val(json[0]['bpmprice']);
                    $('#forfaitaire').val(json[0]['a']);
                    $('#PercentageBerekening').val(json[0]['percentage']);
                    if ($('#addRest_BPM').length) {
                        $('#addRest_BPM').val(json[0]['percentage']);
                    }
                }
            });

        }, timeout);
    }
});
$('#BPMCO2_dip').keyup(function () {
    clearTimeout(timer);
    if ($('#SoortVoertuig_dip').val() > 0 && $('#BPMbrandstof_dip').val() > 0 && $('#datepicker5').val() != null && $('#datepicker6').val() != null) {
        console.log($('#datepicker5').val() != null);
        console.log($('#datepicker6').val() != null);
        timer = setTimeout(function () {
            var carSelectordip = $('#SoortVoertuig_dip').val();
            var bpmbrandstofdip = $('#BPMbrandstof_dip').val();
            var datepicker5 = $('#datepicker5').val();
            var datepicker6 = $('#datepicker6').val();
            var co2wltpdip = $('#BPMCO2WLTP_dip').val();
            var percentagedip = $('#percentage_dip').val();
            if (percentagedip == '') {
                percentagedip = 0;
            }
            $.ajax({
                type: "POST",
                url: '../bpm/BPMUpdate.php',
                data: {
                    SoortVoertuig: carSelectordip,
                    BPMbrandstof: bpmbrandstofdip,
                    BPMproductiedatum: datepicker5,
                    BPMtenaamstellingNL: datepicker6,
                    BPMCO2: co2wltpdip,
                    percentage: percentagedip,
                },
                success: function (data) {
                    var json = JSON.parse(data)
                    var floornumbruto = Math.floor(json[0]['bpmprice']);
                    var forfaitairenum = Math.floor(json[0]['a']);
                    var PercentageBerekening = Math.floor(json[0]['percentage']);
                    $('#gekozen_bpm_bedrag_dip').val(floornumbruto);
                    $('#forfaitaire').val(forfaitairenum);
                    $('#PercentageBerekening').val(PercentageBerekening);
                }
            });

        }, timeout);
    }
});
$('#inkoopprijs_ex_ex_dip').keyup(function () {
    var value = $(this).val();
    var restbpm = $('#gekozen_bpm_bedrag_dip').val();
    var addOpknapkosten = $('#opknapkosten_ex_dip').val();
    var addTransport_Buitenland = $('#transport_buitenland_dip').val();
    var addTaxatie_Kostene = $('#taxatie_kosten_dip').val();
    var addAfleverkosten = $('#delivery_costs_dip').val();
    var btw = $('#btw_dip').val();
    var addFee = $('#fee_dip').val();
    var addLeges = $('#leges_dip').val();
    var transport_binnenland = $('#transport_binnenland_dip').val();
    if (restbpm) { } else { restbpm = 0; };
    if ($('#btw_marge_bepaling_dip').val() == 0) { btw = value * 0.21 } else { btw = 0 };
    if (addOpknapkosten) { } else { addOpknapkosten = 0; };
    if (addTransport_Buitenland) { } else { addTransport_Buitenland = 0; };
    if (addTaxatie_Kostene) { } else { addTaxatie_Kostene = 0; };
    if (addFee) { } else { addFee = 0; };
    if (addLeges) { } else { addLeges = 0; };
    if (transport_binnenland) { } else { transport_binnenland = 0; };
    if (addAfleverkosten) { } else { addAfleverkosten = 0; };
    var feetotal = parseInt(addOpknapkosten) + parseInt(addTransport_Buitenland) + parseInt(addTaxatie_Kostene) + parseInt(addFee) + parseInt(transport_binnenland) + parseInt(addLeges) + parseInt(addAfleverkosten);
    // var prc = value * 0.21;
    var total = parseInt(value) + parseInt(btw) + parseInt(restbpm) + parseInt(feetotal);
    var Verkoopprijs = parseInt(value) + parseInt(feetotal);
    clearTimeout(timer);

    timer = setTimeout(function () {
        $('#verkoopprijs_in_in_dip').val(total);
        $('#btw_dip').val(btw);
        $('#kosten_totaal_dip').val(feetotal);
        $('#transport_buitenland_dip').val(addTransport_Buitenland);
        $('#opknapkosten_ex_dip').val(addOpknapkosten);
        $('#taxatie_kosten_dip').val(addTaxatie_Kostene);
        $('#delivery_costs_dip').val(addAfleverkosten);
        // $('#btw_marge_bepaling_dip').val(btw);
        $('#fee_dip').val(addFee);
        $('#leges_dip').val(addLeges);
        $('#transport_binnenland_dip').val(transport_binnenland);
        $('#verkoopprijs_netto_dip').val(Verkoopprijs);


    }, timeout);
});
$('#transport_buitenland_dip,#taxatie_kosten_dip,#fee_dip,#leges_dip,#delivery_costs_dip,#transport_binnenland_dip,#opknapkosten_ex_dip').keyup(function () {

    var addOpknapkosten = $('#opknapkosten_ex_dip').val();
    var addTransport_Buitenland = $('#transport_buitenland_dip').val();
    var addTaxatie_Kostene = $('#taxatie_kosten_dip').val();
    var addAfleverkosten = $('#delivery_costs_dip').val();
    var addFee = $('#fee_dip').val();
    var addLeges = $('#leges_dip').val();
    var transport_binnenland = $('#transport_binnenland_dip').val();
    if (addOpknapkosten) { } else { addOpknapkosten = 0; };
    if (addTransport_Buitenland) { } else { addTransport_Buitenland = 0; };
    if (addTaxatie_Kostene) { } else { addTaxatie_Kostene = 0; };
    if (addFee) { } else { addFee = 0; };
    if (addLeges) { } else { addLeges = 0; };
    if (transport_binnenland) { } else { transport_binnenland = 0; };
    if (addAfleverkosten) { } else { addAfleverkosten = 0; };
    var feetotal = parseInt(addOpknapkosten) + parseInt(addTransport_Buitenland) + parseInt(addTaxatie_Kostene) + parseInt(addFee) + parseInt(transport_binnenland) + parseInt(addLeges) + parseInt(addAfleverkosten);
    $('#kosten_totaal_dip').val(feetotal);
    $('#inkoopprijs_ex_ex_dip').keyup();
});


$("#updater_Highlights").click(function (event) {

    var carID = $('#car_id').val();
    var highlightsTitle = $('#highlights_title').val();
    var highlightsText = $('#highlights_text').val();

    $.ajax({
        type: "POST",
        url: 'dossier',
        data: {
            updaters_highlights: carID,
            carID: carID,
            highlightsTitle: highlightsTitle,
            highlightsText: highlightsText
        }
    });
    event.preventDefault();
});


$("#updater_Toelichting").click(function (event) {

    var carID = $('#car_id').val();
    var toelichtingTitle = $('#toelichting_title').val();
    var toelichtingText = $('#toelichting_text').val();

    $.ajax({
        type: "POST",
        url: 'dossier',
        data: {
            updaters_toelichting: carID,
            carID: carID,
            toelichtingTitle: toelichtingTitle,
            toelichtingText: toelichtingText
        }
    });
    event.preventDefault();
});

$('#carEquipment').change(function () {
    getData();
});

function getData() {
    var equipment = $('#carEquipment').val();
    var modification = $('#carMotor').val();
    $('#carCharValue').html('-');
    $('#carOptionValue').html('-');

    var request = $.ajax({
        url: "assets/js/ajax.php",
        method: "POST",
        data: 'get_params=1&equipment=' + equipment + '&modification=' + modification,
        dataType: "json"
    });

    request.done(function (data) {
        var characteristics = '';
        var options = '';

        if (data.characteristic.length) {
            for (var i = 0, max = data.characteristic.length; i < max; i++) {
                var unit = data.characteristic[i].unit ? data.characteristic[i].unit : '';

                characteristics += '<div class="row">' +
                    '<div class="col-sm-6">' + data.characteristic[i].name + '</div>' +
                    '<div class="col-sm-6">' + data.characteristic[i].value + ' ' + unit + '</div>' +
                    '</div>';
            }

            $('#carCharValue').html(characteristics);
        }

        if (data.option.length) {
            for (var i = 0, max = data.option.length; i < max; i++) {
                options += '<div class="row">' +
                    '<div class="col-sm-6">' + data.option[i].name + '</div>' +
                    '<div class="col-sm-6">' + data.option[i].value + '</div>' +
                    '</div>';
            }

            $('#carOptionValue').html(options);
        }
    });

    request.fail(function (jqXHR, textStatus) {
        alert('Request failed: ' + textStatus);
    });
}

setTimeout(() => {

    const carFillEditButtons = document.querySelectorAll(".js-fill-car-info");
    for (const filler of carFillEditButtons) {
        filler.addEventListener("click", getCarInfo);
    }
}, 200);

window.addEventListener('DOMContentLoaded', (event) => {
    if (location.pathname == "/edit_car_calculation") {
        getCarInfo();
    }
});

function getCarInfo(e) {

    let thisId = 0;

    if (location.pathname == "/edit_car_calculation") {
        const queryString = window.location.search;
        const parameters = new URLSearchParams(queryString);
        const value = parameters.get('car_id');
        thisId = value;

    } else {
        const trigger = e.currentTarget;
        thisId = trigger.getAttribute("data-id");

    }

    const url = `${location.origin}/car_start?quick_edit=${thisId}`;

    fetch(url)
        .then(function (response) {
            // When the page is loaded convert it to text
            return response.json();
        })
        .then(function (response) {
            setEditInputFormData(response);
            const hiddenInput = document.querySelector("#editCarHiddenInput");
            hiddenInput.value = thisId;
        })
        .catch((error) => {
            console.log(error);
            return;
        });
}

function setEditInputFormData(data) {
    const editCarForm = document.querySelector("#editCarForm");

    const inputFields = editCarForm.querySelectorAll("input[data-name]");
    const selectFields = editCarForm.querySelectorAll("select[data-name]");
    for (const field of inputFields) {
        const fieldName = field.getAttribute("data-name");
        field.value = data[fieldName];
    }
    let opt;
    for (const field of selectFields) {
        const fieldName = field.getAttribute("data-name");
        opt = document.createElement("option");
        opt.value = data[fieldName];
        opt.selected = true;
        opt.innerHTML = data[fieldName];
        field.append(opt);
    }
}


function setEditFormSelectsData(data) {

    const editCarForm = document.querySelector("#editCarForm");
    const editCarSelects = editCarForm.querySelectorAll("select");

    for (const field of editCarSelects) {
        const fieldName = field.getAttribute("data-name");
        if (fieldName == "transmissieSoort") {
            field.value = `${data[fieldName]}|${data.transmissie}`;
        } else {
            field.value = data[fieldName];
        }

        if (fieldName == "car_merk") {

        }

    }

}

const sendFormButtons = document.querySelectorAll(".send-form");
for (sender of sendFormButtons) {
    sender.addEventListener("click", (e) => {
        const trigger = e.currentTarget;
        const thisForm = trigger.closest("form");
        // thisForm.validate();
        thisForm.submit();
    })
}



function addResumeEditCarHeader() {

    const resumeFillers = document.querySelectorAll(".js-resume-fill");
    let fillerText = "";
    let completeText = "";

    for (const filler of resumeFillers) {

        if (filler.tagName == "SELECT") {
            if (filler.options[filler.selectedIndex]) {
                fillerText = filler.options[filler.selectedIndex].innerText;
            } else {
                fillerText = "";
            }

        } else {
            fillerText = filler.value;
        }

        completeText += fillerText + " ";

        const resumeFieldId = filler.getAttribute("data-name");
        const resumeField = document.querySelector(`#${resumeFieldId}`);

        resumeField.innerHTML = fillerText;
    }

    document.querySelector("#referentieHiddenInput").value = completeText;
}

// $('#datepicker2, #datepicker3').datepicker({
//     format: 'mm/dd/yyyy',
// }).datepicker("setDate", 'now');

$('.js-example-basic-multiple').select2();



function carMakeAjaxFill() {

    window.addEventListener('DOMContentLoaded', (event) => {

        const createBrandPage = document.querySelector("#createBrandPage");

        if (!createBrandPage) {
            return;
        }



    });
}


$('.JSfunc').click(function () {

    var carvalue = 1; // car
    const carMake = document.querySelector(`.${this.id}`);

    if (!carMake) {
        return;
    }
    if (carvalue > 0) {
        $.ajax({
            url: 'create_car',
            type: "POST",
            data: 'carTypeSelect=' + carvalue,
            success: function (data) {
                const firstOptionHTML = "<option value='0'> - </option>";
                carMake.innerHTML = firstOptionHTML + data;
                $('.JSfunc').change();
            }
        })

    }

});


/* $('#carMake, #carMakeFuel, #carMakeMotor,#carMakeUit').change(function () {
    var carvalue = $(this).val();
    const firstOptionHTML = "<option value='0'> - </option>";
    
    if (this.id == "carMakeFuel") {
        var carModel = document.getElementById('carModelFuel');
    } else if (this.id == "carMakeMotor") {
        var carModel = document.getElementById('carModelMotor');
    } else if (this.id == "carMakeUit") {
        var carModel = document.getElementById('carModelUit');
    } else {
        var carModel = document.getElementById('carModel');
    }


    if (!carModel) {
        return;
    }

    if (carvalue > 0) {

        $.ajax({
            url: 'marge',
            type: "POST",
            data: 'carMakeSelect=' + carvalue,
            success: function (data) {
                carModel.innerHTML = firstOptionHTML + data;
            }
        })
    } else {
        document.getElementById('carModel').innerHTML = firstOptionHTML;
    }

    if (carvalue == 0) $('#carMakeInput').val('');
    else $('#carMakeInput').val($(this).find('option:selected').text());
}); */

// $('#carModelFuel, #carModelUit').change(function () {
//     var carvalue = $(this).val();
//     if(this.id == "carModelUit"){
//         var carMotor = document.getElementById('carMotorUit');
//     } else{
//         var carMotor = document.getElementById('carMotor');
//     }

//     if (!carMotor) { return; }
//     if (carMotor) {

//             $.ajax({
//                 url: 'marge',
//                 type: "POST",
//                 data: 'carModelSelectMot=' + carvalue,
//                 success: function (data) {
//                     carMotor.innerHTML = data;
//                 }
//             })
//         }

// });


/* ; (function (window, document) {

    const carMake = document.querySelector('#carMake');

    if(!carMake) {
        return;
    }

    const queryString = window.location.search;
    const parameters = new URLSearchParams(queryString);
    const value = parameters.get('car_id');

    if (!value) {

        window.addEventListener('DOMContentLoaded', (event) => {
            carMake.value = 0;
            carMake.dispatchEvent(new Event('change'));
        });
    }

    const carMotor = document.querySelector('.js-car-motor');
    const carFuel = document.querySelector('.js-car-fuel');


    carMake.addEventListener("change", (e) => {
        const trigger = e.currentTarget;

        if (trigger.value == 0) { // If not choosen car make
            const fetchAllMakes = `${location.origin}/car_start?all_car_makes=0`;
            fetch(fetchAllMakes)
                .then(function (response) {
                    return response.json();
                })
                .then(function (response) {
                    // console.log(response);
                    fillSelectFromJson("#carMake", response, "cmake_name", "cmake_id");
                })
                .catch((error) => {
                    console.log(error);
                    return;
                });
        }

        //FETCH MOTORS 
        const urlFetchMotors = `${location.origin}/create_make_new?make_id_get_motors=${e.currentTarget.value}`;
        fetch(urlFetchMotors)
            .then(function (response) {
                return response.json();
            })
            .then(function (response) {
                fillSelectFromJson(".js-car-motor", response, "cmotor_name", "cmotor_id");
            })
            .catch((error) => {
                console.log(error);
                return;
            });


        // FETCH Uitvoering
        const urlFetchUitvoering = `${location.origin}/create_make_new?make_id_get_uitvoering=${e.currentTarget.value}`;


        fetch(urlFetchUitvoering)
            .then(function (response) {
                return response.json();
            })
            .then(function (response) {
                fillSelectFromJson("#carUitvoering", response, "cmu_name", "cmu_make_id");
            })
            .catch((error) => {
                console.log(error);
                return;
            });

        // Fetch Fuel
        let fuelHTML = `<option value="">-</option>
        <option value="1">Gasoline</option>
        <option value="2">Diesel</option>
        <option value="3">Hybrid</option>
        <option value="4">Electric</option>
        <option value="5">LPG</option>
        <option value="6">Natural Gas</option>
        <option value="7">Alcohol</option>
        <option value="8">Cryogenic</option>
        <option value="9">Hydrogen</option>
        `;

        const selectedMakeId = carMake.value;

        if(selectedMakeId !== '0') {
            let urlGetMotorsByFuel = `${location.origin}/create_make_new?fuel_id_get_motors=${trigger.value}&car_make_id=${selectedMakeId}`;

            const motorSelect = document.querySelector("#carMotor");
            const motorSelVal = motorSelect.value;

            if (trigger.value == "") {
                urlGetMotorsByFuel = `${location.origin}/create_make_new?make_id_get_motors=${selectedMakeId}`;
            }

            fetch(urlGetMotorsByFuel)
                .then(function (response) {
                    return response.json();
                })
                .then(function (response) {
                    fillSelectFromJson(".js-car-motor", response, "cmotor_name", "cmotor_id");
                    motorSelect.value = motorSelVal;
                })
                .catch((error) => {
                    console.log(error);
                    return;
                });

            carFuel.innerHTML = fuelHTML;
        }
    });


    [carMotor, carFuel].map(element => element.addEventListener("change", (e) => {
        const trigger = e.currentTarget;

        if (carMake.value == "" || carMake.value == 0) {
            alert("Car Make select is required");
        }

        if (trigger.id == "carMotor") {

            const fuelSelect = document.querySelector(".js-car-fuel");
            const fuelSelectVal = fuelSelect.value;

            if (trigger.value == "") {
                let fuelHTML = `<option value="">-</option>
                <option value="1">Gasoline</option>
                <option value="2">Diesel</option>
                <option value="3">Hybrid</option>
                <option value="4">Electric</option>
                <option value="5">LPG</option>
                <option value="6">Natural Gas</option>
                <option value="7">Alcohol</option>
                <option value="8">Cryogenic</option>
                <option value="9">Hydrogen</option>
                `;

                carFuel.dispatchEvent(new Event('change'));

                const selectedMakeId = document.querySelector("#carMake").value;
                let urlGetMotorsByFuel = `${location.origin}/create_make_new?fuel_id_get_motors=${trigger.value}&car_make_id=${selectedMakeId}`;

                const motorSelect = document.querySelector("#carMotor");
                const motorSelVal = motorSelect.value;

                if (trigger.value == "") {
                    urlGetMotorsByFuel = `${location.origin}/create_make_new?make_id_get_motors=${selectedMakeId}`;
                }

                fetch(urlGetMotorsByFuel)
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (response) {
                        fillSelectFromJson(".js-car-motor", response, "cmotor_name", "cmotor_id");
                        motorSelect.value = motorSelVal;
                    })
                    .catch((error) => {
                        console.log(error);
                        return;
                    });

                carFuel.innerHTML = fuelHTML;
                return;
            }

            const urlGetFuels = `${location.origin}/create_make_new?motor_id_get_fuel=${trigger.value}`;

            fetch(urlGetFuels)
                .then(function (response) {
                    return response.json();
                })
                .then(function (response) {
                    fillSelectFromJson(".js-car-fuel", response, "conversion_name", "cmotor_fuel_id");
                    fuelSelect.value = fuelSelectVal;

                })
                .catch((error) => {
                    console.log(error);
                    return;
                });
        } else { // ONCHANGE #carFuel
            const selectedMakeId = document.querySelector("#carMake").value;
            let urlGetMotorsByFuel = `${location.origin}/create_make_new?fuel_id_get_motors=${trigger.value}&car_make_id=${selectedMakeId}`;

            const motorSelect = document.querySelector("#carMotor");
            const motorSelVal = motorSelect.value;

            if (trigger.value == "") {
                urlGetMotorsByFuel = `${location.origin}/create_make_new?make_id_get_motors=${selectedMakeId}`

            }

            fetch(urlGetMotorsByFuel)
                .then(function (response) {
                    return response.json();
                })
                .then(function (response) {
                    fillSelectFromJson(".js-car-motor", response, "cmotor_name", "cmotor_id");
                    motorSelect.value = motorSelVal;
                })
                .catch((error) => {
                    console.log(error);
                    return;
                });
        }
    }));



})(window, document); */

; (function (window, doc) {

    const carMake = document.querySelector('#carMake');

    if (!carMake)
        return;

    const queryString = window.location.search;
    const parameters = new URLSearchParams(queryString);
    const car_id = parameters.get('car_id');

    if (!car_id) {
        window.addEventListener('DOMContentLoaded', (event) => {
            carMake.value = 0;
            carMake.dispatchEvent(new Event('change'));
        });
    }
    else {
        window.addEventListener('DOMContentLoaded', (event) => {
            carMake.dispatchEvent(new Event('change'));
        });
    }

    const carFuel = document.getElementById('BPMbrandstof');
    const carMotor = document.getElementById('carMotor');

    carMake.addEventListener("change", (e) => {
        const trigger = e.currentTarget;

        fetchCarItems(`${location.origin}/car_start?all_car_makes=0`, "#carMake", "cmake_name", "cmake_id");

        // FETCH Uitvoering
        fetchCarItems(`${location.origin}/car_start?make_id_get_uitvoering=${trigger.value}`, "#carUitvoering", "cmu_name", "cmu_id");
        // FETCH Models
        fetchCarItems(`${location.origin}/car_start?make_id_get_models=${trigger.value}`, "#carModel", "cmodel_name", "cmodel_id");

        //FETCH MOTORS 
        fetchCarItems(`${location.origin}/car_start?make_id_get_motors=${trigger.value}`, "#carMotor", "cmotor_name", "cmotor_id");

        if (trigger.value !== 0) {
            carFuel.dispatchEvent(new Event('change'));
            carMotor.dispatchEvent(new Event('change'));
        }
        else {
            resetSelectElement(carFuel);
            resetSelectElement(carMotor);
        }
    });

    carFuel.addEventListener("change", (e) => {
        if (carMake.value == 0) {
            resetSelectElement(e.currentTarget);
            return;
        }
        if (e.currentTarget.value == 0) {
            // FETCH All Fuel
            fetchCarItems(`${location.origin}/car_start?get_all_fuels`, "#BPMbrandstof", "description", "conversion_id");

            //FETCH MOTORS 
            fetchCarItems(`${location.origin}/car_start?make_id_get_motors=${carMake.value}`, "#carMotor", "cmotor_name", "cmotor_id");
        }
        else {
            fetchCarItems(`${location.origin}/car_start?fuel_id_get_motors=${e.currentTarget.value}&car_make_id=${carMake.value}`, "#carMotor", "cmotor_name", "cmotor_id");
        }
    });

    carMotor.addEventListener("change", (e) => {
        if (carMake.value == 0) {
            resetSelectElement(e.currentTarget);
            return;
        }
        if (e.currentTarget.value == 0) {
            // FETCH All Fuel
            fetchCarItems(`${location.origin}/car_start?get_all_fuels`, "#BPMbrandstof", "description", "conversion_id");
        }
        else {
            fetchCarItems(`${location.origin}/car_start?get_fuel_by_motor=${e.currentTarget.value}`, "#BPMbrandstof", "description", "cmotor_fuel_id");
        }
    });

    function fetchCarItems(url, fill_id, opt_text, opt_val) {
        fetch(url)
            .then(function (response) {
                return response.json();
            })
            .then(function (response) {
                fillSelectFromJson(fill_id, response, opt_text, opt_val);
            })
            .catch((error) => {
                console.log(error);
                return;
            });
    }

    function resetSelectElement(el) {
        el.innerHTML = '';
        el.appendChild(Object.assign(
            document.createElement("option"), {
            "text": "-",
            "value": "0",
            "selected": "true"
        }));
    }

    function fillSelectFromJson(selector, jsonData, selectTextProp, selectValProp, changeInnerHTML = false) {

        let emptyOption = Object.assign(
            document.createElement("option"), {
            "text": "-",
            "value": "0"
        });

        const selectEl = document.querySelector(`${selector}`);

        const selectedOption = selectEl.value;

        selectEl.innerHTML = "";
        selectEl.appendChild(emptyOption);

        for (let key in jsonData) {
            if (!jsonData.hasOwnProperty(key)) {
                continue;
            }
            let option = Object.assign(
                document.createElement("option"), {
                "text": jsonData[key][selectTextProp],
                "value": jsonData[key][selectValProp]
            });

            if (selectedOption && option.value == selectedOption)
                option.selected = true;

            selectEl.appendChild(option)
        }
    }

})(window, document);

// TABS SAVE STATS
; (function (window, doc) {

    const bootstrapTabs = doc.querySelectorAll("#createMake .nav-tabs .nav-item");

    if (!bootstrapTabs) {
        return;
    }

    for (let tab of bootstrapTabs) {
        tab.addEventListener("click", (e) => {
            const trigger = e.currentTarget; // triger is the li element
            const navLinkHref = trigger.querySelector(".nav-link").getAttribute("href");
            const cookieVal = navLinkHref.replace("#", "");
            document.cookie = `active_tab=${cookieVal}; path=/`;

        });
    }
})(window, document);

$('.js-example-basic-multiple').select2();
$('.selectpicker').selectpicker();

$("#languageselect").change(function () {
    var language = $(this).val();
    $.ajax({
        type: "POST",
        url: 'home',
        data: 'changes=' + language,
        success: function () {
            location.reload();
        }
    });
});

// MENU ACTIVE PAGES HANDLE
; (function (window, doc) {
    const sidebar = doc.querySelector("#sidebar");

    if (!sidebar) {
        return;
    }

    const pathName = window.location.pathname.replace("/", "");
    const activeLiEl = document.querySelector(`.nav [href="${pathName}"]`);
    activeLiEl.classList.add("active");


})(window, document);

$(document).ready(function () {
    const kpwInput = $('input[name=power_kpw]');
    const cubicInput = $('input[name=cubic_capacity]');

    if (!kpwInput) {
        return;
    }

    kpwInput.on('change', (e) => {
        const val = kpwInput.val();
        if (!isNaN(val)) {
            cubicInput.val(Math.round(val * 1.362));
        }

    });
    cubicInput.on('change', (e) => {
        const val = cubicInput.val();
        if (!isNaN(val)) {
            kpwInput.val(Math.round(val / 1.362));
        }

    });

    const vinInput = $('input[name=vin]');

    vinInput.keyup(delay(function (e) {
        const val = vinInput.val();
        if (val.length >= 4) {
            $('input[name=meldcode]').val(val.slice(-4));
        } else {
            $('input[name=meldcode]').val("");
        }

    }, 500));
});

; (function (window, doc) {
    const uploadElements = document.querySelectorAll('.js-upload input[type="file"]');

    if (!uploadElements) {
        return;
    }

    for (let el of uploadElements) {

        el.addEventListener("change", uploadFileFn);
        el.addEventListener("dragenter", highlightUploadFile);
        el.addEventListener("drop", stopHighlightUploadFile);
        el.addEventListener("dragleave", stopHighlightUploadFile);

    }

    async function uploadFileFn(e) {
        const trigger = e.currentTarget;
        let files = [];
        let allowedFormats = [];
        let allowedSizeMb = 0;
        let allowedSizeBytes = 0;
        const formData = new FormData();

        if (trigger.files) {
            files = trigger.files;
        }

        function getLastImagePos() {
            const images = $(`img[data-imagepos]:not([data-imagepos='0'])`);
            var num = $(images).map(function () {
                return $(this).data('imagepos');
            }).get();//get all data values in an array

            var highest = Math.max.apply(Math, num);//find the highest value from them
            return $(images).filter(function () {
                return $(this).data('imagepos') == highest;//return the highest div
            }).data('imagepos') || 0;//append to that div
        }

        //Allowed files depends on file or image
        if (trigger.id == "uploadCarImage") {
            formData.append("allowed", "image");
            formData.append("last_imagepos", getLastImagePos() + 1);
            allowedFormats = ['image/jpeg', 'image/png'];
            allowedSizeMb = 5;
        } else { // If document 
            formData.append("allowed", "documents");
            allowedFormats = ["application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"]
            allowedSizeMb = 10;

        }

        allowedSizeBytes = allowedSizeMb * 1048576; // 1048576 = 1MB

        for (let file of files) {
            //Check allowed size 
            if (file.size > allowedSizeBytes) {
                alert(`There is a file that is bigger then allowed ${allowedSizeMb}MB`);
                trigger.value = "";
                return;
            }

            if (!allowedFormats.includes(file.type)) {
                const stringFromFormats = allowedFormats.join();
                alert(`There is a file type that is not allowed ${stringFromFormats}`);
                trigger.value = "";
                return;
            }

            const d = new Date();
            let timeStamp = d.getTime();
            let fileName = `${file.name}_${timeStamp}`;
            formData.append(fileName, file);
        }

        $.ajax({
            url: `${location.origin}/car_start`,
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {

                let type = "";
                if (allowedFormats.includes("application/pdf")) {
                    type = "files";
                } else {
                    type = "photos";
                }


                displayUploadedFiles(JSON.parse(response), type);
            },
        });

        // // Make a POST request
        // fetch(`${location.origin}/car_start`, {
        //     method: 'POST',
        //     data: formData,
        //     contentType: false,
        //     processData: false
        // }).then(function (response) {
        //     if (response.ok) {
        //         console.log(response);
        //         return response.json();
        //     }
        //     return Promise.reject(response);
        // }).then(function (data) {
        //     console.log(data);
        // }).catch(function (error) {
        //     console.warn('Something went wrong.', error);
        // });

    }

    function highlightUploadFile(e) {

        const trigger = e.currentTarget;
        const uploadFileContainer = trigger.closest(".upload-file");
        uploadFileContainer.classList.add("highlighted");
    }

    function stopHighlightUploadFile(e) {
        const trigger = e.currentTarget;
        const uploadFileContainer = trigger.closest(".upload-file");
        uploadFileContainer.classList.remove("highlighted");
    }

    function displayUploadedFiles(response, type) {
        const createEditCarForm = document.querySelector("#createEditCarForm");
        if (type == "files") {

            const documentsContainer = document.querySelector(".show-documents");

            for (let key in response) {
                let arrLink = response[key].location.split('/');


                let documentElement = Object.assign(
                    document.createElement("a"), {
                    "href": response[key].location,
                    "innerText": arrLink[arrLink.length - 1]
                });

                let hiddenInput = Object.assign(
                    document.createElement("input"), {
                    "type": "hidden",
                    "name": "car_documents[]",
                    "value": response[key].location
                });
                documentsContainer.appendChild(documentElement);
                documentsContainer.appendChild(document.createElement("br"));
                createEditCarForm.appendChild(hiddenInput);
            }


        } else { // IF IMAGES 
            let img, span, carImageDiv, imageColDiv;

            for (let key in response) {
                // Create div for image
                imageColDiv = Object.assign(
                    document.createElement("div"), {
                    "className": "col-12 col-md-3 car-image-col"
                });
                // Create div for image
                carImageDiv = Object.assign(
                    document.createElement("div"), {
                    "className": "car-image"
                });

                const car_id = $('[name="car_id"]').val();
                const draggable = (car_id) ? false : true;

                // Create the image object
                img = Object.assign(
                    document.createElement("img"), {
                    "src": response[key].location,
                    "draggable": draggable
                });
                img.setAttribute("data-imagepos", response[key].pos);
                if (draggable) {
                    img.setAttribute("ondragstart", 'onImageDrag(event)');
                    img.setAttribute("ondragover", 'allowDrop(event)');
                    img.setAttribute("ondrop", 'onImageDrop(event)');
                }

                // Push image into div
                carImageDiv.prepend(img);
                // Push icons into div

                span = Object.assign(
                    document.createElement("span"), {
                    "className": "ti-trash"
                });
                carImageDiv.prepend(span);
                span.addEventListener('click', onTrashBtnClick);

                imageColDiv.prepend(carImageDiv);
                // Push div into column
                document.querySelector(".car-images-row").prepend(imageColDiv);

                // Push hidden input of image to be uploaded
                let hiddenInput = Object.assign(
                    document.createElement("input"), {
                    "type": "hidden",
                    "name": "car_images[]",
                    "value": response[key].location + '|' + response[key].pos
                });
                hiddenInput.setAttribute('data-pos', response[key].pos);
                createEditCarForm.appendChild(hiddenInput);
            }

            updateRecentImages();
        }
    }

})(window, document);

function updateRecentImages() {
    const origin = location.origin;

    clearRecentImages();
    insertRecentImages();
}

function clearRecentImages() {
    const recentImagesCol = document.querySelector('.recent-images-col .car-image-col');
    for (let i = recentImagesCol.childElementCount - 1; i >= 0; i--) {
        recentImagesCol.removeChild(recentImagesCol.children[i]);
    }
}

function insertRecentImages() {
    let num = 0;
    let img;
    document.querySelectorAll('.car-images-row .car-image-col .car-image').forEach(car_image => {
        if (num >= 5) {
            return;
        }

        img = car_image.children[car_image.childElementCount - 1];
        insertRecentImage(img.src.replace(origin, ''), img.getAttribute('data-imagepos'), (img.getAttribute('draggable') == 'true' ? true : false));
        num++;
    });

    if (num < 5) {
        for (let i = 0; i < 5 - num; i++) {
            insertRecentImage();
        }
    }
}

function insertRecentImage(src, pos, draggable) {
    const recentImgCol = document.querySelector('.recent-images-col .car-image-col');
    let img;

    // Create div for image
    let carImageDiv = Object.assign(
        document.createElement("div"), {
        "className": "car-image"
    });

    if (src) {
        // Create the image object
        img = Object.assign(
            document.createElement("img"), {
            "src": src,
            "draggable": draggable
        });
        img.setAttribute("data-recent-imagepos", pos);
        if (draggable) {
            img.setAttribute("ondragstart", 'onImageDrag(event)');
            img.setAttribute("ondragover", 'allowDrop(event)');
            img.setAttribute("ondrop", 'onImageDrop(event)');
        }
    }
    else {
        // Create empty image object
        img = Object.assign(
            document.createElement("img"), {
            "src": '/assets/images/no-image.gif'
        });
    }

    // Push image into div
    carImageDiv.prepend(img);
    // Push icons into div
    /* carImageDiv.prepend(Object.assign(
        document.createElement("span"), {
        "className": "ti-arrow-down"
    }));
    carImageDiv.prepend(Object.assign(
        document.createElement("span"), {
        "className": "ti-arrow-up"
    }));

    let span = Object.assign(
        document.createElement("span"), {
        "className": "ti-trash"
    })
    carImageDiv.prepend(span); */

    recentImgCol.append(carImageDiv);
}

function onImageDrag(e) {
    e.dataTransfer.setData("Text", e.target.getAttribute('data-imagepos') || e.target.getAttribute('data-recent-imagepos'));
}

function allowDrop(e) {
    e.preventDefault();
}

function onImageDrop(e) {
    e.preventDefault();

    const origin = location.origin + '/';

    const toImagePos = e.target.getAttribute('data-imagepos') || e.target.getAttribute('data-recent-imagepos');
    const toImage = document.querySelector(`img[data-imagepos="${toImagePos}"]`);
    const toImageSrc = toImage.src.replace(origin, '');

    const fromImagePos = e.dataTransfer.getData("Text");
    const fromImage = document.querySelector(`img[data-imagepos="${fromImagePos}"]`);
    if (!fromImage)
        return;
    const fromImageSrc = fromImage.src.replace(origin, '');

    const tohiddenInputImage = document.querySelector(`[name="car_images[]"][data-pos="${toImagePos}"]`);
    const fromhiddenInputImage = document.querySelector(`[name="car_images[]"][data-pos="${fromImagePos}"]`);

    fromImage.setAttribute('src', toImageSrc);
    toImage.setAttribute('src', fromImageSrc);

    const car_id = $('[name="car_id"]').val();

    if (car_id) {
        const formData = new FormData();
        formData.append('move_image', 'true');
        formData.append('car_id', car_id);
        formData.append('fromsrc', fromImageSrc);
        formData.append('frompos', fromImagePos);
        formData.append('tosrc', toImageSrc);
        formData.append('topos', toImagePos);

        $.ajax({
            url: `${location.origin}/car_start`,
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
        });
    }
    else {
        tohiddenInputImage.setAttribute('value', (fromImageSrc + '|' + toImagePos));
        fromhiddenInputImage.setAttribute('value', (toImageSrc + '|' + fromImagePos));
    }

    const recentImage = document.querySelector(`img[data-recent-imagepos="${fromImagePos}"]`) || document.querySelector(`img[data-recent-imagepos="${toImagePos}"]`);

    if (recentImage) {
        clearRecentImages();
        insertRecentImages();
    }
}

; (function (window, doc) {
    const trashBtns = doc.querySelectorAll('.car-image > .ti-trash');

    if (!trashBtns)
        return;

    trashBtns.forEach((btn) => {
        btn.addEventListener('click', onTrashBtnClick);
    });

})(window, document);

function onTrashBtnClick(e) {
    const carImageDiv = e.target.parentNode;
    const carImagePos = carImageDiv.children[carImageDiv.childElementCount - 1].getAttribute('data-imagepos') || carImageDiv.children[carImageDiv.childElementCount - 1].getAttribute('data-recent-imagepos');

    carImageDiv.parentElement.parentElement.removeChild(carImageDiv.parentElement);

    const moved = changePositionsAbove(carImagePos);
    saveNewImagePositions(carImagePos, moved);

    clearRecentImages();
    insertRecentImages();
}

function changePositionsAbove(removedPos) {
    const images = document.querySelectorAll('img[data-imagepos]');
    let pos, moved = 0;
    images.forEach(img => {
        pos = img.getAttribute('data-imagepos');
        if (pos > removedPos) {
            img.setAttribute('data-imagepos', img.getAttribute('data-imagepos') - 1);
            moved++;
        }
    });
    return moved;
}

function saveNewImagePositions(removedPos, moved) {
    const formData = new FormData();
    formData.append('removed_image', removedPos);
    formData.append('moved_images', moved);

    $.ajax({
        url: `${location.origin}/car_start`,
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
    });

    const arrHiddenImputImages = Array.from(document.querySelectorAll(`[name="car_images[]"]`));
    let pos;
    arrHiddenImputImages.forEach(input => {
        pos = input.getAttribute('data-pos');
        if (pos == removedPos) {
            input.parentElement.removeChild(input);
        } else if (pos > removedPos) {
            src = input.value.split('|')[0];
            input.setAttribute('data-pos', pos - 1);
            input.value = src + '|' + (pos - 1);
        }
    });
}

; (function (window, doc) {
    const calculationChangers = doc.querySelectorAll(".js-calc-input");

    if (!calculationChangers || !calculationChangers.length) {
        return;
    }

    const v = (id) => {
        return parseFloat($(`#${id}`).val()
            .replace(",", "") // remove thousand before sum
            .replace("€ ", "")) // remove euro sign before sum
            || 0;
    }
    const set = (id, num) => {
        // Add thousand separator
        const number = num.toFixed(2).replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
        // Add Euro sign
        const val = `€ ${number}`
        return $(`#${id}`).val(val);
    }

    const calcFromTotal = doc.querySelector(".js-calc-from-total");
    const vatCheckedEl = doc.querySelector("#switchvat");
    const margeCheckedEl = doc.querySelector("#switchmargin");
    const vatPercentage = doc.querySelector("#vatPercentage");
    const lockedPrice = doc.querySelector("#lockSalesPriceCh");
    const bpmPercentage = doc.querySelector("#percentage");
    const totalAll = doc.querySelector("#totalAll");

    const vatMarginTexts = [
        { id: '#priceNetoText', marge: 'Purchase Price margin', vat: 'Purchase Price netto (ex/ex)' },
        { id: '#totalPriceNetoText', marge: 'Total Purchase Price margin', vat: 'Total Purchase Price netto' },
        { id: '#salesPriceNetoText', marge: 'Sales Price netto (margin)', vat: 'Sales Price netto (ex/ex)' },
        { id: '#addBTWText', marge: 'VAT / BTW on Costs and Fee', vat: 'VAT / BTW (21%)' },
        { id: '#addVerkooText', marge: 'Sales Price margin', vat: 'Sales Price incl. VAT / BTW' },
        { id: '#salesPriceTotalText', marge: 'Sales Price Total (margin)', vat: 'Sales Price Total (in/in)' }
    ];

    lockedPrice.addEventListener("change", (e) => {
        doc.querySelector("#totalAll").readOnly = !(e.currentTarget.checked);
        doc.querySelector("#addFee").readOnly = e.currentTarget.checked;
    })

    // const transl = getTranslations("car_start");
    // console.log(getTranslations("car_start"));

    if (vatCheckedEl.checked) {
        vatMarginTexts.forEach(el => $(el.id).html(el.vat));
    } else {
        vatMarginTexts.forEach(el => $(el.id).html(el.marge));
    }

    // Add event listeners 
    vatCheckedEl.addEventListener("change", changeVatFn);
    margeCheckedEl.addEventListener("change", changeMargeFn);
    calcFromTotal.addEventListener("change", calcFromTotalFn);
    vatPercentage.addEventListener("change", calcValues);


    for (let changer of calculationChangers) {
        changer.addEventListener("change", calcValues);
        changer.addEventListener("focusin", removeCurrencyFormat);
        changer.addEventListener("focusout", addCurrencyFormat);
    }

    totalAll.addEventListener("focusin", removeCurrencyFormat);
    totalAll.addEventListener("focusout", addCurrencyFormat);

    bpmPercentage.addEventListener("focusin", removePercantageFormat);
    bpmPercentage.addEventListener("focusout", calculateBpmBrutto);



    function calcFromTotalFn(e, calledFromRestBpm) {
        const trigger = e.currentTarget;
        let diff;
        if (trigger.id === 'addRest_BPM' && lockedPrice.checked) {
            const oldBpmVal = trigger.getAttribute('data-old-val') || 0;
            const newBpmVal = trigger.value;
            diff = newBpmVal - oldBpmVal;
        }
        else {
            const lastSalesPriceTotal = v('addVerkoopprijs_Marge_incl') + v('addRest_BPM') + v('addLeges');
            diff = lastSalesPriceTotal - v('totalAll');
        }

        // If count from total & is margin & locked execute and don't enter calcValues()
        if (lockedPrice.checked) {

            if (margeCheckedEl.checked) {

                calcFromTotalMarginLock(e);
            } else {

                calcFromTotalVatLock(e);
            }

            return;
        }
        const deductFee = diff / (v('vatPercentage') / 100);
        const deductVat = diff - deductFee;
        const fee = v('addFee') - deductFee;
        const vat = v('addBTW_21') - deductVat;
        set('addFee', fee);
        set('addBTW_21', vat);

        if (!calledFromRestBpm) {
            calcValues(e);
        }
    }

    function calcFromTotalMarginLock(e) {
        set('addVerkoopprijs_Marge_incl', v('totalAll') - v('addRest_BPM') - v('addLeges'));
        set('totalCostsFee', ((v('addVerkoopprijs_Marge_incl') - v('inkoopprijs_ex_ex')) / (1 + (v('vatPercentage') / 100))) - v('addAfleverkosten'))
        set('addBTW_21', (v('totalCostsFee') + v('addAfleverkosten')) * (v('vatPercentage') / 100));
        set('totalPriceFee', v('addVerkoopprijs_Marge_incl') - v('addBTW_21'));
        set('addFee', v('totalCostsFee') - (v('addOpknapkosten') + v('addTransport_Buitenland') + v('addTransport_Binnenland') + v('costTaxation') + v('recyclingFee')));
    }


    function calcFromTotalVatLock(e) {
        set('addVerkoopprijs_Marge_incl', v('totalAll') - v('addRest_BPM') - v('addLeges'));
        set('addBTW_21', v('addVerkoopprijs_Marge_incl') / (1 + (v('vatPercentage') / 100)) * (v('vatPercentage') / 100));
        set('totalPriceFee', v('addVerkoopprijs_Marge_incl') - v('addBTW_21'));
        set('totalCostsFee', ((v('totalPriceFee') - v('totalPriceNettoSuppluier'))));
        set('addFee', v('totalCostsFee') - (v('addOpknapkosten') + v('addTransport_Buitenland') + v('addTransport_Binnenland') + v('costTaxation') + v('recyclingFee')));
    }

    function calcValues(e) {

        const trigger = e.currentTarget;
        const lockedPrice = doc.querySelector("#lockSalesPriceCh");

        if (trigger.id === 'addRest_BPM') {
            if (lockedPrice.checked) {
                calcFromTotalFn(e, true);
                set('totalCostsFee', v('addOpknapkosten') + v('recyclingFee') + v('addTransport_Buitenland') + v('addTransport_Binnenland') + v('costTaxation') + v('addFee'));
                set('totalPriceFee', v('totalPriceNettoSuppluier') + v('totalCostsFee'));
                set('addVerkoopprijs_Marge_incl', v('totalPriceFee') + v('addBTW_21'));
            }
            else {
                set('totalAll', v('addRest_BPM') + v('addVerkoopprijs_Marge_incl') + v('addLeges'));
            }

            trigger.setAttribute('data-old-val', trigger.value);
            return;
        }

        if (trigger.id === 'addLeges') {
            if (lockedPrice.checked) {
                calcFromTotalFn(e, true);
                set('totalCostsFee', v('addOpknapkosten') + v('recyclingFee') + v('addTransport_Buitenland') + v('addTransport_Binnenland') + v('costTaxation') + v('addFee'));
                set('totalPriceFee', v('totalPriceNettoSuppluier') + v('totalCostsFee'));
                set('addVerkoopprijs_Marge_incl', v('totalPriceFee') + v('addBTW_21'));
            }
            else {
                set('totalAll', v('addRest_BPM') + v('addVerkoopprijs_Marge_incl') + v('addLeges'));
            }
            return;
        }

        const oldtotalPriceNetto = v('totalPriceNettoSuppluier');
        const totalPriceNetto = v('inkoopprijs_ex_ex') + v('addAfleverkosten');

        set('totalPriceNettoSuppluier', totalPriceNetto);

        if (lockedPrice.checked && e.currentTarget.id !== 'totalAll') { // IF Lock sales price checked
            if (totalPriceNetto != oldtotalPriceNetto) {
                set('addFee', v('addFee') - (v('totalCostsFee') - (v('totalPriceFee') - totalPriceNetto)));
            }
            else {
                set('addFee', v('totalCostsFee') - (v('addOpknapkosten') + v('addTransport_Buitenland') + v('addTransport_Binnenland') + v('costTaxation') + v('recyclingFee')));
            }
            set('totalCostsFee', v('addOpknapkosten') + v('recyclingFee') + v('addTransport_Buitenland') + v('addTransport_Binnenland') + v('costTaxation') + v('addFee'));
        }
        else {
            set('totalCostsFee', v('addOpknapkosten') + v('recyclingFee') + v('addTransport_Buitenland') + v('addTransport_Binnenland') + v('costTaxation') + v('addFee'));
        }

        set('totalPriceFee', totalPriceNetto + v('totalCostsFee'));
        if (vatCheckedEl.checked) {
            set('addBTW_21', v('totalPriceFee') * (v('vatPercentage') / 100));
        } else {
            set('addBTW_21', (v('addAfleverkosten') + v('addOpknapkosten') + v('recyclingFee') + v('addTransport_Buitenland') + v('addTransport_Binnenland') + v('costTaxation') + v('addFee')) * (v('vatPercentage') / 100));
        }
        set('addVerkoopprijs_Marge_incl', v('totalPriceFee') + v('addBTW_21'));
        set('totalAll', v('addRest_BPM') + v('addVerkoopprijs_Marge_incl') + v('addLeges'));

        restBpmCalc();

    }

    function changeVatFn(e) {
        changeVatMarge(e, true);
    }
    function changeMargeFn(e) {
        changeVatMarge(e, false);
    }
    function changeVatMarge(e, vat) {
        if (vat) {
            set('addBTW_21', (v('addAfleverkosten') + v('addOpknapkosten') + v('recyclingFee') + v('addTransport_Buitenland') + v('addTransport_Binnenland') + v('costTaxation') + v('addFee')) * (v('vatPercentage') / 100));
            $('#switchmargin').prop('checked', false);
            $('#switchvat').prop('checked', true);
            vatMarginTexts.forEach(el => $(el.id).html(el.vat));
        } else {
            set('addBTW_21', v('totalPriceFee') * (v('vatPercentage') / 100));
            $('#switchvat').prop('checked', false);
            $('#switchmargin').prop('checked', true);
            vatMarginTexts.forEach(el => $(el.id).html(el.marge));
        }

        calcValues(e);

    }



})(window, document);

; (function (window, doc) {
    const referenceFillers = document.querySelectorAll(".js-fill-refer");
    if (!referenceFillers) {
        return;
    }

    for (ref of referenceFillers) {

        ref.addEventListener("change", addReference);
    }

    function addReference(e) {
        const trigger = e.currentTarget;
        let text = "";
        if (trigger.value == "" || trigger.value == 0) {
            return;
        }

        if (trigger.tagName == "SELECT") {
            text = trigger.options[trigger.selectedIndex].innerText;
        } else { // IF input
            text = trigger.value;
        }

        if (trigger.getAttribute('id') == 'carMake' && text.length > 3) {
            text = text.slice(0, 3);
        }
        else if (trigger.getAttribute('id') == 'vin' && text.length > 4) {
            text = text.slice(-4);
        }

        doc.querySelector(`[data-ref=${trigger.id}]`).innerText = text;
    }

})(window, document);


; (function (window, doc) {

    const jsElSubmitters = doc.querySelectorAll(".js-submit-form");

    for (let submitter of jsElSubmitters) {

        submitter.addEventListener("click", submitForm)

    }



})(window, document);


function submitForm(e) {
    e.currentTarget.closest("form").submit();
}



// Remove submit on enter
$(window).ready(function () {
    $("#createEditCarForm").on("keypress", function (event) {
        var keyPressed = event.keyCode || event.which;
        if (keyPressed === 13) {
            event.preventDefault();
            return false;
        }
    });
});

// Remove submit on enter
$(window).ready(function () {
    $("#sourceByCh").on("change", function (e) {
        const sourceBy = document.getElementById('sourceBy');
        sourceBy.disabled = $("#sourceByCh").is(":checked");
        sourceBy.value = '0';
    });

    $('#toggle_nav').click((e) => {
        $('#create_nav').toggleClass('custom-row_show');
        $('#toggle_nav').toggleClass('rotate-additional-options');
    });

    $('.navbar-toggle').click((e) => {
        $('#sidebar').toggleClass('show_sidebar');
    });

    // On preorder change disable fields
    $('#preorder').change((e) => {
        const disabled = $(e.currentTarget).is(":checked");
        const arr = ['#vin', '#curReg', '#cOc', '#datepicker1', '#datepicker3', '#datepicker10', '#datepicker11', '#nlRegNumber'];

        arr.forEach(e => {
            $(e).prop('disabled', disabled);
        })
    })
});


// JS FUNCTIONS 

function editableTable() {

    const clickableTableTds = document.querySelectorAll("td span.js-clickable-table");

    if (!clickableTableTds) {
        return;
    }

    for (let tdEl of clickableTableTds) {
        tdEl.parentElement.addEventListener("dblclick", editTd);
        tdEl.parentElement.addEventListener("focusout", savetoDb);
    }

    function editTd(e) {
        const trigger = e.currentTarget;
        const triggerText = trigger.innerText;
        trigger.contentEditable = true;
        trigger.setAttribute("data-old-text", triggerText);
        e.target.focus();
    }

    function savetoDb(e) {
        const trigger = e.currentTarget;
        const triggerSpan = trigger.querySelector("span");     
        const triggerText = trigger.innerText.trim();
        const triggerRowId = triggerSpan.getAttribute("data-db-row");
        const triggerColName = triggerSpan.getAttribute("data-col-name");
        const oldText =  trigger.getAttribute("data-old-text");
        
        if(triggerText == oldText) {
            return;
        }

        const fData = new FormData();

        console.log(triggerText);

        fData.append("clickable-table-post", "");
        fData.append(`row-id`, triggerRowId);
        fData.append(`col-name`, triggerColName);
        fData.append(`col-value`, triggerText);


        fetch(`${location.origin}/create_po`, {
            method: 'POST',
            body: fData
        }).then(function (response) {
            return response.text().then(function (text) {
                if (text == 0) {
                    triggerSpan.innerText = oldText;
                    alert("Something went wrong. Please check if your datatype is correct");
                    return;
                }
            })
        }).catch(function (error) {
            alert("Something went wrong. Please try again");
        });


    }

}


function delay(callback, ms) {
    var timer = 0;
    return function () {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}


function getTranslations(pageName) {

    fetch(`${location.origin}/lang?lang_page=${pageName}`, {
    }).then(function (response) {
        if (response.ok) {
            console.log(response);
            return response.json();
        }
    }).catch(function (error) {
        console.warn('Something went wrong.', error);
    });
}


function removeCurrencyFormat(e) {
    e.currentTarget.value = parseFloat(e.currentTarget.value.replace(",", "") // remove thousand before sum
        .replace("€ ", "")) // remove euro sign before sum
        || '';
}

function addCurrencyFormat(e) {
    const trigger = e.currentTarget;
    let triggerVal = trigger.value;

    if (triggerVal.length == 0) {
        return;
    }

    if (isNaN(triggerVal)) {
        trigger.value = "";
        return alert("The input data MUST contain only numbers");
    }

    triggerVal = parseFloat(triggerVal).toFixed(2).toString(); // Add .00 after the value

    trigger.value = `€ ${triggerVal.replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")}`;
}


function removePercantageFormat(e) {
    e.currentTarget.value = parseFloat(e.currentTarget.value.replace("%", "")) || '';  // remove % sign before sum

}

function calculateBpmBrutto(e) {

    restBpmCalc();
    addPercantageFormat(e);

}


function addPercantageFormat(e) {
    const trigger = e.currentTarget;
    let triggerVal = trigger.value;

    if (triggerVal.length == 0) {
        return;
    }

    if (isNaN(triggerVal)) {
        trigger.value = "";
        return alert("The input data MUST contain only numbers");
    }

    triggerVal = parseFloat(triggerVal).toFixed(0).toString(); // Add .00 after the value

    trigger.value = `${triggerVal}%`;
}


function restBpmCalc() {

    const SoortVoertuig = document.querySelector("#SoortVoertuig").value;
    const BPMbrandstof = document.querySelector("#BPMbrandstof").value;
    const BPMproductiedatum = document.querySelector("#datepicker1").value;
    const BPMtenaamstellingNL = document.querySelector("#datepicker10").value;
    const BPMCO2WLTP = document.querySelector("#BPMCO2WLTP").value;
    const percentage = parseFloat(document.querySelector("#percentage").value.replace("%", ""));
    const variabeledatumbpm = document.querySelector("#datepicker2").value;

    $.ajax({
        type: "POST",
        url: '../bpm/BPMUpdateTest.php',
        data: {
            "SoortVoertuig": SoortVoertuig,
            "BPMbrandstof": BPMbrandstof,
            "BPMproductiedatum": BPMproductiedatum,
            "BPMtenaamstellingNL": BPMtenaamstellingNL,
            "variabeledatumbpm": variabeledatumbpm,
            "BPMCO2WLTP": BPMCO2WLTP,
            "percentage": percentage,
        },
        success: function (data) {
            try {
                var json = JSON.parse(data);
                document.querySelector('#addRest_BPMReadOnly').value = json[0].bpmprice;
                const bruto = (json[0].bpmprice / (percentage / 100));
                console.log(bruto);
                document.querySelector('#BPMBruto').value = isNaN(bruto) ? '' : bruto.toFixed(0);
            } catch (e) {
                return "A required field for BPM is not filled";
            }
        },
        error: function (request, status, error) {
            console.log(request.responseText);
        }
    });
}