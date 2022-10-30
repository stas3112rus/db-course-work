Курсовая работа по предмету "Базы данных"

Тема "Поликлиника"

Демо версия приложения доступна по адресу https://stas-yudin.ru/db/


Если при выполнении третьего поискового запроса будет ошибка вида

.... in GROUP BY clause and contains nonaggregated column

Необходимо сделать следующий SQL запрос:

SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));