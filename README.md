phpmvc
======
Простая MVC реализация.

Поддержка динамической маршрутизации

Пример:

  '/person/(:id)/product/(:product_id)'

  поддержка rest интерфейса (GET, POST, PUT, DELETE)

  PUT и DELETE реализованы отправкой из формы скрытого поля где name='_method' value='put или delete'
  
Настраиваемый дата провайдер.

Модель авто определяет имя таблицы в базе данных (если имя модели совпадает с табличей в базе данных)

Доступные методы модели:

  ::findAll()

  ::findById(id)

  ::save(model)

  ::update(model)

  ::delete(model)

  ::select_all(query)
  
  ::findBy...(value) где ... имя колонке в таблице
