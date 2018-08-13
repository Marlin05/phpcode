-- 1
SELECT sname, comm FROM salers;

-- 2
SELECT sname, comm*100 FROM salers;

-- 3 возле каждого поля знак %
SELECT sname, comm*100, '%' FROM salers;
SELECT 'Продавец:', sname, comm*100, '%' FROM salers;

-- 4
SELECT * FROM orders ORDER BY onum;

-- 5
SELECT * FROM salers ORDER BY sname ASC;

-- 6
SELECT * FROM salers ORDER BY sname DESC;

-- 7
SELECT snum, amt, odate FROM orders ORDER BY snum, amt;

-- 8
SELECT snum, amt, odate FROM orders ORDER BY snum DESC, amt DESC;

-- 9
SELECT snum, MAX(amt), odate FROM orders GROUP BY snum;

-- 10
SELECT snum, odate, MAX(amt) FROM orders GROUP BY snum ORDER BY 3;

-- 11
SELECT * FROM salers LIMIT 2;

-- 12 1 число- порядковый ном. 2 - сколько нужно взять зап.
SELECT * FROM salers LIMIT 0, 2;

-- 13 выбрать самую последнюю запись 
SELECT * FROM salers ORDER BY snum DESC LIMIT 1;

-- 14 вывести и клиентов и продавцов из 2 разных  таблиц
SELECT sname, cname FROM salers, customers;

-- 15 выбрать из salers поле sname, из customers cname, из salers поле city FROM из каких таблиц
SELECT salers.sname, customers.cname, salers.city FROM salers, customers;

-- 16 соотнести клиентов и продавцов по равенству внешнего ключа. customers.snum дочернее поле salers.snum в справочнике
SELECT salers.sname, customers.cname, salers.city FROM salers, customers WHERE salers.snum = customers.snum;

-- 17 
SELECT salers.sname, customers.cname, salers.city FROM salers, customers WHERE salers.snum = customers.snum ORDER BY salers.sname;

-- 18 псевдоним таблицы   s= sname и т.д.
--после FROM указываем псевдонимы salers = s customers = c
SELECT s.sname, c.cname, s.city FROM salers s, customers c WHERE s.snum = c.snum ORDER BY s.sname;

