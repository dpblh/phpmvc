phpmvc
======
Простая MVC реализация.

Поддержка динамической маршрутизации

Пример:

  '/person/(:id)/product/(:product_id)'

  поддержка rest интерфейса (GET, POST, PUT, DELETE)

  PUT и DELETE реализованы отправкой из формы скрытого поля где name='_method' value='put или delete'
 
Настраиваемый дата провайдер.

Модель авто определяет имя таблицы в базе данных (если имя модели совпадает с таблицей в базе данных)

Доступные методы модели:

  ::findAll()

  ::findById(id)

  ::save(model)

  ::update(model)

  ::delete(model)

  ::select_all(query)

  ::select_one(query) достаёт единственную запись используя пользовательский запрос
 
  ::findBy...(value, like_modifier) где ... имя колонке в таблице. like_modifier сравнение на like. Пример: tim%

  ::findBy(hash, link_modifier, or_modifier) где hash хеш у которого key имя колонке value значение колонки. like_modifier см. выше. or_modifier использовать or вместо and.

  ::count() колличество записей в таблице.

  ::paging(page, limit) пагинация записей.