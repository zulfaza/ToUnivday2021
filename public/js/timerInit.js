function timerInit(id, countDownDate, ExpiredFuntion) {
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        let count = "";

        if (seconds < 10) seconds = "0" + seconds;
        if (minutes < 10) minutes = "0" + minutes;
        if (days < 10) days = "0" + days;
        if (hours < 10) hours = "0" + hours;

        if (days !== "00") count += `${days} : `;
        if (hours !== "00" || days !== "00") count += `${hours} : `;
        count += `${minutes} : ${seconds}`;

        document.getElementById(id).innerHTML = count;
        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            ExpiredFuntion();
            document.getElementById(id).innerHTML = "EXPIRED";
        }
    }, 1000);
}
