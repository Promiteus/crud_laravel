

## Описание
<p>Данное приложение демонстрирует механизм CRUD. В качестве объекта манипуляции выступает таблица "people".</p>

## Окружение
<p>Для работы приложения у вас должен быть установлен docker/docker-compose, composer, php 7.2+, node.js 10+</p>

## Установка проекта
<ol>
  <li>В корне проекта выполнить комадну: <i style="color: yellow;"><br/>> docker-compose up -d</i></li>
  <li>При успехе запуска контейнеров зайти в php-fpm по имени контейнера:<br/>
   <i style="color: yellow;">> docker-compose ps</i> - увидеть имя контейнера.<br/>
   <i style="color: yellow;">> docker exec -u root -it crud-php-fpm bash</i> - войти в контейнер crud-php-fpm.<br/>
   <i style="color: yellow;">> php artisan migrate</i> - установить миграции для работы приложения.<br/>
   <i style="color: yellow;">> Если миграции успешно установились, то нажать Ctrl+p и ctrl+q</i> - для выхода из crud-php-fpm контейнера без его остановки.<br/>
  </li>
  <li> В корне проекта вызвать команду: <br/>
    <i style="color: yellow;">> compose i</i> - установка всех зависимостей проекта.<br/>
  </li>
  <li>После всех манипуляций зайдите в браузер по ссылке: <a href="http://localhost:1010/">http://localhost:1010/</a></li>
  <li>Далее, регистрируйтесь и пользуйтесь приложением.</li>
</ol>

