$(document).ready(function() {
    app.clock_init();
    app.wunderlist_init();
    app.weather_init();
});
var app = {
    clock: "",
    clock_init: function() {
        clock_update();
    },
    wunderlist_init: function() {
        var request = ajax("php/wunderlist.php", "");
        request.then(function(data) {
            var aj = JSON.parse(data);
            $(".app-wunderlist").html(aj.result);
        });
    },
    weather: "",
    weather_init: function() {
        var request = ajax("php/openweather_big.php", "");
        request.then(function(data) {
            var aj = JSON.parse(data);
            $(".app-weather__big").html(aj.result);
        });
        var request = ajax("php/openweather_small.php", "");
        request.then(function(data) {
            var aj = JSON.parse(data);
            $(".app-weather__small").html(aj.result);
        });
    }
}
/*********************************************
 *********************************************/
var days = ["Понедельник","Вторник","Среда","Четверг","Пятница","Суббота","Воскресенье"];
function ajax(url, data = "") {
    return $.ajax({
        url: url,
        type: 'POST',
        data: data
    });
}

function clock_update() {
    var currentTime = new Date();
    var currentHours = currentTime.getHours();
    var currentMinutes = currentTime.getMinutes();
    var currentSeconds = currentTime.getSeconds();
    currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
    currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;

    var tempDay = currentTime.getDay();
    var currentDay = currentTime.getDate();
    var currentMonth = currentTime.getMonth();
    currentMonth = (currentMonth < 10 ? "0" : "") + currentMonth;
    $(".app-clock").html(currentTimeString + "<span>" + currentDay + "." + currentMonth + "</span>" + "<span>" + days[tempDay - 1] + "</span>");
    setTimeout(function(){
        clock_update();
    }, 1000);
}