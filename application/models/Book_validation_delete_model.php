<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Book_validation_delete_model extends CI_Model {
    public $addVerificationRules = [
    /**
    * Ограничения на название книги в соответствии с таблицей
    */    
        [
        'field' => 'book_name',
        'label' => 'Имя книги',
        'rules' => 'required|max_length[255]' 
        ]
    ];
}

