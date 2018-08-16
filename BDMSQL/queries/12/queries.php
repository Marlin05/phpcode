-- JOIN
-- INNER JOIN
-- LEFT OUTER JOIN
-- RIGHT OUTER JOIN
-- !FULL OUTER JOIN!
-- CROSS JOIN

-- 1
SELECT * FROM salers INNER JOIN customers ON customers.snum = salers.snum;

-- 2
SELECT * FROM salers JOIN customers ON customers.snum = salers.snum;

-- 3
-- выбрать нужные поля в запросе
-- объединение только на основе справочной целостности т.е. берутся только связанные ряды
SELECT s.sname, c.cname, s.city FROM salers s INNER JOIN customers c ON c.snum = s.snum;

-- 4
SELECT s.sname, c.cname, s.city FROM salers s, customers c WHERE c.snum = s.snum; 

-- 5
SELECT s.sname, c.cname, s.city FROM salers s INNER JOIN customers c ON c.snum = s.snum WHERE s.city = 'London';

-- 6
SELECT s.sname, c.cname, s.city FROM salers s LEFT OUTER JOIN customers c ON c.snum = s.snum;

-- 7
SELECT s.sname, c.cname, s.city FROM salers s RIGHT OUTER JOIN customers c ON c.snum = s.snum;

-- 8 ERROR!
SELECT s.sname, c.cname, s.city FROM salers s FULL OUTER JOIN customers c ON c.snum = s.snum;

-- 9 
-- эмулирование FULL 
-- выдаёт и левые и правые NULL без повторений
SELECT s.sname, c.cname, s.city FROM salers s LEFT OUTER JOIN customers c ON c.snum = s.snum
UNION
SELECT s.sname, c.cname, s.city FROM salers s RIGHT OUTER JOIN customers c ON c.snum = s.snum;

-- 10
SELECT s.sname, c.cname, s.city FROM salers s CROSS JOIN customers c;

-- 11 Полнотекстовый поиск
SELECT * FROM customers WHERE MATCH (text) AGAINST ('test');

-- 12 Полнотекстовый поиск в режиме естественного языка (NATURAL LANGUAGE MODE) морфология не поддерживается
SELECT * FROM customers WHERE MATCH (text) AGAINST ('программирование');

-- 13 Полнотекстовый поиск... в режиме NATURAL LANGUAGE MODE имеется порог шумовых слов = 50%
SELECT * FROM customers WHERE MATCH (text) AGAINST ('mysql');

-- 14
SELECT * FROM customers WHERE MATCH (text) AGAINST ('php' IN NATURAL LANGUAGE MODE);

-- 15 Полнотекстовый поиск в булевом режиме (BOOLEAN MODE) поддерживается морфология
SELECT * FROM customers WHERE MATCH (text) AGAINST ('программ*' IN BOOLEAN MODE);

-- 16
SELECT * FROM customers WHERE MATCH (text) AGAINST ('+php -mysql' IN BOOLEAN MODE);

-- ft_min_word_len=3