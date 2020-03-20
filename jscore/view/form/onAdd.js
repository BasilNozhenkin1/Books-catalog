Ext.define('Swan.view.form.onAdd', {
    extend: Ext.form.Panel,
    title: 'Добавление новой книги',
    bodyPadding: 5,
    width: 450,

    url: 'index.php/Book/create',

    layout: 'anchor',
    defaults: {
        anchor: '100%'
    },
    floating: true,
    closable: true,

    defaultType: 'textfield',
    items: [
        {   
            fieldLabel: 'Автор',
            name: 'author_name',
            allowBlank: false,
            minLength: 2,
            maxLength: 100
        },
        {
            fieldLabel: 'Название книги',
            name: 'book_name',
            allowBlank: false,
            minLength: 2,
            maxLength: 255
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
        text: 'Создать',
        formBind: true,
        disabled: true,
        handler: function() {
            var form = this.up('form').getForm();

            if (form.isValid()) {
                form.submit({
                    success: function(form, action) {
                        Ext.Msg.alert('Успешное добавление книги', action.result.msg);
                        window.location.href = location.href;
                    },
                    failure: function(form, action) {
                        Ext.Msg.alert('Неудачное добавление книги', action.result.msg);
                    }
                });
            }
        }
    }],
    renderTo: Ext.getBody()
});
