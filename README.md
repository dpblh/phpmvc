phpmvc\n
======\n
Простая MVC реализация;\n

Поддержка динамической маршрутизации\n
Пример:\n
  '/person/(:id)/product/(:product_id)'\n
  поддержка rest интерфейса (GET, POST, PUT, DELETE)\n
  PUT и DELETE реализованы отправкой из формы скрытого поля где name='_method' value='put или delete'\n
  
Настраиваемый дата провайдер.\n

Модель авто определяет имя таблицы в базе данных (если имя модели совпадает с табличей в базе данных)\n

Доступные методы модели:\n
  ::findAll()\n
  ::findById(id)\n
  ::save(model)\n
  ::update(model)\n
  ::delete(model)\n
  ::select_all(query)\n
  ::findBy...(value) где ... имя колонке в таблице\n
