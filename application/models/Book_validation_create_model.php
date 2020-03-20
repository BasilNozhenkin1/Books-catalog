<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Book_validation_create_model extends CI_Model {
    public $addVerificationRules = [
    /**
    * Ограничения на имя автора в соответствии с таблицей
    */
        [
        'field' => 'author_name',
        'label' => 'Имя автора',
        'rules' => 'required|max_length[100]' 
        ],
    /**
    * Ограничения на название книги в соответствии с таблицей
    */    
        [
        'field' => 'book_name',
        'label' => 'Имя книги',
        'rules' => 'required|max_length[255]|is_unique[books_table.book_name]' 
        ],
    /**
    * Ограничения на год книги в соответствии с таблицей
    * Пояснение: не учитывает пока года до Нашей Эры (Н.Э) Исключительно от 0 до 2020
    */
        [
        'field' => 'book_year',
        'label' => 'Год книги',
        'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[2020]' 
        ]
    ];
}

