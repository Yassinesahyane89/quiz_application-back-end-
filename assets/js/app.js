/* ========================== Get Data ==========================  */
let quizData;
function getData() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "database.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // the request was successful, parse the response text as JSON
                try {
                    quizData = JSON.parse(xhr.responseText);
                    console.log(quizData);
                    Showdata();
                } catch (e) {
                    // if an error occurs while parsing the JSON, print an error message
                    console.error("Error parsing JSON: " + e.message);
                }
            } else {
                // the request was not successful, print an error message
                console.error("Error loading data: " + xhr.statusText);
            }
        }
    };
    xhr.send("action=executeFunction");
}

/* ========================== Global Variables ==========================  */
let Information = document.getElementById("informationquiz");
let Questionner = document.getElementById("Questionnairequiz");
let tableresult = document.getElementById("tableresult");
let Titlepage = document.getElementById("headerTitle");


/* ========================== information page ==========================  */
let progress = document.getElementById("progress");
let circles = document.querySelectorAll(".circle");

let currentActive = 0;

Questionner.style.display = "none";
tableresult.style.display = "none";

function ProgressBarCheck() {
    currentActive++;

    if ((currentActive <= circles.length-1) && (currentActive >= 0)) {
        update();
    }
}

function update() {
    circles.forEach((circle, index) => {
        if (index <= currentActive) {
            circle.classList.add("active");
        }
    });

    const actives = document.querySelectorAll(".active");

    progress.style.width =((actives.length - 1) / (circles.length - 1)) * 100 + "%";

    Questionner.style.display = "block";
    Information.style.display = "none";
    if(currentActive==1){
        getData();
    }
    if(currentActive==2){
        Arrayanswer.sort((a, b) =>
            a.id > b.id ? 1 : a.id < b.id ? -1 : 0
        );
        console.log(Arrayanswer);
        getresult();
    }
}
/* ========================== Quiz page ==========================  */
let answerlabel = document.querySelectorAll(".answer");
let questions = document.querySelector("#Currentquestion");
let answer_a = document.getElementById("answer_a");
let answer_b = document.getElementById("answer_b");
let answer_c = document.getElementById("answer_c");
let answer_d = document.getElementById("answer_d");
let currentquestion = document.getElementById("questionNumber");
let totalquestion = document.getElementById("total_question");
let submitBtn = document.getElementById("submitQuiz");
let seconds = document.getElementById("second_time");


let score = 0;
let timeanswer;
let myInterval;
let Arrayanswer = [];
let prevquestion = [];
let questionindex;
let currentQuiz = 0;

function getRndInteger(min, max) {
  let NumberRund;
  do {
    NumberRund = Math.floor(Math.random() * (max - min)) + min;
  } while (prevquestion.includes(NumberRund));
  return NumberRund;
}

function Showdata() {

    totalquestion.innerText = quizData.length;
    questionindex = getRndInteger(0, quizData.length);
    prevquestion.push(questionindex);
    console.log(prevquestion);
    console.log(questionindex);
    currentQuiz++;
    console.log("jjjjj   ",currentQuiz);
    console.log(Arrayanswer);
    prog.style.width = ((currentQuiz) / quizData.length) * 100 + "%";

    Titlepage.innerHTML = "AWS Cloud Practitioner Knowledge Test ";

    deselectAnswers();

    const currentQuizData = quizData[questionindex];

    currentquestion.innerText = currentQuiz;
    questions.innerHTML = currentQuizData.question;
    console.log(questions.innerHTML);
    answer_a.innerText = currentQuizData.a;
    answer_b.innerText = currentQuizData.b;
    answer_c.innerText = currentQuizData.c;
    answer_d.innerText = currentQuizData.d;
}

submitBtn.addEventListener("click", () => {
    const answer = getSelected();
    if (answer) {

        if (answer === quizData[questionindex].correct) {
            score++;
        }
        Arrayanswer.push({id: quizData[questionindex].id,answer: answer});

        if (currentQuiz < quizData.length) {
            Showdata();
        }else{
            ProgressBarCheck();
        }
    }
});

function deselectAnswers() {
    answerlabel.forEach((answerEl) => {
        answerEl.checked = false;
    });
}

function getSelected() {
    let answer = undefined;

    answerlabel.forEach((answerEl) => {
        if (answerEl.checked) {
            answer = answerEl.id;
        }
    });

    return answer;
}

/* ========================== Get result ==========================  */
let resultdata;
function getresult() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "database.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
      if (xhr.status == 200) {
        // the request was successful, parse the response text as JSON
        try {
          resultdata = JSON.parse(xhr.responseText);
          console.log(resultdata);
          Quizresult();
        } catch (e) {
          // if an error occurs while parsing the JSON, print an error message
          console.error("Error parsing JSON: " + e.message);
        }
      } else {
        // the request was not successful, print an error message
        console.error("Error loading data: " + xhr.statusText);
      }
    }
  };
  xhr.send("action=geteresult");
}

// /* ========================== Result page ==========================  */
let quizresult = document.querySelector(".result_quiz");
let questionEl_corr = document.getElementById("question_corr");
let answer_a_corr = document.getElementById("answer_a_corr");
let answer_b_corr = document.getElementById("answer_b_corr");
let answer_c_corr = document.getElementById("answer_c_corr");
let answer_d_corr = document.getElementById("answer_d_corr");
let explan_corr = document.getElementById("explan_corr");

function Quizresult(){
    Titlepage.innerHTML = "Result Quiz ";
    Questionner.style.display = "none";
    tableresult.style.display = "block";
    for (let i = 0; i < quizData.length; i++) {
        let result;
        if (Arrayanswer[i].answer == resultdata[i].correct) {
          result = true;
        } else {
          result = false;
        }
        quizresult.innerHTML += `
                            <tr>
                                <td>Question - ${i + 1} </td>
                                <td id="useranswer">${Arrayanswer[i].answer}</td>
                                <td>${result}</td>
                                <td><button class="d-flex align-items-center border-0 border-top" data-bs-toggle="modal" data-bs-target="#modal" onclick="Quizdetail(this)" useranswer="${Arrayanswer[i].answer}"  data-id="${i}">View detail</button></td>
                            </tr>
                            `;
    }
}

function Quizdetail(element) {
    Resetquizdetail();
    let userquiz = element.getAttribute("useranswer");
    let id = element.getAttribute("data-id");
    const currentQuizData = quizData[id];
    questionEl_corr.innerText = currentQuizData.question;
    answer_a_corr.innerText = currentQuizData.a;
    answer_b_corr.innerText = currentQuizData.b;
    answer_c_corr.innerText = currentQuizData.c;
    answer_d_corr.innerText = currentQuizData.d;
    document.getElementById(resultdata[id].correct + "_corr").checked = true;
    document.getElementById(resultdata[id].correct + "_corr_answer"
    ).style.backgroundColor = "green";
    if (resultdata[id].correct != userquiz && userquiz != "Noanswer") {
      document.getElementById(userquiz + "_corr_answer").style.backgroundColor =
        "red";
    }
    explan_corr.innerText = resultdata[id].explan;
}

function Resetquizdetail() {
    document.getElementById("a_corr_answer").style.backgroundColor = "white";
    document.getElementById("b_corr_answer").style.backgroundColor = "white";
    document.getElementById("c_corr_answer").style.backgroundColor = "white";
    document.getElementById("d_corr_answer").style.backgroundColor = "white";
}