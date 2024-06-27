<?php
header('Content-Type: text/html; charset=UTF-8');

class notfoundController extends controller{

	private $dados;

	public function __construct(){
		parent::__construct();
		$this->dados = array();
	}

	public function index(){

		$this->loadTemplate('notfound', $this->dados);
	}

}