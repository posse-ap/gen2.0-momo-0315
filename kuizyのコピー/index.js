'use strict';

// id置き換えた
// const success = document.getElementById("success");
// const failed1 = document.getElementById("failed1");
// const failed2 = document.getElementById("failed2");

// 正解の処理 義凸の問題なら動く htmlのonclick書いた版
// document.getElementById('correct1').onclick = function () {
//     correct1.classList.add('click_invalidation')
//     incorrect1.classList.add('click_invalidation')
//     incorrect2.classList.add('click_invalidation')
//     const a = document.getElementById("ok");
//     a.style.display = "block";
//     this.classList.toggle("after");
// }

// 正解の処理 義凸の問題なら動く htmlのonclick書いた版
//  function click_correct1() {
//      correct1.classList.add('click_invalidation');
//      incorrect1.classList.add('click_invalidation');
//      incorrect2.classList.add('click_invalidation');
//      // TODO:id名、変数名をわかりやすいものに変える
//      const a = document.getElementById("correctBox1");
//      a.style.display = "block";
//      correct1.classList.add("correct_answer");
//  }

// 不正解の処理 一つの問題なら動く
//   document.getElementById("incorrect1").onclick = function () {
//      correct1.classList.add('click_invalidation');
//      incorrect1.classList.add('click_invalidation');
//      incorrect2.classList.add('click_invalidation');
//      const b = document.getElementById("1");
//      b.style.display = "block";

//      incorrect1.classList.add("incorrect_answer");
//  }


// idを連番にして、複数id取得しようとしたけど意味なかった
// for (var i = 1; i < 10; i++) {
//     document.getElementById("incorrect" + i).onclick = function () {
//         correct1.classList.add('click_invalidation');
//         incorrect1.classList.add('click_invalidation');
//         incorrect2.classList.add('click_invalidation');
//         const b = document.getElementById("incorrectBox1");
//         b.style.display = "block";

//         incorrect1.classList.add("incorrect_answer");
//     }

// 番号つけて正誤判定しようとした 正誤判定まではできるけど、その後id使うと結局一つしかできない
var check = function (questionNumber, optionNumber, answerNumber) {

    let questionOptionNumber = document.getElementById("answerList_" + questionNumber + "_" + optionNumber);
    let alwaysAnswerNumber = document.getElementById("answerList_" + questionNumber + "_1");
    
    if (optionNumber === answerNumber) {

        questionOptionNumber.classList.add("correct_answer");

        const correctAnswerBox = document.getElementById("answerBox_" + questionNumber + "_" + optionNumber);
        correctAnswerBox.style.display = "block";

        let click_invalidation = document.querySelectorAll("answerList");
        click_invalidation.classList.add("click_invalidation");
    } else {

        questionOptionNumber.classList.add("incorrect_answer");
        alwaysAnswerNumber.classList.add("correct_answer");
        const incorrectAnswerBox = document.getElementById("answerBox_" + questionNumber);
        incorrectAnswerBox.style.display = "block";
    }
}


