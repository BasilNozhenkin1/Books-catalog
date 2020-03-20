## Каталог книг (Тестовое задание)

## Необходимый функционал

- Сделать хранение книг в БД
- Реализовать форму добавления/редактирования книг
- Реализовать функцию удаления книг 
- Реализовать функцию выгрузки всех книг в XML

## Используемый стек

Frontend - ExtJS 6.2.0 GPL
Backend - CodeIgniter 3.1.9
База Данных - MySQL. Драйвер - mysqli.

## Структура jsCore

-model
	-Books.js
- view
	- books
		- book.js
		- bookController.js
		- bookViewModel.js
	- form
		- onAdd.js
		- onDelete.js
		- onEdit.js
- app.js

## Подготовка к работе

В корневой папке находится файл test.sql - файл базы данных (test), в которой есть таблица books_table.

Конфигурация подключения к базе данных - в папке application/config. Файл - database.php

## Особенности реализации

В исходном файле View в представленном тестовом задании была представлена компонента tbar.
Необходимый функционал предлагалось сделать с использованием данной компоненты.
Редактирование и удаление книг сделано по названию книги (предполагается, что оно уникально).





