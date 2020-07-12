<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Calendar</title>
    <style media="screen">
      #calendar_table
      {
        position: absolute;
        top: 25%;
        left: 50%;
        margin-left: -410px;
        margin-top: -125px;
      }
      #menubar
      {
        position: fixed;
        left: 50px;
        top: 250px;
        display: block;
      }
      #chat
      {
        position: fixed;
        right: 50px;
        bottom: 50px;
      }
      #user
      {
        float: right;
      }
      #caption
      {
        position: fixed;
        top : 50px;
        left : 43%;
      }
      #YYYYMM
      {
        display: inline-block;
      }
      #sendtile
      {
        background-color: #A9E2F3;
        color: white;
      }
      #senttile
      {
        background-color: #F5D0A9;
        color: white;
      }
      table, th, tr ,td
      {
        border: 1px
        solid skyblue;
        border-collapse: collapse
      }
      th
      {
        height: 30px
      }
      td
      {
        text-align: left;
        vertical-align: top;
        height: 100px;
      }
      tr td:nth-child(1)
      {
			  color: red;
		  }
      tr td:nth-child(7)
      {
			  color: blue;
		  }
    </style>
  </head>
  <body>
    <div id="user">
      OOO님, 환영합니다.
      <input type="button" name="logout" value="Log out">
    </div>
    <div id="caption">
      <input type="button" name="leftselect" value="<" onclick="prevMonth()">
        <font font size="6">
          <div id="YYYYMM">
          </div>
        </font>
      <input type="button" name="rightselect" value=">" onclick="nextMonth()">
    </div>
    <table id="calendar_table" align="center" width="820px">
      <colgroup>
        <col width="70" />
        <col width="70" />
        <col width="70" />
        <col width="70" />
        <col width="70" />
        <col width="70" />
        <col width="70" />
      </colgroup>
      <th style="background-color: #ebbcbc;">SUN</th>
      <th style="background-color: #ebbcbc;">MON</th>
      <th style="background-color: #ebbcbc;">TUE</th>
      <th style="background-color: #ebbcbc;">WED</th>
      <th style="background-color: #ebbcbc;">THU</th>
      <th style="background-color: #ebbcbc;">FRI</th>
      <th style="background-color: #ebbcbc;">SAT</th>
    </table>
    <div id="menubar">
     <a href="#"><img id="sms" src="icon/sms.png" alt="sms" width="75"></a><p>
     <a href="#"><img id="history" src="icon/his.png" alt="history" width="75"></a><p>
     <a href="#"><img id="cal" src="icon/cal.png" alt="calendar" width="75"></a><p>
     <a href="#"><img id="address" src="icon/address.png" alt="address" width="75"></a><p>
    </div>
    <a href="#"><img id="chat" src="icon/chat.png" alt="chat" width="75"></a>
    <script type="text/javascript">
      let today = new Date();
      let todayYear = today.getFullYear();
      let todayMonth = today.getMonth() + 1;
      let calendar = document.getElementById("calendar_table");

      function buildCalendar()
      {
        let firstDate = new Date(today.getFullYear(), today.getMonth(),1);
        let lastDate = new Date(today.getFullYear(), today.getMonth()+1,0);
        let day = firstDate.getDay();
        let week = Math.ceil(lastDate.getDate()/7) + 1;
        let today_yearMonth = todayYear + "년 " + todayMonth + "월";
        let leftDays = 7;
        let setDays = 1;
        let nextMonthDate = 1;

        let sendTile = "<div id='sendtile'style='visibility:hidden;'>send</div>"; //발송건수 영역 디폴트는 안보이게(영역은 차지)
        let sentTile = "<div id='senttile'style='visibility:hidden;'>sent</div>"; //예약건수 영억 디폴트는 안보이게(영역은 차지)
        let spaceTile = "<div id='spcetile'><br></div>"; //td내의 여백

        for(i = 1; i < week; i++)
        {
          let row = calendar.insertRow();
          while(day != 0)
          {
            row.insertCell().innerHTML = "";
            day -= 1;
            leftDays -= 1;
          } //1주
          while(leftDays != 0)
          {
            if(setDays > lastDate.getDate())
            {
              row.insertCell().innerHTML = "";
              leftDays -= 1;
              nextMonthDate += 1;
            }
            else
            {
              row.insertCell().innerHTML =  setDays + spaceTile + sendTile + sentTile;
              setDays += 1;
              leftDays -= 1;
            }
          }
          leftDays = 7;
        }
        setDays -= 1;

        if(setDays != lastDate.getDate())
        {
          let row = calendar.insertRow();
          while(setDays != lastDate.getDate())
          {
            setDays++;
            leftDays--;
            row.insertCell().innerHTML = setDays + spaceTile + sendTile + sentTile;
          }
          while(leftDays != 0)
          {
            row.insertCell().innerHTML = nextMonthDate;
            nextMonthDate++;
            leftDays--;
          }
        }
        document.getElementById("YYYYMM").innerHTML = today_yearMonth;
      }
      buildCalendar();

      function deleteCalendar()
      {
        while(calendar.rows.length > 1)
        {
          calendar.deleteRow(1);
        }
      }

      function prevMonth()
      {
        todayMonth = todayMonth - 1;
        if(todayMonth == 0)
        {
          todayMonth = 12;
          todayYear -= 1;
        }
        deleteCalendar();
        today = new Date(todayYear,todayMonth - 1);
        buildCalendar();
      }

      function nextMonth()
      {
        todayMonth += 1;
        if(todayMonth == 13)
        {
          todayMonth = 1;
          todayYear = todayYear + 1;
        }
        deleteCalendar();
        today = new Date(todayYear, todayMonth - 1);
        buildCalendar();
      }
      /*var tds = document.querySelectorAll('td');
      //tds[10].innerHTML = "hi"; // 이거된다 근데 기존 일자를 지우고 추가해버린다
      for(var i = 0, len = tds.length; i < len; i++)
      {

      }*/
    </script>
    <?php
     include "calphp.php";
    ?>
  </body>
</html>
