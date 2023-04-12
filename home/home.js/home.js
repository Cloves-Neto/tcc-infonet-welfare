function calender(e) {
    if ($(".main").length != 0) {
      $("#calenderMain").remove();
      return false;
    }
  
    date = new Date();
    currMonth = date.getMonth();
    currYear = date.getFullYear();
    days = [];
    monthArray = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December"
    ];
    week = ["w1", "w2", "w3", "w4", "w5", "w6"];
    var cal = `<div class="main"> <div class="yearDiv"> <span onclick="setCalender(currMonth,currYear-=1)" class="left"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
  </svg></span> <span class="year"></span> <span onclick="setCalender(currMonth,currYear+=1)" class="right"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
  </svg></span> </div> <div class="monthDiv"> <span onclick="setCalender(currMonth<1?currMonth=11:currMonth-=1,currYear)" class="left"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
  </svg></span> <span class="month"></span> <span onclick="setCalender(currMonth>10?currMonth=0:currMonth+=1,currYear)" class="right"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
  </svg></span> </div> <div class="dateMain"> <table id="fillDate"> <tr class="weekT"> <td class="wDay" value="0">S</td> <td class="wDay" value="1">M</td> <td class="wDay" value="2">T</td> <td class="wDay" value="3">W</td> <td class="wDay" value="4">T</td> <td class="wDay" value="5">F</td> <td class="wDay" value="6">S</td> </tr> <tr class="w1"></tr> <tr class="w2"></tr> <tr class="w3"></tr> <tr class="w4"></tr> <tr class="w5"></tr> </table> </div> </div> </div>`;
  
    $("body").append('<div id="calenderMain"></div>');
  
    $("#calenderMain").append(cal);
    $(".main").fadeIn();
  
    setCalender(date.getMonth(), date.getFullYear(), e);
  }
  
  function setCalender(month, year, e) {
    selectedDate = "";
    clearCalender();
    days = [];
    var weekCount = 0;
    console.log(month, year);
    var d = new Date(year, month, 1);
    $(".main .month").html(monthArray[d.getMonth()]);
    $(".main .year").html(d.getFullYear());
    while (d.getMonth() === month) {
      days.push(new Date(d));
      d.setDate(d.getDate() + 1);
    }
    for (i = 0; i < days.length; i++) {
      if (days[i].getDay() <= 5) {
        $("." + week[weekCount]).append(
          '<td class="date" value="' +
            days[i].getDate() +
            '">' +
            days[i].getDate() +
            "</td>"
        );
      } else {
        $("." + week[weekCount]).append(
          '<td class="date" value="' +
            days[i].getDate() +
            '">' +
            days[i].getDate() +
            "</td>"
        );
        weekCount += 1;
      }
    }
  
    var tot;
    if ($(".w1").children().length != 7) {
      tot = 7 - $(".w1").children().length;
      for (j = 0; j < tot; j++) {
        console.log("test");
        $(".w1").prepend("<td>&nbsp</td>");
      }
    }
  
    $(".date").each(function () {
      $(this).click(function () {
        selectedDate = "";
        selectedDate =
          currYear +
          "-" +
          (String(currMonth + 1).length > 1
            ? currMonth + 1
            : "0" + (currMonth + 1)) +
          "-" +
          (String($(this).attr("value")).length > 1
            ? $(this).attr("value")
            : "0" + $(this).attr("value"));
        console.log(selectedDate);
        $(".main").slideUp();
        $("#calenderMain").remove();
        $(e).val(selectedDate.toString());
      });
    });
  }
  
  function clearCalender() {
    $(".w1,.w2,.w3,.w4,.w5").children().remove();
  }
  
  $("#calenderMain").click(function () {
    $("#calenderMain").remove();
  });
  