/**
 *  ViewController
 *
 * 
 */

Ext.define('Swan.view.books.bookController', {
    extend: 'Ext.app.ViewController',
    require: ['Swan.view.form.*'],
    alias: 'controller.book',

    onAdd: function() {
        Ext.create('Swan.view.form.onAdd');
    },
    onEdit: function() {
        Ext.create('Swan.view.form.onEdit');
    },
    onDelete: function() {
        Ext.create('Swan.view.form.onDelete');
    },
    onXML: function() {
        window.location.href = 'index.php/Book/XML';
    }
});
