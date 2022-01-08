var startTime = 0;
var stopTime = 0;
var isActive = false;

function startStopTask() {
    countTime();
    // alert(getInput());
}

function countTime() {
    if (!isActive) {
        isActive = true;
        startTime = Date.now();

        setInterval(() => {
            if (isActive) {
                updateDisplayTime(Date.now() - startTime);
            }
        }, 1000);

    } else {
        isActive = false;
        stopTime = Date.now();
    }
}

function getInput() {
    let inputEl = document.getElementsByClassName('tracker__task__name__input')[0];
    return inputEl?.value;
}

function updateDisplayTime(time) {
    time = parseTime(time);
    let timeEl = document.getElementsByClassName('tracker__task__time')[0];
    if (timeEl) {
        timeEl.innerText = time.toString();
    }
}

function parseTime(ms) {
    var seconds = (ms / 1000).toFixed(0);
    var minutes = Math.floor(seconds / 60);
    var hours = "";
    if (minutes > 59) {
        hours = Math.floor(minutes / 60);
        hours = (hours >= 10) ? hours : "0" + hours;
        minutes = minutes - (hours * 60);
        minutes = (minutes >= 10) ? minutes : "0" + minutes;
    }

    seconds = Math.floor(seconds % 60);
    seconds = (seconds >= 10) ? seconds : "0" + seconds;
    if (hours !== "") {
        return hours + ":" + minutes + ":" + seconds;
    }
    return minutes + ":" + seconds;
}