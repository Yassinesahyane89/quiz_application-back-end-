<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AWS Cloud</title>
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
	<!-- for sweetalert2 library -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<!-- ================== BEGIN Stepper Component ================== -->
<div class="progress-container">
    <div class="progress" id="progress"></div>
    <div class="steps">
        <div class="circle active">1</div>
    </div>
    <div class="steps">
        <div class="circle">2</div>
    </div>
    <div class="laststeps steps">
        <div class="circle">3</div>
    </div>
</div>
<!-- ================== END Stepper Component ================== -->
<!-- ================== BEGIN Information Page ================== -->
<h1 id="headerTitle">Quiz application</h1>
<div class="quiz-container startpage" id="informationquiz">
	<div class="quiz-header">
		<h2 id="question">Information</h2>
		<ul>
			<li>
				<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat labore voluptatum velit a illum similique, possimus nam sapiente at, corporis recusandae unde nobis magnam iste et! A enim numquam adipisci.</p>
			</li>
			<li>
				<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat labore voluptatum velit a illum similique, possimus nam sapiente at, corporis recusandae unde nobis magnam iste et! A enim numquam adipisci.</p>
			</li>

		</ul>
	</div>
	<button id="startquiz" onclick="ProgressBarCheck()">Start</button>
</div>
<!-- ================== END Information Page ================== -->
<!-- ================== BEGIN Questionnaire Page ================== -->
<div class="quiz-container" id="Questionnairequiz">
	<div class="quiz-header">
		<h2 id="Currentquestion">Question</h2>
		<ul>
			<li>
				<input type="radio" id="a" name="answer" class="answer" />
				<label id="answer_a" for="a">Answer</label>
			</li>
			<li>
				<input
						type="radio" id="b" name="answer" class="answer" />
				<label id="answer_b" for="b">Answer</label>
			</li>
			<li>
				<input type="radio" id="c" name="answer" class="answer" />
				<label id="answer_c" for="c">Answer</label>
			</li>
			<li>
				<input type="radio" id="d" name="answer" class="answer" />
				<label id="answer_d" for="d">Answer</label>
			</li>
		</ul>
	</div>
	<div class="ProgressBar" id="ProgressBar">
		<div class="progress" id="prog"></div>
	</div>
	<div class="fotter">
		<div class="Etat-quiz">
			<p>Q<span id="questionNumber">1</span>/<span id="total_question">0</span> </i><span class="time-question"><i class="fa-solid fa-clock"></i><span id="second_time">00</span></span></p>
		</div>
		<button id="submitQuiz">Submit</button>
	</div>
</div>
<!-- ================== END Questionnaire Page ================== -->
<!-- ================== BEGIN Result Page ================== -->
<div class="tableau-bd" id="tableresult">
	<h2>Table for Result</h2>
	<table>
		<thead>
		<tr>
			<th>Question</th>
			<th>Your answer</th>
			<th>Correction</th>
			<th>More detail</th>
		</tr>
		</thead>
		<tbody class="result_quiz">

		</tbody>
	</table>
</div>
<!-- ================== END Result Page ================== -->
<!-- ================== START TASK MODAL ================== -->
<div class="modal fade" id="modal">
	Modal content goes here
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="quiz-header">
				<h2 id="question_corr">Question</h2>
				<ul>
					<li id="a_corr_answer">
						<input type="radio" id="a_corr" name="answer" class="answer" />
						<label id="answer_a_corr" for="a">Answer</label>
					</li>
					<li id="b_corr_answer">
						<input type="radio" id="b_corr" name="answer" class="answer" />
						<label id="answer_b_corr" for="b">Answer</label>
					</li>
					<li id="c_corr_answer">
						<input type="radio" id="c_corr" name="answer" class="answer" />
						<label id="answer_c_corr" for="c">Answer</label>
					</li>
					<li id="d_corr_answer">
						<input type="radio" id="d_corr" name="answer" class="answer" />
						<label id="answer_d_corr" for="d">Answer</label>
					</li>
				</ul>
			</div>
			<div class="fotter">
				<h2 id="question_corr">Explination</h2>
				<p id="explan_corr"></p>
			</div>
		</div>
	</div>
</div>
<!-- ================== END TASK MODAL ================== -->
<!-- ================== BEGIN core-js ================== -->
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>
<!-- <script src="assets/js/data.js"></script> -->
<script src="assets/js/app.js"></script>
<!-- ================== END js ================== -->
</body>
</html>