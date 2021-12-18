'use strict';

// この地名はなんて読む＋画像＋選択肢+解答ボックスのるーぷ
for (let i = 0; i < 10; i++) {
    let question =
        `<h2> ${i + 1}. この地名はなんて読む？</h2> `
        + `<img src="<?php  echo $img_result['image'];?>"/>`
        + `<ul id="answerLists_${i}" style="display: flex;flex-direction: column">
        <li id="answerList_${i}_0" onclick="check(${i},0,0)">${option[i][0]}</li>
        <li id="answerList_${i}_1" onclick="check(${i},1,0)">${option[i][1]}</li>
        <li id="answerList_${i}_2" onclick="check(${i},2,0)">${option[i][2]}</li>
      </ul>`
        + `<div class="answerBox" id="answerBox_${i}_0">
         <p class="rightWrong right">正解</p>
         <p class="description">正解は「${option[i][0]}」です！</p>
       </div> `
        + `<div class="answerBox" id="answerBox_${i}">
         <p class="rightWrong wrong">不正解</p>
         <p class="description">正解は「${option[i][0]}」です！</p>
        </div>`

    document.getElementById("question_area").insertAdjacentHTML("beforeend", question);//htmlに作ったdivタグに入れる
    // htmlに作ったdivタグに入れる

    //htmlに作ったdivタグに入れる
    // let listItems = document.querySelectorAll(`#answerLists_${i} li`)

    //ランダム関数 0,1,2の乱数を取ってくる    
    // function rand() {
    //     var choice_order = Math.floor(Math.random() * 3);
    //     return choice_order;
    // }
    //htmlコレクションを配列にする styleをorderにする
    // Array.from(listItems).forEach(elm => { elm.style.order = rand() });
};

// 選択肢に引数を与える optionNumberとanswerNumberが同じだったら正解
var check = function (questionNumber, optionNumber, answerNumber) {

    let questionOptionNumber = document.getElementById("answerList_" + questionNumber + "_" + optionNumber);//クリックしたliのidを取得
    let alwaysAnswerNumber = document.getElementById("answerList_" + questionNumber + "_1");//常に正解（最初の選択肢）を取得
    let click_invalidation = document.getElementById('answerLists_' + questionNumber);//三つの選択肢を取得・クリック不可にするため

    if (optionNumber === answerNumber) {

        questionOptionNumber.classList.add("correct_answer");//正解の選択肢の色を青にする
        const correctAnswerBox = document.getElementById("answerBox_" + questionNumber + "_" + optionNumber);//正解のボックスを表示（displayをnoneからblockに）
        correctAnswerBox.style.display = "block";
        click_invalidation.classList.add("click_invalidation");//クリック不可

    } else {

        questionOptionNumber.classList.add("incorrect_answer");//不正解の選択肢を赤にする
        alwaysAnswerNumber.classList.add("correct_answer");//正解の選択肢を青にする
        const incorrectAnswerBox = document.getElementById("answerBox_" + questionNumber);//不正解のボックスを表示（displayをnoneからblockに）
        incorrectAnswerBox.style.display = "block";
        click_invalidation.classList.add("click_invalidation");//クリック不可
    }
}