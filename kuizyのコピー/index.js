'use strict';

//それぞれの選択肢にquestionNumber, optionNumber, answerNumberをつけて、optionNumber,とanswerNumberが一緒だったら正解
var check = function (questionNumber, optionNumber, answerNumber) {

    let questionOptionNumber = document.getElementById("answerList_" + questionNumber + "_" + optionNumber);
    let alwaysAnswerNumber = document.getElementById("answerList_" + questionNumber + "_1");
    let click_invalidation = document.getElementById('answerLists_' + questionNumber);

    if (optionNumber === answerNumber) {

        questionOptionNumber.classList.add("correct_answer");

        const correctAnswerBox = document.getElementById("answerBox_" + questionNumber + "_" + optionNumber);
        correctAnswerBox.style.display = "block";
        
        click_invalidation.classList.add("click_invalidation");

    } else {

        questionOptionNumber.classList.add("incorrect_answer");
        alwaysAnswerNumber.classList.add("correct_answer");
        const incorrectAnswerBox = document.getElementById("answerBox_" + questionNumber);
        incorrectAnswerBox.style.display = "block";
        click_invalidation.classList.add("click_invalidation");
    }
}