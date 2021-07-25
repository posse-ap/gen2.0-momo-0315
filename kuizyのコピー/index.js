'use strict';
let option = [["たかなわ", "こうわ", "たかわ"],
             ["かめいど", "かめと", "かめど"],
             ["こうじまち", "おかとまち", "かゆまち"],
             ["ごせいもん", "おなりもん", "おかどもん"],
             ["たたら", "たたりき", "とどろき"],
             ["しゃくじい", "いじい", "せきこうい"],
             ["ざっしき", "ざっし", "ぞうしき"],
             ["おかちまち", "ごしろまち", "みとちょう"],
             ["ししぼね", "しこね", "ろっこつ"],
             ["こぐれ", "こしゃく", "こばく"]];


let img =  ["https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png",
            "https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png",
            "https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png",
            "https://d1khcm40x1j0f.cloudfront.net/quiz/ee645c9f43be1ab3992d121ee9e780fb.png",
            "https://d1khcm40x1j0f.cloudfront.net/quiz/6a235aaa10f0bd3ca57871f76907797b.png",
            "https://d1khcm40x1j0f.cloudfront.net/quiz/0b6789cf496fb75191edf1e3a6e05039.png",
            "https://d1khcm40x1j0f.cloudfront.net/quiz/23e698eec548ff20a4f7969ca8823c53.png",
            "https://d1khcm40x1j0f.cloudfront.net/quiz/50a753d151d35f8602d2c3e2790ea6e4.png",
            "https://d1khcm40x1j0f.cloudfront.net/words/8cad76c39c43e2b651041c6d812ea26e.png",
            "https://d1khcm40x1j0f.cloudfront.net/words/34508ddb0789ee73471b9f17977e7c9c.png"];


for (let i = 0; i < 10; i++) {

    let question = `<h2> ${i + 1}. この地名はなんて読む？</h2> ` + `<img src="${img[i]}"/>` + `<li>${option[i][0]}</li><li>${option[i][1]}</li><li>${option[i][2]}</li>`

    document.getElementById("question_area").insertAdjacentHTML("beforeend", question);
}


{/* それぞれの選択肢にquestionNumber, optionNumber, answerNumberをつけて、optionNumber,とanswerNumberが一緒だったら正解 */}
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