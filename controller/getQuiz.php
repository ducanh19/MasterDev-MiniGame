<?php
    session_start();
    $ques = new class{};
    $ques->statusAnswer = true;

    if (isset($_SESSION['correctAnsIndex']) && $_POST['answer'] != $_SESSION['correctAnsIndex']) {
        $ques->statusAnswer = false;
        die(json_encode($ques));
    } else if (isset($_SESSION['correctAnsIndex'])) {
        $_SESSION['score'] += 1;
    }

    include '../model/quiz.php';
    $q = new Quiz();
    // Gen new question.
    $q->genQuiz();
    $_SESSION['correctAnsIndex'] = $q->correctAnsIndex;

    $ques->question = $q->firstNum . $q->operator . $q->secondNum;
    $ques->answer = $q->ans;
    $ques->score = $_SESSION['score'];

    echo json_encode($ques);
?>