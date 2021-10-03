let option = new Array();
option.push(['たかなわ', 'こうわ', 'たかわ']);
option.push(['かめいど', 'かめと', 'かめど']);
option.push(['こうじまち', 'おかとまち', 'かゆまち']);

let img = ["https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png",
    "https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png",
    "https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png"];


function check () {

}

option.forEach(function(double_array,index){
let text = `<h1 class="question_tittle">${index+1}.この地名はなんて読む？</h1>`
            +`<img src="${img[index]}" alt="">`
            +`<ul class="option_ul">`
      


    double_array.forEach(function(single_array,index){
text += `<li class="option_list" id="option_list_${index}" name="option_list_${index}">${single_array}</li>`
    })
       

document.getElementById("html_element").insertAdjacentHTML('beforeend',text);
}) 