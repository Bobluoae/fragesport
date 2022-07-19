<?php
class Quiz {

	//Important array for importing from json file
	private $fragorArr = [];

	//Decode the specified jsonfile 
	public function __construct(string $quizfile){

		$questions = file_get_contents($quizfile);
		$this->fragorArr = json_decode($questions);
	}

	//Get the number of questions in the quiz
	public function getLength(){

		return count($this->fragorArr);
	}

	//Get the question string from the specified page in the quiz
	public function getQuestion($num){

		return $this->fragorArr[$num]->questionStr;
	}

	//Get the answer array containing strings from the specified page in the quiz
	public function getAnswers($num){

		return $this->fragorArr[$num]->choicesArr;
	}
	
	//Get the correct answer integer from the specified page in the quiz
	public function getCorrect($num){

		return $this->fragorArr[$num]->correct;
		
	}
}