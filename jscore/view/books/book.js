/**
 *  Исходный view файл
 *
 * 
 */
Ext.define('Swan.view.books.book', {
	extend: 'Ext.grid.Panel',

	controller: 'book',
    viewModel: 'book',

	title: 'Каталог книг',

	bind: '{bookStore}',


	tbar: [{
		text: 'Добавить',
		handler: "onAdd"
	}, {
		text: 'Редактировать',
		handler: "onEdit"
	}, {
		text: 'Удалить',
		handler: "onDelete"
	}, {
		text: 'Экспорт в XML',
		handler: "onXML"
	}],
	columns: [{
		dataIndex: 'author_name',
		text: 'Автор',
		width: 150
	}, {
		dataIndex: 'book_name',
		text: 'Название книги',
		flex: 1
	}, {
		dataIndex: 'book_year',
		text: 'Год издания',
		width: 150
	}]
});

