/**
 *  Model
 *
 * 
 */
Ext.define('Swan.model.Books', {
	extend: 'Ext.data.Model',

	fields: [
	{
		name:'book_name',
		type: 'string' 
	},
	{
		name:'author_name',
		type: 'string'
	},
	{
		name: 'book_year',
		type: 'int'
	}
	],

	proxy: {
		type: 'ajax',
		url: 'index.php/Book/loadList',
		reader: {
			type: 'json',
			idProperty: 'book_id'
		}
	},

});
