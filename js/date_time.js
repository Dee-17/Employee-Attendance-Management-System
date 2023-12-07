function date_time() {         
    try {
        var month_name = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var day_name = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        var today = new Date();
        // sets date for the day
        document.getElementById('day_today').innerHTML = (day_name[today.getDay()]);
        document.getElementById('full_date').innerHTML = (month_name[today.getMonth()] + ' ' + today.getDate() + ', ' + today.getFullYear()).toUpperCase();
    } catch (error) {
        // wala lang
    }
    // get the current time
    var hour = today.getHours();
    var minute = today.getMinutes();
    var second = today.getSeconds();
    var day = hour<12 ? "AM": "PM";
    // format
    hour = hour<10? '0'+hour: hour;
    minute = minute<10? '0'+minute: minute;
    second = second<10? '0'+second: second;
    // convert into 12hr format
    var new_hour = hour>12 ? hour-12: hour;
    // display current time
    document.getElementById('hour').innerHTML = new_hour;
    document.getElementById('minute').innerHTML = minute;
    document.getElementById('second').innerHTML = second;
    document.getElementById('am_pm').innerHTML = day;

} var inter = setInterval(date_time,1000)

