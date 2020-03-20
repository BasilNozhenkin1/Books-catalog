В проекте в качестве frontend используется фреймворк ExtJS 6.2.0 GPL (версия classic, документация тут: https://docs.sencha.com/extjs/6.2.0/classic/Ext.html), в качестве backend - CodeIgniter 3.1.9 (документация тут: https://www.codeigniter.com/user_guide/)

Необходимо доработать данный проект:
- Сделать хранение книг в БД
- Реализовать форму добавления/редактирования книг
- Реализовать функцию удаления книг
- Реализовать функцию выгрузки всех книг в XML*

* Формат XML
<books>
	<book>
		<id>1</id>
		<name>Война и мир</name>
		<author>Толстой Л.Н.</author>
	</book>
</books>

Структура каталогов данного проекта:
/application  - файлы, отвечающие за backend приложения
/application/controllers - контроллеры
/application/models - модели
/application/views - представления
/extjs - файлы ExtJS 6.2.0 Classic
/jscore - файлы, отвечающие за frontend приложения
/system - файлы CodeIgniter 3.1.9