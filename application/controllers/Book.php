<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Book
 * Контроллер для работы с книгами
 */
class Book extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Book_model');
	}
	/**
	 * Метод Загрузка списка книг
	 */
	public function loadList() {
		$bookList = $this->Book_model->loadList();
		echo json_encode($bookList);
	}
	/**
 	* Метод Создание новой книги
	*/
	public function create() {
		$this->load->library('form_validation');
        $this->load->model('Book_validation_create_model');
        $this->form_validation->set_rules($this->Book_validation_create_model->addVerificationRules);

		if ($this->form_validation->run() == true) {
			$status = ['success' => 'success',
					   'msg'  	 => "Автор: ".$this->input->post('author_name')."<br>".
					   				"Название: ".$this->input->post('book_name')."<br>".
					   				"Год: ".$this->input->post('book_year')
			];
			$bookData = ['author_name' => $this->input->post('author_name'),
						 'book_name'   => $this->input->post('book_name'),
						 'book_year'   => $this->input->post('book_year')
						];
			$this->Book_model->create($bookData);
		}
		else {
			$status = ['errors'	=> 'errors',
					   'msg'  	=> ''];
			foreach ($this->form_validation->error_array() as $error) {
				$status['msg'] .= "<br>".$error;
			}
		}
		echo json_encode($status);
	}
	/**
 	* Метод редактирования конкретной книги
	*/
	public function update() {
		$this->load->library('form_validation');
        $this->load->model('Book_validation_update_model');
        $this->form_validation->set_rules($this->Book_validation_update_model->addVerificationRules);

		if ($this->form_validation->run() == true) {
			$book_exists = $this->Book_model->exists($this->input->post('book_name'));
			if ($book_exists) {
				$status = ['success' => 'success',
					   		'msg'  	 => "Автор: ".$this->input->post('author_name')."</br>".
					   					"Название: ".$this->input->post('book_name')."</br>".
					   					"Год: ".$this->input->post('book_year')
				];
				$book_data = ['author_name' => $this->input->post('author_name'),
						 'book_name'   => $this->input->post('book_name'),
						 'book_year'   => $this->input->post('book_year')
						];
				$this->Book_model->update($book_data);
			}
			else {
				$status = ['errors'	=> 'errors',
					  	   'msg'  	=> 'Такой книги не существует'];
			}	
		}
		else {
			$status = ['errors'	=> 'errors',
					   'msg'  	=> ''];
			foreach ($this->form_validation->error_array() as $error) {
				$status['msg'] .= "<br>".$error;
			}
		}
		echo json_encode($status);
	}
	/**
 	* Метод Удаление конкретной книги
	*/
	public function delete() {
		$this->load->library('form_validation');
        $this->load->model('Book_validation_delete_model');
        $this->form_validation->set_rules($this->Book_validation_delete_model->addVerificationRules);

		if ($this->form_validation->run() == true) {
			$book_exists = $this->Book_model->exists($this->input->post('book_name'));
			if ($book_exists) {
				$status = ['success' => 'success',
						   'msg'  	 => "Название: ".$this->input->post('book_name')."</br>"];
	
				$book_data = ['book_name'   => $this->input->post('book_name')];
				$this->Book_model->delete($book_data);
			}
			else {
				$status = ['errors'	=> 'errors',
					   	   'msg'  	=> 'Такой книги не существует'];
			}	
		}
		else {
			$status = ['errors'	=> 'errors',
					   'msg'  	=> ''];
			foreach ($this->form_validation->error_array() as $error) {
				$status['msg'] .= "<br>".$error;
			}
		}
		echo json_encode($status);
	}

	/**
 	* Метод генерации Xml из массива 
 	* Источник: https://www.codexworld.com/convert-array-to-xml-in-php/
	*/
	private function _generateXmlFromArray($array, &$xmlBookInfo) {
    	foreach($array as $key => $value) {
    	    if(is_array($value)) {
    	        if(!is_numeric($key)){
    	            $subnode = $xmlBookInfo->addChild("$key");
    	            $this->_generateXmlFromArray($value, $subnode);
    	        }else{
    	            $subnode = $xmlBookInfo->addChild("book");
    	            $this->_generateXmlFromArray($value, $subnode);
    	        }
    	    }else {
    	        $xmlBookInfo->addChild("$key", htmlspecialchars("$value"));
    	    }
    	}
	}
	/**
 	* Метод выгрузки каталога (списка всех книг) в формате XML
	*/
	public function Xml() {
		header('Content-type: text/xml');
		$bookList = $this->Book_model->loadListForXml();
		$xmlHead = new SimpleXMLElement("<?xml version=\"1.0\"?><books></books>");

		$this->_generateXmlFromArray($bookList, $xmlHead);
		echo $xmlHead->asXML();
	}
	/**
 	* Метод загрузки файла списка всех книг в формате XML
	*/
	public function downloadXml() {
		header('Content-type: text/xml');
		$bookList = $this->Book_model->loadListForXml();
		$xmlHead = new SimpleXMLElement("<?xml version=\"1.0\"?><books></books>");

		$this->_generateXmlFromArray($bookList, $xmlHead);
		echo $xmlHead->asXML();
	}
}
