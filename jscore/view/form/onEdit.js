Ext.define('Swan.view.form.onEdit', {
    extend: Ext.form.Panel,
    title: 'Редактирование книги',
    bodyPadding: 5,
    width: 450,

    url: 'index.php/Book/update',

    layout: 'anchor',
    defaults: {
        anchor: '100%'
    },
    floating: true,
    closable: true,

    defaultType: 'textfield',
    items: [
        {
            fieldLabel: 'Название книги',
            name: 'book_name',
            allowBlank: false,
            minLength: 2,
            maxLength: 255
        },
        {   
            fieldLabel: 'Автор',
            name: 'author_name',
            allowBlank: false,
            minLength: 2,
            maxLength: 100
        },
        {
            fieldLabel: 'Год издания',
            name: 'book_year',
            allowBlank: false
        },
    ],

    buttons: [{
        text: 'Сбросить',
        handler: function() {
            this.up('form').getForm().reset();
        }
    }, {
        text: 'Редактировать',
        formBind: true, //only enabled once the form is valid
        disabled: true,
        handler: function() {
            var form = this.up('form').getForm();
            if (form.isValid()) {
                form.submit({
                    success: function(form, action) {
                        Ext.Msg.alert('Удачное редактирование книги', action.result.msg);
                        window.location.href = location.href;
                    },
                    failure: function(form, action) {
                        Ext.Msg.alert('Неудачное редактирование книги', action.result.msg);
                    }
                });
            }
        }
    }],
    renderTo: Ext.getBody()
});
