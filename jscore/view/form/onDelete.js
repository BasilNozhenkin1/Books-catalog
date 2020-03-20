Ext.define('Swan.view.form.onDelete', {
    extend: Ext.form.Panel,
    title: 'Удаление книги',
    bodyPadding: 5,
    width: 450,

    url: 'index.php/Book/delete',

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
        }
    ],

    buttons: [{
        text: 'Сбросить',
        handler: function() {
            this.up('form').getForm().reset();
        }
    }, {
        text: 'Удалить',
        formBind: true, //only enabled once the form is valid
        disabled: true,
        handler: function() {
            var form = this.up('form').getForm();
            if (form.isValid()) {
                form.submit({
                    success: function(form, action) {
                        Ext.Msg.alert('Удачное удаление книги', action.result.msg);
                        window.location.href = location.href;
                    },
                    failure: function(form, action) {
                        Ext.Msg.alert('Неудачное удаление книги', action.result.msg);
                    }
                });
            }
        }
    }],
    renderTo: Ext.getBody()
});
