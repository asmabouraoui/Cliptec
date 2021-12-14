<?php

class comment{
	private int $comment_id;	
	private string $question_idd;
	private string $user_name;
	private string $comment_content;
    private string $likee;
  

	public function __construct($question_idd, $user_name, $comment_content,$likee){
		$this->question_idd = $question_idd;
		$this->user_name = $user_name;
		$this->comment_content = $comment_content;
        $this->likee = $likee;
	
	}

	public function getcomment_id()
	{
		return $this->comment_id;
	}


	public function getquestion_idd()
	{
		return $this->question_idd;
	}
    public function setquestion_idd(string $question_idd)
	{
		$this->question_idd = $question_idd;
	}

	public function getuser_name()
	{
		return $this->user_name;
	}
    public function setuser_name(string $user_name)
	{
		$this->user_name = $user_name;
	}

	public function getcomment_content()
	{
		return $this->comment_content;
	}
    public function setcomment_content(string $comment_content)
	{
		$this->comment_content = $comment_content;
	}
    public function getlikee()
	{
		return $this->likee;
	}
    public function setlikee(string $likee)
	{
		$this->likee = $likee;
	}
}

?>