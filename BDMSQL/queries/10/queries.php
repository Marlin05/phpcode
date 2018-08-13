-- 1 Объединение таблицы с собой... получаем пары заказчиков с одинаковыми рейтингами
-- указываем псевдонимы дkz рейтинга и 2 псевдонима для cname
-- получаем 2 одинаковых таблицы.
-- сравниваем рейтинги.

-- f - (first) customers
-- s - (second) customers

--выбрать из поля first cname, из 2 дубл. таблицы аналог.поле и поле рейтинг из первой

SELECT f.cname, s.cname, f.rating FROM customers f, customers s WHERE f.rating = s.rating;
-- сортировка по полю рейтинг чтобы искл.дубл.зап.
SELECT f.cname, s.cname, f.rating FROM customers f, customers s WHERE f.rating = s.rating order by rating;


-- 2 Объединение таблицы с собой... получаем пары заказчиков с одинаковыми рейтингами - устраняем избыточность
-- GRASS > CISNERROS - засчитывает 
-- GRASS > GRASS -искл. запись
-- CISNEROS > GRASS - иск.запись т.к С < чем G и так все записи фильтрует

SELECT f.cname, s.cname, f.rating FROM customers f, customers s WHERE f.rating = s.rating AND f.cname > s.cname;

-- 3 Объединение таблицы с собой... выбор нескольких продавцов в 1 городе
SELECT f.sname, s.sname, s.city FROM salers f, salers s WHERE f.city = s.city AND f.sname < s.sname;

-- ВЛОЖЕННЫЙ ЗАПРОС работает только если в нём есть 1 значение
-- 4 Выборка всех клиентов продавца PEEL
-- если известен id 
SELECT cname FROM customers WHERE snum = 1001;
-- вложенный запрос
SELECT cname FROM customers WHERE snum = (SELECT snum FROM salers WHERE sname = 'Peel');

-- 5 Запрос, возвращающий ошибку, поскольку результатом подзапроса есть множество
-- получить все заказы в лондоне
SELECT * FROM orders WHERE snum = (SELECT snum FROM salers WHERE city = 'London');
-- если указ. barcelona то вернёт true т.к. там один продавец
SELECT * FROM orders WHERE snum = (SELECT snum FROM salers WHERE city = 'barcelona');

-- 6 Тот же запрос, но без ошибки
-- оператор IN допускает множество
SELECT * FROM orders WHERE snum IN (SELECT snum FROM salers WHERE city = 'London');

-- 7 Выборка ВСЕХ продавцов с более чем 1 клиентом
-- выбрать поле snum customers где продажи встречаются более чем 1 раз
-- если просто запросить select * from customers; то будут дубл.записи 
SELECT snum, sname FROM salers WHERE snum IN (SELECT snum FROM customers GROUP BY snum HAVING COUNT(snum) > 1);

-- выбрать всех клиентов у кот. есть продавцы

SELECT snum, sname FROM salers WHERE snum IN (SELECT snum FROM customers);

-- 8 Выбор продавцов без клиентов
-- 
SELECT snum, sname FROM salers WHERE snum NOT IN (SELECT snum FROM customers);

-- 9 СООТНЕСЕННЫЙ ПОДЗАПРОС... выборка всех клиентов за апрель
-- уст.псевдоним customers = с
-- где дата находиться в промежутке между
-- в запросе ставим псевдоним orders = o
-- c.cnum ссылается на тоже поле что и во внешнем запросе customers
SELECT * FROM customers c WHERE '1990-04-10' IN (SELECT odate FROM orders o WHERE o.cnum = c.cnum);

-- 10 ТОТ ЖЕ результат, но с объединением таблиц на основе справочной целостности
SELECT o.cnum, c.cname, c.city, c.rating, c.snum FROM orders o, customers c WHERE c.cnum = o.cnum AND odate = '1990-04-10';