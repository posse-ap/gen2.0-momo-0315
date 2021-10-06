let option = new Array();
option.push(['たかなわ', 'こうわ', 'たかわ']);
option.push(['かめいど', 'かめと', 'かめど']);
option.push(['こうじまち', 'おかとまち', 'かゆまち']);

let img = ["https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png",
    "https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png",
    "https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png"];

function check(question_id, option_id, correct_id) {

    var options = document.getElementById(`question_${question_id}`);
    var incorrectOption = document.getElementById(`answer_list_${question_id}_${option_id}`);
    var correctOption = document.getElementById(`answer_list_${question_id}_${correct_id}`);
    var anserBox = document.getElementById('');
    var anserBoxText = document.getElementById('');


    options.style.pointerEvents = 'none';

    if (option_id === correct_id) {
        console.log('せいかい');
        correctOption.classList.add('correct_answer')


    } else {
        console.log('違うよ');
        correctOption.classList.add('correct_answer')
        incorrectOption.classList.add('incorrect_answer')
    }

}
function HTML () {
option.forEach(function (double_array, index1) {
    let text = `<h1 class="question_tittle">${index1 + 1}.この地名はなんて読む？</h1>`
        + `<img src="${img[index1]}" alt="">`
        + `<ul class="option_ul" id="question_${index1}">`

    double_array.forEach(function (single_array, index2) {
        text += `<li class="option_list" id="answer_list_${index1}_${index2}" name="answer_list_${index2}" onclick="check(${index1},${index2},0)">${single_array}</li>`;

    //listをシャッフル
        let = listItems = document.getElementsByName(`answer_list_${index2}`)
        function rand() {
            var choice_order = Math.floor(Math.random() * 2);
            return choice_order;
        }
        listItems.forEach(elm => { elm.style.order = rand() });
    }
    )
    text += 
    `</ul>`
    +`<div class="answer_box">`
    +`<p class="answer_box_text" id="answer_box_text_${index1}">正解！`
    +`</p>`
    +`<p>正解はです！`
    +`</p>`
    +`</div>`
    document.getElementById("html_element").insertAdjacentHTML('beforeend', text);
});
}

HTML();