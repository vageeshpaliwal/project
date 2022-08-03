<!doctype html>
<html lang = "en">
<head>
<meta charset = "utf-8">
<title>Welcome To My Domain</title>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script src="/path/to/cdn/jquery.slim.min.js"></script>
<script src="/path/to/js/calendar.js"></script>

<style>


.hbContainer {
  max-width: 400px;
  margin: auto;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  border-radius:7px;
  padding:10px;
}
.left {
  float: left;
}
.right {
  float: right;
}
.center {
  text-align: center;
}
.calendarList1 {
  list-style: none;
  width: 100%;
  margin: 0;
  padding: 0;
  text-align: center;
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  grid-template-rows: repeat(1, 40px);
  align-items: center;
  justify-items: center;
  grid-gap: 8px;
  font-size: 14px;
  color: #707070;
}
.calendarList2 {
  list-style: none;
  margin: 0;
  padding: 0;
  text-align: center;
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  grid-template-rows: repeat(6, 40px);
  align-items: center;
  justify-items: center;
  grid-gap: 8px;
  font-size: 14px;
  color: #707070;
}
.calendarYearMonth {
  margin-top: 24px;
}
.calendarYearMonth p {
  display: inline-block;
  vertical-align: middle;
}
.calBtn {
  user-select: none;
  cursor: pointer;
  background: white;
  margin: 8px 0;
  padding: 8px 12px;
  border-radius: 12px;
  font-size: 14px;
  line-height: 22px;
  color: #707070;
  border: 1px solid #eaeaea;
}
</style>
</head>
<body>
<section id="myCalendar">
  <div class="hbContainer ">
    <div class="calendarYearMonth center">
      <p class="left calBtn" onclick="prevMonth()"> Prev </p>
      <p id="yearMonth"> Jan 2021 </p>
      <p class="right calBtn" onclick="nextMonth()"> Next </p>
    </div>
    <div>
      <ol class="calendarList1">
        <li class="day-name">Sat</li>
        <li class="day-name">Sun</li>
        <li class="day-name">Mon</li>
        <li class="day-name">Tue</li>
        <li class="day-name">Wed</li>
        <li class="day-name">Thu</li>
        <li class="day-name">Fri</li>
      </ol>
      <ol class="calendarList2" id="calendarList">
      </ol>
    </div>
  </div>
</section>
</body>
</html>
<script>
    const months = [
    { 'id': 1, 'name': 'Jan' },
    { 'id': 2, 'name': 'Feb' },
    { 'id': 3, 'name': 'Mar' },
    { 'id': 4, 'name': 'Apr' },
    { 'id': 5, 'name': 'May' },
    { 'id': 6, 'name': 'Jun' },
    { 'id': 7, 'name': 'Jul' },
    { 'id': 8, 'name': 'Aug' },
    { 'id': 9, 'name': 'Sep' },
    { 'id': 10, 'name': 'Oct' },
    { 'id': 11, 'name': 'Nov' },
    { 'id': 12, 'name': 'Dec' },
];
var currentYear = new Date().getFullYear();
var currentMonth = new Date().getMonth() + 1;


function letsCheck(year, month) {
    var daysInMonth = new Date(year, month, 0).getDate();
    var firstDay = new Date(year, month, 01).getUTCDay();
    var array = {
        daysInMonth: daysInMonth,
        firstDay: firstDay
    };
    return array;
}


function makeCalendar(year, month) {
    var getChek = letsCheck(year, month);
    getChek.firstDay === 0 ? getChek.firstDay = 7 : getChek.firstDay;
    $('#calendarList').empty();
    for (let i = 1; i <= getChek.daysInMonth; i++) {
        if (i === 1) {
            var div = '<li style="background-color:red;" id="' + i + '" style="grid-column-start: ' + getChek.firstDay + ';">1</li>';
        } else {
            var div = '<li id="' + i + '" >' + i + '</li>'
        }
        $('#calendarList').append(div);
    }
    monthName = months.find(x => x.id === month).name;
    $('#yearMonth').text(year + ' ' + monthName);
}

makeCalendar(currentYear, currentMonth);


function nextMonth() {
    currentMonth = currentMonth + 1;
    if (currentMonth > 12) {
        currentYear = currentYear + 1;
        currentMonth = 1;
    }
    $('#calendarList').empty();
    $('#yearMonth').text(currentYear + ' ' + currentMonth);
    makeCalendar(currentYear, currentMonth);
}


function prevMonth() {
    currentMonth = currentMonth - 1;
    if (currentMonth < 1) {
        currentYear = currentYear - 1;
        currentMonth = 12;
    }
    $('#calendarList').empty();
    $('#yearMonth').text(currentYear + ' ' + currentMonth);
    makeCalendar(currentYear, currentMonth);
}
</script>