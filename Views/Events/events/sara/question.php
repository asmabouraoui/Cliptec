<?php

class Question{
	private int $question_id;	
	private string $topic;
	private string $question_title;
	private string $question_content;
    private string $question_date;
	private int $user_id;

	public function __construct($topic, $question_title, $question_content, $question_date, $user_id){
		$this->topic = $topic;
		$this->question_title = $question_title;
		$this->question_content = $question_content;
		$this->question_date = $question_date;
		$this->user_id = $user_id;
	}

	public function getquestion_id()
	{
		return $this->question_id;
	}


	public function gettopic()
	{
		return $this->topic;
	}
    public function settopic(string $topic)
	{
		$this->topic = $topic;
	}

	public function getquestion_title()
	{
		return $this->question_title;
	}
    public function setquestion_title(string $question_title)
	{
		$this->question_title = $question_title;
	}

	public function getquestion_content()
	{
		return $this->question_content;
	}
    public function setquestion_content(string $question_content)
	{
		$this->question_content = $question_content;
	}

    public function getquestion_date()
	{
		return $this->question_date;
	}
    public function setquestion_date(string $question_date)
	{
		$this->question_date = $question_date;
	}

	public function getuser_id()
	{
		return $this->user_id;
	}
    public function setuser_id(string $user_id)
	{
		$this->user_id = $user_id;
	}

	

}

?>