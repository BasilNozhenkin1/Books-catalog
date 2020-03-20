<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Book_model
 * Модель для работы с книгами
 */
class Book_model extends CI_Model {

	/**
	* Метод Загрузка списка книг
	* @returns {array}
	*/
	public function loadList()
	{
		$query = $this->db->get('books_table');
        return $query->result_array();
    }
    /**
	* Метод Загрузка списка книг (Для формата, устанновленного в тексте задания):
	* * Формат XML
	* * <books>
	* * 	<book>
	* * 		<id>1</id>
	* * 		<name>Война и мир</name>
	* * 		<author>Толстой Л.Н.</author>
	* * 	</book>
	* * </books>
	* * @returns {array}
	*/
    public function loadListForXml() 
    {
    	$this->db->select('`book_id` as `id`, `book_name` as `name`, `author_name` as `author`');
    	$query = $this->db->get('books_table');
        return $query->result_array();
    }
    /**
	* Метод Создание новой книги в каталоге
	*/
    public function create($data) {
		$this->db->insert('books_table', $data);
    }
    /**
	* Редактирование конкретной книги
	* Редактирование происходит по названию книги
	*/
    public function update($data) {
    	$this->db->where('book_name', $data['book_name']);
		$this->db->update('books_table', $data);
    }
    /**
	* Удаление конкретной книги
	*/
    public function delete($data) {
    	$this->db->where('book_name', $data['book_name']);
		$this->db->delete('books_table', $data);
    }
    /**
	* Проверка на существование книги с именем
	* @returns {boolean}
	*/
	public function exists($book_name)
	{
		$this->db->where("book_name", $book_name);
		$query = $this->db->get('books_table');
		if($query->num_rows() > 0) {
			return true;
		}
		else {
			return false;
		}
	}
}
