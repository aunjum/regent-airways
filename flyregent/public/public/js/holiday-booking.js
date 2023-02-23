
var packageDay = 0;
var extraDay = 0;





//enalble/disable adult, child, infant seleciton option
function check_date(){

    var startdate = $('#startdate').val();
    var enddate =  $('.booking_info #enddate').val();
    if(startdate != '' && enddate != ''){

        $(' #Adulttype').removeAttr('disabled');
        $(' #Childtype').removeAttr('disabled');
        $(' #Infanttype').removeAttr('disabled');

        var n = parseInt($('#pakagenightsetbycustomer').val());
        var e =  n - data[2] ;

        var ed = parseFloat($('.e_adult').text());
        adultNo = $('#Adulttype').val();
        priceA = parseFloat(adultNo) * (parseFloat(adultPrice) + (e * ed)) ;

        $('#totalAdultfinalprise').val(priceA);

        $('#totalpakageprise').val(priceA);//edit
        // $('#totalpakageprise').val(priceA);//edit
        // $('#totalpakageprise').val(priceA);//edit

        var ec = parseFloat($('.e_child').text());
        var ChildNo = $('#Childtype').val();
        priceC = parseFloat(ChildNo) * (parseFloat(childPrice) + (e * ec)) ;
        priceC = parseFloat(priceC);
        $('#totalchildfinalprise').val(priceC);

        var ei = parseFloat($('.e_infant').text());
        var InfantNo = $('#Infanttype').val();
        priceI = parseFloat(InfantNo) * (parseFloat(infantPrice) + (e * ei)) ;
        $('#totalinfanfinalprise').val(priceI);

        var addition = 0 ;

        var pVal = $('.ptype').text();

        var pdata = pVal.split(" ");

        if(pdata[0] == 'Single' || pdata[0] == 'single') {

            $('#totalpakageprise').val(priceA);
        }

    }else{
        $(' #Adulttype').attr('disabled','disabled');
        $(' #Childtype').attr('disabled','disabled');
        $(' #Infanttype').attr('disabled','disabled');
    }
}
function getdate(start_date, days) {
    //var tt = document.getElementById('txtDate').value;

    var date = new Date(start_date);
    var newdate = new Date(date);

    newdate.setDate(newdate.getDate() + days-1);

    var dd = newdate.getDate() ;
    var mm = newdate.getMonth() + 1;
    var y = newdate.getFullYear();

    var someFormattedDate = dd + '/' + mm + '/' + y;

    return someFormattedDate;
}

var moneyFormat = function (money) {
    return money.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
};
function summary() {

    // console.log('someone called me...');

     var totalPrice = 0.00;
     var adultCount = parseInt($('#Adulttype').val());
     var childCount = parseInt($('#Childtype').val());
     var infantCount = parseInt($('#Infanttype').val());
     var error = false;

     //validate the input
     if(isNaN(adultCount)){
         error = true;
         return false;
     }

     if(!window.isSingle){
         if(isNaN(childCount)){
             error = true;
         }
         if(isNaN(infantCount)){
             error = true;
         }
     }

     if(error) {
         $('#errormessageArea span').text("Please fill up form properly!");
         $('#errormessageArea').show();
         return false;
     }

     //now calculate the sum
     var adultTotalPrice = (adultCount * window.adultPrice) + (extraDay ? ((extraDay*window.adultAditionalPrice) * adultCount) : 0 );
     totalPrice += adultTotalPrice;
    $('#adultCount').text(adultCount);
    $('#adultAmount').text(moneyFormat(adultTotalPrice) + ' BDT');


      var childTotalPrice = 0;
      var infantTotalPrice = 0;
     if(!window.isSingle){
         var childTotalPrice = (childCount * window.childPrice) + (extraDay ? ((extraDay*window.childAditionalPrice) * childCount) : 0 );
         totalPrice += childTotalPrice;
         var infantTotalPrice = (infantCount * window.infantPrice) + (extraDay ? ((extraDay*window.infantAditionalPrice) * infantCount) : 0 );
         totalPrice += infantTotalPrice;

         $('#childCount').text(childCount);
         $('#childAmount').text(moneyFormat(childTotalPrice) + ' BDT');
         $('#infantCount').text(infantCount);
         $('#infantAmount').text(moneyFormat(infantTotalPrice) + ' BDT');


         //now show the hidden item
         $('.summary_hideable_item').show();

     }

     $('#totalAmount').text(moneyFormat(totalPrice) + ' BDT');
     var totalPerson = adultCount + (childCount ? childCount : 0)  + (infantCount ? infantCount : 0);
     $('#personCount').text(totalPerson);


     //now fill up hidden inputs data
     $('input[name="adult_no"]').val(adultCount);
    if(!window.isSingle) {
        $('input[name="child_no"]').val(childCount);
        $('input[name="infant_no"]').val(infantCount);
    }
     $('input[name="adult"]').val(adultTotalPrice);
     $('input[name="child"]').val(childTotalPrice);
     $('input[name="infant"]').val(infantTotalPrice);
     $('input[name="total"]').val(totalPrice);


     //now visible the submit button
    $('button[type="submit"]').show();

}
var initDatePickers = function(){
    $('.initDatePicker').datepicker({
        //showButtonPanel: true,
        showOtherMonths: true,
        changeMonth: true,
        changeYear: true,
        yearRange: "1910:",
        firstDay: 1,
        maxDate: 0,
        dateFormat: 'dd/mm/yy'
    });
};

