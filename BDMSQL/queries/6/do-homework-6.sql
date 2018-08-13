-- 1 Выберите все заказы за 1990-03-10 из таблицы orders, упорядочив их по сумме в порядке возрастания
SELECT * FROM orders WHERE odate = '1990-03-10' ORDER BY amt ASC;

-- 2 Выберите 2 последних заказа из таблицы orders
SELECT * FROM orders ORDER BY odate DESC LIMIT 2;

-- 3 Получите имена клиентов, рейтинг которых больше 200, город их проживания, 
-- а также имена продавцов, к которым относятся указанные клиенты. 
-- Используйте псевдонимы таблиц
SELECT c.cname, c.rating, c.city, s.sname FROM customers c, salers s WHERE c.snum = s.snum AND c.rating > 200;


SELECT salers.sname, customers.cname, salers.city FROM salers, customers WHERE salers.snum = customers.snum ORDER BY salers.sname;

-- 4 Выберите имена продавцов (таблица salers), сумму каждой продажи продавцов (таблица orders) и подсчитанную сумму комиссионных с каждой конкретной продажи. Вывод сопроводите пояснениями, чтобы каждый ряд таблицы имел следующий вид: Продавец: | Rifkin | Сумма продажи: | 18.69 | Размер комиссионных: | 2.8035
SELECT 'Продавец: ', sname, 'Сумма продажи: ', amt, 'Размер комиссионных: ', (amt*comm) AS res FROM salers, orders WHERE salers.snum = orders.snum;