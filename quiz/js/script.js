var min = document.getElementById('min').value;
var sec = document.getElementById('sec').value;
var correctIndex = document.getElementById('correct').value;
var timer = setInterval(countDown, 1000);

function countDown() {
    if (parseInt(sec) == 0) {
        if (parseInt(min) > 0) {
            document.getElementById('time').innerHTML = "Time remaining: " + min + "m " + sec + "s";
            min = parseInt(min) - 1;
            sec = parseInt(59);
        } else {
            clearInterval(timer);
            document.getElementById('time').innerHTML = "Time remaining: " + min + "m " + sec + "s";
            document.getElementById('min').value = min;
            document.getElementById('sec').value = sec;
            document.getElementById('myForm').submit();
        }
    } else {
        document.getElementById('time').innerHTML = "Time remaining: " + min + "m " + sec + "s";
        sec = parseInt(sec) - 1;
    }
}

window.onclick = e => {
    if (e.target.tagName == "BUTTON") {
        if (parseInt(e.target.value) == parseInt(correctIndex)) {
            e.target.style.backgroundColor = "#00f701";
        }

        document.getElementById('min').value = min;
        document.getElementById('sec').value = sec;
    }
}