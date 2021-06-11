<?php
class Quiz {
    public $firstNum;
    public $secondNum;
    public $operator;
    public $ans = array();
    public $correctAnsIndex;

    /**
     * Generate number element.
     */
    function genNum() {
        return rand(3, 99);
    }

    /**
     * '0' is plus operator.
     * '1' is substract operator.
     * '2' is mutilple operator.
     */
    function genOperator() {
        $x = rand(0, 2);
        switch ($x) {
            case '0':
                return '+';
            case '1':
                return '-';
            case '2':
                return 'x';
        }
    }

    /**
     * Generate wrong answer.
     */
    function genWrongAns() {
        while (true) {
            $newNum1 = (rand(1,2) % 2 == 0) ? $this->firstNum - 10 * rand(1, 3) : $this->firstNum + 10 * rand(1,3);
            $newNum2 = (rand(1,2) % 2 == 0) ? $this->secondNum - 10 * rand(1, 3) : $this->secondNum + 10 * rand(1,3);
            $result = $this->getResult($newNum1, $newNum2, $this->operator);

            if (!$this->isExisted($result)) {
                return $result;
            }
        }
    }

    /**
     * Check exist result when generating WRONG answer.
     */
    function isExisted($result) {
        foreach ($this->ans as $key) {
            if ($key == $result) {
                return true;
            }
        }
        return false;
    }

    /**
     * Generate answer list.
     */
    function genAnsList() {
        $this->ans;

        $this->ans[$this->correctAnsIndex] = $this->getResult($this->firstNum, $this->secondNum, $this->operator);
        for ($i=0; $i < 4; $i++) { 
            if ($i == $this->correctAnsIndex) {
                continue;
            }

            $this->ans[$i] = $this->genWrongAns();
        }
    }

    /**
     * Get correct answer.
     */
    function getResult($firstNum, $secondNum, $operator) {
        switch ($operator) {
            case '+':
                return $firstNum + $secondNum;
            case '-':
                return $firstNum - $secondNum;
            case 'x':
                return $firstNum * $secondNum;
        }
    }

    /**
     * Generate new quiz.
     */
    function genQuiz() {
        $this->firstNum = $this->genNum();
        $this->secondNum = $this->genNum();
        $this->operator = $this->genOperator();
        $this->correctAnsIndex = rand(0,3);
        $this->genAnsList();
    }
}
