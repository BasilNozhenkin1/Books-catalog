Ext.application({
	name: 'Test Swan application',
	requires: [
		'Swan.view.books.book',
		'Swan.view.books.bookController', 
		'Swan.view.books.bookViewModel', 
		'Swan.model.Books'
	],

	paths: {
		'Swan': './jscore' 
	},

	mainView: 'Swan.view.books.book'
})