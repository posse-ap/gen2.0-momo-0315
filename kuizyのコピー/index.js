'use strict';
document.getElementById('correctBox1').style.display = "none";
document.getElementById('incorrectBox1').style.display = "none";
document.getElementById('incorrectBox2').style.display = "none";
// document.querySelectorAll(".answerBox").style.display = "none";

const success = document.getElementById("success");
const failed1 = document.getElementById("failed1");
const failed2 = document.getElementById("failed2");

// document.getElementById('correct1').onclick = function () {
//     correct1.classList.add('click_invalidation')
//     incorrect1.classList.add('click_invalidation')
//     incorrect2.classList.add('click_invalidation')
//     const a = document.getElementById("ok");
//     a.style.display = "block";
//     this.classList.toggle("after");
// }

// 正解の処理
//  function click_correct1() {
//      correct1.classList.add('click_invalidation');
//      incorrect1.classList.add('click_invalidation');
//      incorrect2.classList.add('click_invalidation');
//      // TODO:id名、変数名をわかりやすいものに変える
//      const a = document.getElementById("correctBox1");
//      a.style.display = "block";
//      correct1.classList.add("correct_answer");
//  }

// 不正解の処理
//   document.getElementById("incorrect1").onclick = function () {
//      correct1.classList.add('click_invalidation');
//      incorrect1.classList.add('click_invalidation');
//      incorrect2.classList.add('click_invalidation');
//      const b = document.getElementById("1");
//      b.style.display = "block";

//      incorrect1.classList.add("incorrect_answer");
//  }


// for (var i = 1; i < 10; i++) {
//     document.getElementById("incorrect" + i).onclick = function () {
//         correct1.classList.add('click_invalidation');
//         incorrect1.classList.add('click_invalidation');
//         incorrect2.classList.add('click_invalidation');
//         const b = document.getElementById("incorrectBox1");
//         b.style.display = "block";

//         incorrect1.classList.add("incorrect_answer");
//     }

var check = function (questionNumber, optionNumber, answerNumber){

    if (optionNumber == answerNumber) {
        const a = document.getElementById("correctBox1");
        a.style.display = "block";
        answerList.classList.add("correct_answer");

    }



}
