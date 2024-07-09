

$(document).ready(function() {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
            });        
    });

$('#employee').on('change',function(event){
  event.preventDefault();
  var selectedEmployee = $('#employee').val();
  $('#total_leave').val('0');
  $('#total_number_of_pay_day').val('');
  $('#monthly_salary').val('');

  
axios.get('sanctum/csrf-cookie').then(response=>{
 axios.post('employee_details_dependancy',{
        data: selectedEmployee
      }).then(response=>{
      $('#joining_date').val(response.data.joining_date);

       
      var emp_joining_date_from_response = response.data.joining_date;
      var dateParts = emp_joining_date_from_response.split("-");
      var jsDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);

      // Format the date using toLocaleDateString with the Bangladeshi locale
      var options = { year: 'numeric', month: 'long', day: 'numeric' };
      var formattedDate = jsDate.toLocaleDateString('en-BD', options);

      // Display the formatted date in the HTML element
      $('#emp_joining_date').html(formattedDate);



      $('#per_day_salary').val(response.data.per_day_salary);
      $('#emp_per_day_salary').html(response.data.per_day_salary);
      $('#monthly_holiday_bonus').val(response.data.per_day_salary);    
      var total_leave = $('#total_leave').val();

       if(total_leave == '0'){
        $('#total_number_of_pay_day').val('26');
        $('#total_daily_allowance').val(0);
        $('#total_travel_allowance').val(0);
        $('#rental_cost_allowance').val(0);
        $('#hospital_bill_allowance').val(0);
        $('#insurance_allowance').val(0);
        $('#sales_commission').val(0);
        $('#retail_commission').val(0);
        var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
        var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
        var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
        var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
        var insurance_allowance = parseFloat($('#insurance_allowance').val());
        var sales_commission = parseFloat($('#sales_commission').val());
        var retail_commission = parseFloat($('#retail_commission').val());

        var total_number_of_pay_day = parseFloat($('#total_number_of_pay_day').val());
        var per_day_salary = parseFloat($('#per_day_salary').val());
        var monthly_salary = total_number_of_pay_day*per_day_salary;
        var emp_total_bonus_amount = per_day_salary*39;
        $('#emp_total_bonus_amount').html(emp_total_bonus_amount);

        $('#monthly_salary').val(monthly_salary);
        var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());

        //total others result
        var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
        $('#total_others').val(total_others);
        
        //total salary result
        var total_salary = (monthly_salary+total_others);
        $('#total_salary').val(total_salary);
        
       }

       //.....................bonus count...................
       function calculateDates(joiningDateStr) {
        let joiningDate = new Date(joiningDateStr);
        let currentDate = new Date(joiningDate);
        let endDate = new Date(joiningDate);
        
        endDate.setFullYear(endDate.getFullYear() + 1); // Set end date to 1 year after joining date
        
        let results = [];
        
        while (currentDate < endDate) {
          let eligibleDate = new Date(currentDate);
          eligibleDate.setMonth(eligibleDate.getMonth() +2);
          
          let payDate = new Date(eligibleDate);
          payDate.setMonth(payDate.getMonth() + 1);
          
          results.push({
            joiningDate: currentDate.toISOString().split('T')[0],
            eligibleDate: eligibleDate.toISOString().split('T')[0],
            payDate: payDate.toISOString().split('T')[0]
          });
          
          currentDate = new Date(payDate);
        }
        
        return results;
      }

      // Example usage:
      let dates = calculateDates(response.data.joining_date);
      

      var dateContainer = document.getElementById('dateContainer');

     
      console.log("Dates for 1 year:");
      dates.slice(0, 12).forEach((date, index) => {
        
        console.log(`#${index + 1}:`);

        var joiningDateSpan = document.createElement('span');
        var eligibleDateSpan = document.createElement('span');
        var payDateSpan = document.createElement('span');
        
        //eligible mm-yyyy starts
        var eligibleDateFormatted = new Date(date.eligibleDate);
        var eligibleMonth = eligibleDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
        var eligibleYear = eligibleDateFormatted.getFullYear();
        // Format month as two digits
        var eligibleMonthString = eligibleMonth < 10 ? '0' + eligibleMonth : '' + eligibleMonth;
        // Combine month and year in "mm-yyyy" format
        var eligible_mm_yyyy = eligibleMonthString + '-' + eligibleYear;
        //eligible mm-yyyy ends


        //bonus pay mm-yyyy starts
        var payDateFormatted = new Date(date.payDate);
        var payMonth = payDateFormatted.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
        var payYear = payDateFormatted.getFullYear();
        // Format month as two digits
        var payMonthString = payMonth < 10 ? '0' + payMonth : '' + payMonth;
        // Combine month and year in "mm-yyyy" format
        var payMonth_mm_yyyy = payMonthString + '-' + payYear;
        //bonus pay mm-yyyy ends


        // console.log("Joining Date:", date.joiningDate);
        console.log("Joining Date:", date.joiningDate);
        console.log("Eligible Date:", eligible_mm_yyyy);
        console.log("Bonus Pay Date:", payMonth_mm_yyyy);
        console.log("");

         // Set text content for each span
          joiningDateSpan.textContent = "Joining Date: " + date.joiningDate;
          eligibleDateSpan.textContent = "Eligible Date: " + eligible_mm_yyyy;
          payDateSpan.textContent = "Pay Date: " + payMonth_mm_yyyy;

          // Append spans to the container
          dateContainer.appendChild(joiningDateSpan);
          dateContainer.appendChild(document.createElement('br')); // Add line break for readability
          dateContainer.appendChild(eligibleDateSpan);
          dateContainer.appendChild(document.createElement('br')); // Add line break for readability
          dateContainer.appendChild(payDateSpan);
          dateContainer.appendChild(document.createElement('br')); // Add line break for readability
          dateContainer.appendChild(document.createElement('br')); // Add double line break for better separation
      });

        // console.log(eligible_month+'  '+bonus_pay_month);
      });
 });
});



