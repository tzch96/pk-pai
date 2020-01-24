function checkAnswer(task, answer) {
    var userAnswerElement = 'answer' + task;
    userAnswer = document.getElementById(userAnswerElement).value;
    
    if (userAnswer === answer) {
        document.getElementById('grade' + task).innerText = 'Correct!';
    } else {
        document.getElementById('grade' + task).innerText = 'Wrong!';
    }
}