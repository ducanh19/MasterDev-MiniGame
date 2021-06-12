var min = parseInt(parseInt(document.getElementById('timelimit').value) / 60);
var sec = parseInt(document.getElementById('timelimit').value) % 60;
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
            window.location.href = "http://localhost/quiz/controller/control.php";
        }
    } else {
        document.getElementById('time').innerHTML = "Time remaining: " + min + "m " + sec + "s";
        sec = parseInt(sec) - 1;
    }
}

function fillTextQues(JSONstring) {
    let quiz = JSON.parse(JSONstring);
    
    if (quiz.statusAnswer == true) {
        document.getElementsByClassName("score")[0].innerHTML = "Your score: " + quiz.score;
    } else {
        window.location.href = "http://localhost/quiz/controller/control.php";
        return;
    }

    document.getElementById('question').innerHTML = quiz.question;

    let ans = document.getElementsByName('answer');
    for (let index = 0; index < ans.length; index++) {
        ans[index].innerHTML = quiz.answer[index];
    }
}

function ajax_getQues(answer) {
    $.ajax({
        url: "controller/getQuiz.php",
        type: "post",
        data: {"answer":answer},
        success: function(data) {
            fillTextQues(data);
        },
        error: function(xhr, status, error) {
            alert("---" + xhr + "---" + status + "---" + error + "---");
        }
    });
}