$('#total_working_day').on('keyup',function(){
  $('#total_leave').val('');
  $('#total_number_of_pay_day').val('');
  $('#monthly_salary').val('');
});


//total leave calculation
$('#total_leave').on('keyup', function(){
    var total_working_day = parseFloat($('#total_working_day').val());
    var total_leave = parseFloat($('#total_leave').val());
    var per_day_salary = parseFloat($('#per_day_salary').val());
      
    var total_number_of_pay_day = total_working_day-total_leave;
    var monthly_salary = total_number_of_pay_day*per_day_salary;

    $('#total_number_of_pay_day').val(total_number_of_pay_day);
    $('#monthly_salary').val(monthly_salary);
    $('#monthly_holiday_bonus').val(per_day_salary);


    $('#total_daily_allowance').val(0);
    $('#total_travel_allowance').val(0);
    $('#rental_cost_allowance').val(0);
    $('#hospital_bill_allowance').val(0);
    $('#insurance_allowance').val(0);
    $('#sales_commission').val(0);
    $('#retail_commission').val(0);
    var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
    var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
    var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
    var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
    var insurance_allowance = parseFloat($('#insurance_allowance').val());
    var sales_commission = parseFloat($('#sales_commission').val());
    var retail_commission = parseFloat($('#retail_commission').val());
    var monthly_salary = parseFloat($('#monthly_salary').val());
    var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());

    //total others result
    var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
    $('#total_others').val(total_others);
    
    //total salary result
    var total_salary = (monthly_salary+total_others);
    $('#total_salary').val(total_salary);

    });



//total daily allowannce calculation
$('#total_daily_allowance').on('keyup',function(){
  $('#total_travel_allowance').val(0);
  $('#rental_cost_allowance').val(0);
  $('#hospital_bill_allowance').val(0);
  $('#insurance_allowance').val(0);
  $('#sales_commission').val(0);
  $('#retail_commission').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);
});


//total travel allowannce calculation
$('#total_travel_allowance').on('keyup',function(){
  $('#rental_cost_allowance').val(0);
  $('#hospital_bill_allowance').val(0);
  $('#insurance_allowance').val(0);
  $('#sales_commission').val(0);
  $('#retail_commission').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);
});


//rental allowance calculation
$('#rental_cost_allowance').on('keyup',function(){
  $('#hospital_bill_allowance').val(0);
  $('#insurance_allowance').val(0);
  $('#sales_commission').val(0);
  $('#retail_commission').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);
});

//hospital bill allowance calculation
$('#hospital_bill_allowance').on('keyup',function(){
  $('#insurance_allowance').val(0);
  $('#sales_commission').val(0);
  $('#retail_commission').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);
});


//insurance allowance calculation
$('#insurance_allowance').on('keyup',function(){
  $('#sales_commission').val(0);
  $('#retail_commission').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);
});


//sales commission calculation
$('#sales_commission').on('keyup',function(){
  $('#retail_commission').val(0);
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);
});


//retail commission calculation
$('#retail_commission').on('keyup',function(){
  var total_daily_allowance = parseFloat($('#total_daily_allowance').val());
  var total_travel_allowance = parseFloat($('#total_travel_allowance').val());
  var rental_cost_allowance = parseFloat($('#rental_cost_allowance').val());
  var hospital_bill_allowance = parseFloat($('#hospital_bill_allowance').val());
  var insurance_allowance = parseFloat($('#insurance_allowance').val());
  var sales_commission = parseFloat($('#sales_commission').val());
  var retail_commission = parseFloat($('#retail_commission').val());
  var monthly_salary = parseFloat($('#monthly_salary').val());
  var monthly_holiday_bonus = parseFloat($('#monthly_holiday_bonus').val());

  //total others result
  var total_others = (monthly_holiday_bonus+total_daily_allowance+total_travel_allowance+rental_cost_allowance+hospital_bill_allowance+insurance_allowance+sales_commission+retail_commission);
  $('#total_others').val(total_others);
  
  //total salary result
  var total_salary = (monthly_salary+total_others);
   $('#total_salary').val(total_salary);
});