$(document).ready(function() {

    var titleValues = $('.dtitle').text().split(" ");
    packageDay = titleValues[0];
    if(isNaN(packageDay)){
        $('#errormessageArea span').text('Package day not defined! Contact support.');
        $('#errormessageArea').show();
    }


    var country = $('.country').val();

    initDatePickers();

    $( "#startdate" ).datepicker({
        //showButtonPanel: true,
        showOtherMonths: true,
        changeMonth: true,
        changeYear: true,
        firstDay: 1,
        dateFormat: 'dd/mm/yy',
        minDate: 1,
        onSelect: function(date){
            var minDateForEndDate = $('#startdate').datepicker('getDate');
            minDateForEndDate.setDate(minDateForEndDate.getDate() + parseInt(packageDay-1));//add value of no. of night.
            $('#enddate').datepicker('option','minDate', minDateForEndDate);
            $('#enddate').datepicker('setDate', minDateForEndDate);

            //fire end date event
            // Dispatch it.
            $('#enddate').trigger("change");


        }
    });

    $( "#enddate" ).datepicker({
        //showButtonPanel: true,
        showOtherMonths: true,
        changeMonth: true,
        changeYear: true,

        firstDay: 1,
        dateFormat: 'dd/mm/yy',
        //highlight:true,
        clear:true,
        //minDate: '12/12/18'
    });

    $('#enddate').on('change', function() {
        /**
         * Get date and calculate days and night
         *  Then enable select inputs
         *  After that calculate the summary
         */
        var startDate = $('#startdate').datepicker('getDate');
        var endDate   = $('#enddate').datepicker('getDate');

        if (startDate<endDate) {
            var days   = ((endDate - startDate)/1000/60/60/24)+1;
            extraDay = (days - packageDay);


            $('#daysCount').text(days);
            $('#nightCount').text((days-1));

            $('input[name="totalDays"]').val(days);
            $('input[name="totalNights"]').val(days-1);



            //inputs sate change
            $(' #Adulttype').removeAttr('disabled');

            if(!window.isSingle){
                $(' #Childtype').removeAttr('disabled');
                $(' #Infanttype').removeAttr('disabled');
            }

            //now call sumarray function
            summary();
        }
        else {
            $('#errormessageArea span').text("You cant come back before you have been!");
            $('#errormessageArea').show();

        }
    });

    $('#Adulttype').change(function(){

        var adultNo = $('#Adulttype').val();

        //clean existing html doms
        $('#extraAdult').empty();

        var ahtml= '';
        if(country == "Cox's Bazar"){
            ahtml += "<span class=\"formrow\">" +
                "<span style=\"font-size: 14px\">NID / Birth Certificate / Driving License / Others : </span>"+
                "<input type=\"file\" accept=\".png,.jpg,.jpeg,.pdf\" name=\"a_pdoc[]\" style=\"padding-right: 20px;padding-top: 10px;" +
                "padding-bottom: 20px; font-size: 14px;\"/>"+
                "</span>";

        }else {
            ahtml +="<span class='formrow'><span class=\"formcol\" style=\"\">" +
                "<span style=\"font-size: 14px\">Passport : </span>"+
                "<input type=\"file\" accept=\".png,.jpg,.jpeg,.pdf\" name=\"a_pdoc[]\" style=\"padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;\"/></span>" +

                "<span class=\"formcol\">" +
                "<span style=\"font-size: 14px\">Visa : </span>"+
                "<input type=\"file\" accept=\".png,.jpg,.jpeg,.pdf\" name=\"a_pdoc[]\" style=\"padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;\"/></span>"+
                "</span>";

        }

        for (var ival = 2; ival <= adultNo; ival++) {
            if(ival > 2) {
                var html_adult = "<div class=\"adult_no\"><label>Adult : " + ival + "</label>" +
                    "<div class=\"formrow\" style=\"margin-top:5px;\">\n" +
                    " <span class='formcol_33'><input placeholder=\"Firstname ***\" type=\"text\" class=\"\" id=\"firstName\" name=\"a_firstname[" + ival + "]\" value=\"\" required /> </span>" +
                    " <span class='formcol_33 padleft'><input placeholder=\"Lastname ***\" type=\"text\" class=\"form-control\" id=\"lastName\" name=\"a_lastName[" + ival + "]\" value=\"\" required /> </span>" +
                    " <span class='formcol_33 padleft'><input  placeholder=\"Date of Birth\" type=\"text\" class=\"form-control initDatePicker\" id=\"datepickers[" + ival + "]\" name=\"a_date_of_birth[" + ival + "]\" value=\"\" autocomplete=\"off\"/></span>" +
                    " </div>\n" +
                    " <span class=\"formrow\">\n" +
                    "  <span class='formcol_33'>" +
                    "<select placeholder=\"Gender\" type=\"text\" class=\"form-control\" id=\"gender\" name=\"a_gender[" + ival + "]\" required>" +
                    "<option value=''>Select Gender</option>" +
                    "<option value=\"Male\">Male</option>" +
                    "<option value=\"Fenale\">Female</option>" +
                    "</select>" +
                    "</span>" +
                    "   <span class='formcol_33 padleft'><input placeholder=\"Country ***\" type=\"text\" class=\"form-control\" id=\"counrty\" value=\"\" name=\"a_country["+ival+"]\" required></span>" +
                    "   <span class='formcol_33 padleft'><input placeholder=\"Passport No.\" type=\"text\" class=\"form-control\" id=\"passport_no\" value=\"\" name=\"c_passport_no["+ival+"]\" /></span>" +
                    "</span>";

                   html_adult += ahtml;

                $('#extraAdult').append(html_adult);
            }


        }


        // now summaries the price
        summary();
        initDatePickers();


    });

    //create child form and send when change adult dropdown input

    $('#Childtype').change(function(){

        var chtml = '';


        if(country == "Cox's Bazar") {
            chtml += "<span class=\"fromcol_33 padleft test\">" +
                "<span style=\"font-size: 14px;padding-right:1%;\">NID / Birth Certificate / Driving License/ Others : </span>"+
                "<input type=\"file\" accept=\".png,.jpg,.jpeg,.pdf\" name=\"c_pdoc[]\" style=\"padding-right: 20px;padding-top: 10px;" +
                "padding-bottom: 20px; font-size: 14px;\"/>"+
                "</span>";
        }else {
            chtml += "<span><span class=\"formcol\">" +
                "<span style=\"font-size: 14px;padding-right:1%;\">Passport : </span>"+
                "<input type=\"file\" accept=\".png,.jpg,.jpeg,.pdf\" name=\"c_pdoc[]\" style=\"padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;\"/></span>" +
                "<span class=\"formcol\">" +
                "<span style=\"font-size: 14px;padding-right:1%;\">Visa : </span>"+
                "<input type=\"file\" accept=\".png,.jpg,.jpeg,.pdf\" name=\"c_pdoc[]\" style=\"padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;\"/></span>";
        }

        childNo = $('#Childtype').val();
        $('#extraChild').empty();

        for (var ival = 1; ival <= childNo; ival++) {

            var html_child = "<div class=\"infant_no\"><label>Child : " + ival + "</label>" +
                "<div class=\"formrow\" style=\"margin-top:5px;\">\n" +
                " <span class='formcol_33'><input placeholder=\"Firstname ***\" type=\"text\" class=\"\" id=\"firstName\" name=\"c_firstname[" + ival + "]\" value=\"\" required /></span>" +
                "   <span class='formcol_33 padleft'><input placeholder=\"Lastname ***\" type=\"text\" class=\"form-control\" id=\"lastName[\" name=\"c_lastName["+ival +"]\" value=\"\" required></span>" +
                "  <span class='formcol_33 padleft'><input  placeholder=\"Date of Birth\" type=\"text\" class=\"form-control initDatePicker\" id=\"datepickersc["+ival+"]\" value=\"\" name=\"c_date_of_birth["+ival+"]\" autocomplete=\"off\" /></span>" +
                "                            </div>\n" +
                " <div class=\"formrow\">\n" +
                "  <span class='formcol_33'>" +
                "<select placeholder=\"Gender\" type=\"text\" class=\"form-control\" id=\"gender\" name=\"c_gender[" + ival + "]\" required>" +
                "<option value=\"\">Select Gender</option>" +
                "<option value=\"Male\">Male</option>" +
                "<option value=\"Fenale\">Female</option></select>" +
                "</span>" +
                "   <span class='formcol_33 padleft'><input placeholder=\"Country ***\" type=\"text\" class=\"form-control\" id=\"counrty\" value=\"\" name=\"c_country["+ival+"]\" required></span>" +
                "   <span class='formcol_33 padleft'><input placeholder=\"Passport No.\" type=\"text\" class=\"form-control\" id=\"passport_no\" value=\"\" name=\"c_passport_no["+ival+"]\" /></span>" +
                "<br>";
             html_child += chtml;

            $('#extraChild').append(html_child);

        }

        summary();
        initDatePickers();

    });

    //create infant form and send when change infant dropdown input

    $('#Infanttype').change(function() {

        var ihtml = '';


        if(country == "Cox's Bazar"){
            ihtml += "<span><span class=\"formcol\">" +
                "<span style=\"font-size: 14px;padding-right:1%;\">NID / Birth Certificate / Driving License/ Others : </span>"+
                "<input type=\"file\" accept=\".png,.jpg,.jpeg,.pdf\" name=\"i_pdoc[]\" style=\"padding-right: 20px;padding-top: 10px;" +
                "padding-bottom: 20px; font-size: 14px;\"/>"+
                "</span></span>";
        }else {
            ihtml +=  "<span style=\"width:50%;\"><span class=\"formcol\">" +
                "<span style=\"font-size: 14px;padding-right:1%;\">Passport : </span>"+
                "<input type=\"file\" accept=\".png,.jpg,.jpeg,.pdf\" name=\"i_pdoc[]\" style=\"padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;\"/></span>" +
                "<span style=\"width:50%;\"><span style=\"font-size: 14px;padding-right:1%;\">Visa : </span>"+
                "<input type=\"file\" accept=\".png,.jpg,.jpeg,.pdf\" name=\"i_pdoc[]\" style=\"padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;\"/></span></span>";
        }


        infantNo = $('#Infanttype').val();
        $('#extraInfant').empty();

        for (var ival = 1; ival <= infantNo; ival++) {
            var html_infant = "<div class=\"infant_no\"><label>Infant : " + ival + "</label>" +
                "<div class=\"formrow\" style=\"margin-top:5px;\">\n" +
                " <span class='formcol_33'><input placeholder=\"Firstname ***\" type=\"text\" class=\"\" id=\"firstName\" name=\"i_firstname[" + ival + "]\" value=\"\" required /></span>" +
                "  <span class='formcol_33 padleft'><input placeholder=\"Lastname ***\" type=\"text\" class=\"form-control\" id=\"lastName\" name=\"i_lastName[" + ival + "]\" value=\"\" required></span>" +
                " <span class='formcol_33 padleft'><input  placeholder=\"Date of Birth\" type=\"text\" class=\"form-control initDatePicker\" id=\"datepickeri[" + ival + "]\" name=\"i_date_of_birth[" + ival + "]\" value=\"\" autocomplete=\"off\"/></span>" +
                " </div>\n" +
                "    <div class=\"formrow\">\n" +
                "  <span class=\"formcol_33\">\n" +
                "<select placeholder=\"Gender\" type=\"text\" class=\"form-control\" id=\"gender\" name=\"i_gender[" + ival + "]\" required>" +
                "<option value=\"\">Select Gender</option>" +
                "<option value=\"Male\">Male</option>" +
                "<option value=\"Fenale\">Female</option></select>" +
                "</span>" +
                "  <span class='formcol_33 padleft'><input placeholder=\"Country ***\" type=\"text\" class=\"form-control\" id=\"counrty\" name=\"i_country[" + ival + "]\" value=\"\" required/></span>" +
                "   <span class='formcol_33 padleft'><input placeholder=\"Passport No.\" type=\"text\" class=\"form-control\" id=\"passport_no\" name=\"i_passport_no[" + ival + "]\" value=\"\" /></span><br>";

                html_infant += ihtml;
               $('#extraInfant').append(html_infant);


        }

        summary();
        initDatePickers();

    });




});



