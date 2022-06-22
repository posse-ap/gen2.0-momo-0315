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