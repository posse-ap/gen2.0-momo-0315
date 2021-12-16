'use strict';
// 選択肢の配列
// let option = [["たかなわ", "こうわ", "たかわ"],//問１の選択肢
// ["かめいど", "かめと", "かめど"],//問２の選択肢
// ["こうじまち", "おかとまち", "かゆまち"],//問３の選択肢
// ["おなりもん", "ごせいもん", "おかどもん"],//問４の選択肢
// ["とどろき", "たたりき", "たたら"],//問５の選択肢
// ["しゃくじい", "いじい", "せきこうい"],//問６の選択肢
// ["ぞうしき", "ざっし", "ざっしき"],//問７の選択肢
// ["おかちまち", "ごしろまち", "みとちょう"],//問８の選択肢
// ["ししぼね", "しこね", "ろっこつ"],//問９の選択肢
// ["こぐれ", "こしゃく", "こばく"]];//問１０の選択肢

// 画像の配列
// let img = ["https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png",//画像１
//     "https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png",//画像２
//     "https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png",//画像３
//     "https://d1khcm40x1j0f.cloudfront.net/quiz/ee645c9f43be1ab3992d121ee9e780fb.png",//画像４
//     "https://d1khcm40x1j0f.cloudfront.net/quiz/6a235aaa10f0bd3ca57871f76907797b.png",//画像５
//     "https://d1khcm40x1j0f.cloudfront.net/quiz/0b6789cf496fb75191edf1e3a6e05039.png",//画像６
//     "https://d1khcm40x1j0f.cloudfront.net/quiz/23e698eec548ff20a4f7969ca8823c53.png",//画像７
//     "https://d1khcm40x1j0f.cloudfront.net/quiz/50a753d151d35f8602d2c3e2790ea6e4.png",//画像８
//     "https://d1khcm40x1j0f.cloudfront.net/words/8cad76c39c43e2b651041c6d812ea26e.png",//画像９
//     "https://d1khcm40x1j0f.cloudfront.net/words/34508ddb0789ee73471b9f17977e7c9c.png"];//画像１０

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
    let listItems = document.querySelectorAll(`#answerLists_${i} li`)

    //ランダム関数 0,1,2の乱数を取ってくる    
    function rand() {
        var choice_order = Math.floor(Math.random() * 3);
        return choice_order;
    }
    //htmlコレクションを配列にする styleをorderにする
    Array.from(listItems).forEach(elm => { elm.style.order = rand() });
};

// 選択肢に引数を与える optionNumberとanswerNumberが同じだったら正解
var check = function (questionNumber, optionNumber, answerNumber) {

    let questionOptionNumber = document.getElementById("answerList_" + questionNumber + "_" + optionNumber);//クリックしたliのidを取得
    let alwaysAnswerNumber = document.getElementById("answerList_" + questionNumber + "_0");//常に正解（最初の選択肢）を取得
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