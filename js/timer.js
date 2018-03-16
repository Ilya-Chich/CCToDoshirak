//alert('Work!');
$(function () {
    var timertext = $("[timer]");
    setInterval(function () {
        $.post("timer.php", {type :"timerupdate"}, function (data) {
            timertext.html(data)
        })
    }, 10000)
});
