-- COUNT(), SUM(), AVG(), MIN(), MAX() || GROUP BY, HAVING

-- 1 
SELECT COUNT(sname) FROM salers;

-- 2 
SELECT COUNT(city) FROM salers;

-- 3
SELECT COUNT(*) FROM salers;

-- 4
SELECT COUNT(DISTINCT city) FROM salers;

-- 5 использовать псевдоним
SELECT COUNT(*) AS res FROM salers;

-- 6 подсчитать общую сумму

SELECT SUM(amt) AS res FROM orders;

-- 7 усреднённое значение
SELECT AVG(amt) AS res FROM orders;

-- 8
SELECT MIN(amt) AS res FROM orders;

-- 9
SELECT MAX(amt) AS res FROM orders;

-- 10
SELECT MIN(sname) FROM salers;

-- 11
SELECT MAX(sname) FROM salers;

-- 12
SELECT snum, MAX(amt) FROM orders WHERE snum = 1007;

-- 13 // группирует по полю snum
SELECT snum, MAX(amt) FROM orders GROUP BY snum;

-- 14 // группирует группы/ псевдоним  Max (amt) = res
-- 15 // выбрать из таблицы snum и max amt  не просто по рядам а по группам при этом каждая группа должна иметь знач >2000


SELECT snum, MAX(amt) AS res FROM orders GROUP BY snum HAVING res > 2000;

-- 15 // маx поля кот. встречапются более 2 раз 
SELECT snum, MAX(amt) FROM orders GROUP BY snum HAVING COUNT(snum) > 2;