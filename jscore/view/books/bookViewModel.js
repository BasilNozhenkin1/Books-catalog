/**
 *  ViewModel
 *
 * 
 */
Ext.define('Swan.view.books.bookViewModel', {
	extend: 'Ext.app.ViewModel',
    alias: 'viewmodel.book',

	stores: {
		bookStore: {
			model: 'Swan.model.Books',
			autoLoad: true,
			remoteSort: false,
			sorters: [{
			property: 'book_name',
				direction: 'ASC'
			}]
		}
	}
});