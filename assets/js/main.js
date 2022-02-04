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
    autoclose: true
});
$('#datepicker2').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker3').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    orientation: "bottom"
});
$('#datepicker4').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker5').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker6').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker7').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker8').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker9').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker10').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker11').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker12').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker13').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker14').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker15').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker16').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker17').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker18').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker19').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker20').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker21').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker22').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker23').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker24').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker25').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker26').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker27').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker28').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker29').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker99').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
});
$('#datepicker100').datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true
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
    $('#percentage').val(Math.floor(percentage));
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
        })/* .then(function (data) {
            setTimeout(() => {
                setEditInputFormData(data)
                $('#carMake').change();
            }, 700);
            setTimeout(() => {
                setEditFormSelectsData(data);
                addResumeEditCarHeader();
            }, 1200);
        }) */
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

$('#datepicker2, #datepicker3').datepicker({
    format: 'mm/dd/yyyy',
}).datepicker("setDate", 'now');

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


$('#carMake, #carMakeFuel, #carMakeMotor,#carMakeUit').change(function () {
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
});

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


; (function (window, document) {

    const carMake = document.querySelector('#carMake');

    if (!carMake) {
        return;
    }
    

    const queryString = window.location.search;
    const parameters = new URLSearchParams(queryString);
    const value = parameters.get('car_id');

    if(!value) {

        window.addEventListener('DOMContentLoaded', (event) => {
            carMake.value = 0;
            carMake.dispatchEvent(new Event('change'));
        });    
    }

    const carMotor = document.querySelector('.js-car-motor');
    const carFuel = document.querySelector('.js-car-fuel');


    carMake.addEventListener("change", (e) => {
        const trigger = e.currentTarget;
        
        if(trigger.value == 0) { // If not choosen car make
            const fetchAllMakes = `${location.origin}/car_start?all_car_makes=0`;
            fetch(fetchAllMakes)
            .then(function (response) {
                return response.json();
            })
            .then(function (response) {
                console.log(response);
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
                <option value="1">Benzine</option>
                <option value="2">Diesel</option>
                <option value="3">Hybride</option>
                <option value="4">Electrisch</option>
                <option value="5">LPG</option>
                <option value="6">Aardgas</option>
                <option value="7">Alcohol</option>
                <option value="8">Cryogeen</option>
                <option value="9">Waterstof</option>
                `;

                carMake.dispatchEvent(new Event('change'));

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
function fillSelectFromJson(selector, jsonData, selectTextProp, selectValProp, changeInnerHTML = false) {

    let emptyOption = Object.assign(
        document.createElement("option"), {
        "text": "-",
        "value": ""
    });

    const selectEl = document.querySelector(`${selector}`);


    selectEl.innerHTML = "";
    selectEl.appendChild(emptyOption);

    for (let key in jsonData) {
        if (!jsonData.hasOwnProperty(key)) {
            continue;
        }
        let option = Object.assign(
            document.createElement("option"), {
            "text": jsonData[key][selectTextProp],
            "value": jsonData[key][selectValProp],
        });

        selectEl.appendChild(option)
    }
}

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

const imageUpload = $('.upload-photo input[type="file"]');
imageUpload.change((e) => {
    var files = $(imageUpload)[0].files;

    if (files.length > 0) {
        const allowed = ['image/jpeg', 'image/png'];
        $(files).each((index, value) => {
            if (value.size > 5000000) {
                alert(`File '${value.name}' above 5MB`);
                files[index] = null;
            }
            else if (!allowed.includes(value.type)) {
                alert(`File '${value.name}' not a jpeg/png image`);
                files[index] = 0;
            }
            else {
                // $('#uploadedFiles').html($('#uploadedFiles').html() + value.name + '&#13;&#10;');
            }
        });
    }
});

; (function (window, doc) {
    const calculationChangers = doc.querySelectorAll(".js-calc-input");

    if (!calculationChangers) {
        return;
    }

    const calcFromTotal = doc.querySelector(".js-calc-from-total");
    const vatMargeCheckedEl = doc.querySelector("#switchBTW");
    
    vatMargeCheckedEl.addEventListener("change", changeVatFn);
    calcFromTotal.addEventListener("change", calcFromTotalFn);

    for (let changer of calculationChangers) {
        changer.addEventListener("change", calcValues);
    }

    function calcFromTotalFn() {
        const totalElVal = parseFloat(doc.querySelector("#totalAll").value);  

        if(!vatMargeCheckedEl.checked) {
            const salesPriceVat = minusValues(totalElVal, "#addLeges");
            const salesPriceNetto = (salesPriceVat / 1.21).toFixed(2);
            const totalPurchasePriceNetto = minusValues(salesPriceNetto, "#totalCostsFee");
            doc.querySelector("#addVerkoopprijs_Marge_incl").value = salesPriceVat;
            doc.querySelector("#totalPriceFee").value = salesPriceNetto;
            doc.querySelector("#totalPriceNettoSuppluier").value = totalPurchasePriceNetto;
            doc.querySelector("#inkoopprijs_ex_ex").value = minusValues(totalPurchasePriceNetto, "#addAfleverkosten");
            doc.querySelector("#addBTW_21").value = (salesPriceVat - salesPriceNetto).toFixed(2); 

        }else {
            
            const salesPriceVatBtw = minusValues(totalElVal, "#addLeges");
            const salesPriceNeto = minusValues(salesPriceVatBtw, "#addBTW_21");
            const totalPurchasePriceNetto = minusValues(salesPriceNeto, "#totalCostsFee");
            doc.querySelector("#addVerkoopprijs_Marge_incl").value = salesPriceVatBtw;
            doc.querySelector("#totalPriceFee").value = salesPriceNeto;
            doc.querySelector("#totalPriceNettoSuppluier").value = totalPurchasePriceNetto;
            doc.querySelector("#inkoopprijs_ex_ex").value = minusValues(totalPurchasePriceNetto, "#addAfleverkosten");
        }
        
        
    }

    function calcValues() {
        const vatEl = doc.querySelector("#addBTW_21");
        doc.querySelector("#totalPriceNettoSuppluier").value = sumValues("#inkoopprijs_ex_ex, #addAfleverkosten");
        doc.querySelector("#totalPriceNettoSuppluier").value = sumValues("#inkoopprijs_ex_ex, #addAfleverkosten");
        doc.querySelector("#totalCostsFee").value = sumValues("#addOpknapkosten, #addTransport_Buitenland, #addTransport_Binnenland, #costTaxation, #addFee");
        doc.querySelector("#totalPriceFee").value = sumValues("#totalPriceNettoSuppluier, #totalCostsFee");
        if(doc.querySelector("#switchBTW").checked) {
            vatEl.value = (sumValues("#addAfleverkosten, #addOpknapkosten, #addTransport_Buitenland, #addTransport_Binnenland, #costTaxation, #addFee") * 0.21).toFixed(2);
        }else {
            vatEl.value = (sumValues("#totalPriceFee") * 0.21).toFixed(2);
        }
       
        doc.querySelector("#addVerkoopprijs_Marge_incl").value = sumValues("#totalPriceFee, #addBTW_21");
        doc.querySelector("#totalAll").value = sumValues("#addVerkoopprijs_Marge_incl, #addRest_BPM, #addLeges");
    }

    function changeVatFn(e) {
        const vatEl = doc.querySelector("#addBTW_21");
        const trigger = e.currentTarget;
        if(trigger.checked) {
                vatEl.value = (sumValues("#addAfleverkosten, #addOpknapkosten, #addTransport_Buitenland, #addTransport_Binnenland, #costTaxation, #addFee") * 0.21).toFixed(2);
            }else {
                vatEl.value = (sumValues("#totalPriceFee") * 0.21).toFixed(2);
            }

            calcValues();
        
    }

    function sumValues(selectors) {
        const elementSelectors = selectors.split(",");
        let sum = 0;

        for (let el of elementSelectors) {
            let element = doc.querySelector(`${el}`);
            if (!isNaN(element.value) && element.value != "") {
                sum += parseFloat(element.value);
            }
        }

        return sum.toFixed(2);
    }


    function minusValues(sum, selectors) {

        const elementSelectors = selectors.split(",");

        for (let el of elementSelectors) {
            let element = doc.querySelector(`${el}`);
            if (!isNaN(element.value) && element.value != "") {
                sum -= parseFloat(element.value);
            }
        }

        return sum.toFixed(2);

    }

})(window, document);


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