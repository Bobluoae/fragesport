<?php
class Quiz {

	private $fragorArr = [];

	public function __construct(string $quizfile){

		$questions = file_get_contents($quizfile);
		$this->fragorArr = json_decode($questions);

	}

	public function getLength(){

		return count($this->fragorArr);
	}

	public function getQuestion($num){

		return $this->fragorArr[$num]->questionStr;
	}

	public function getAnswers($num){

		return $this->fragorArr[$num]->choicesArr;
	}
	
	public function getCorrect($num){

		return $this->fragorArr[$num]->correct;
		
	}

	
}