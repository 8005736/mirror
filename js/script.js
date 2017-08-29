$(document).ready(function() {
    app.clock = document.querySelector('#clock').getContext('2d');
    app.clock_init();
    app.wunderlist_init();
});
var app = {
    clock: "",
    clock_init: function() {
        this.clock.canvas.width = 500;
        this.clock.canvas.height = 500;
        this.clock.strokeStyle = '#28d1fa';
        this.clock.lineWidth = 16;
        this.clock.lineCap = 'round';
        this.clock.shadowBlur = 14;
        this.clock.shadowColor = '#28d1fa';
        setInterval(renderTime, 100);
    },
    wunderlist_init: function() {
        var request = ajax("php/wunderlist.php", "");
        request.then(function(data) {
            var aj = JSON.parse(data);
            $(".app_wunderlist").html(aj.result);
        });
    }
}
/*********************************************
 *********************************************/
function ajax(url, data = "") {
    return $.ajax({
        url: url,
        type: 'POST',
        data: data
    });
}

function degreeToRadian(degree) {
    return degree * Math.PI / 180;
}

function renderTime() {
    var now = new Date();
    var today = now.toDateString(now);
    var time = now.toLocaleTimeString(now);
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var miliSeconds = now.getMilliseconds();
    var newSeconds = seconds + (miliSeconds / 1000);
    // BACKGROUND
    var gradient = app.clock.createRadialGradient(250, 250, 5, 250, 250, 300);
    gradient.addColorStop(0, '#09303a');
    gradient.addColorStop(1, '#000');
    app.clock.fillStyle = gradient;
    app.clock.fillRect(0, 0, 500, 500);
    // HOURS
    app.clock.beginPath();
    app.clock.arc(250, 250, 200, degreeToRadian(270), degreeToRadian(hours * 15 - 90));
    app.clock.stroke();
    // MINUTES
    app.clock.beginPath();
    app.clock.arc(250, 250, 180, degreeToRadian(270), degreeToRadian(minutes * 6 - 90));
    app.clock.stroke();
    // SECONDS
    app.clock.beginPath();
    app.clock.arc(250, 250, 160, degreeToRadian(270), degreeToRadian(newSeconds * 6 - 90));
    app.clock.stroke();
    // DATE
    app.clock.font = '700 24px Arial, sans-serif';
    app.clock.fillStyle = '#28d1fa';
    app.clock.fillText(today, 150, 250);
    // TIME
    app.clock.font = '24px Arial, sans-serif';
    app.clock.fillText(time, 200, 290);
    document.querySelector('#image').src = app.clock.canvas.toDataURL();
}