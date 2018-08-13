-- 1
SELECT CONCAT(sname, city) FROM salers;

-- 2
SELECT CONCAT(sname, ' ', city) AS res FROM salers;

-- 3
SELECT CONCAT_WS(' ', sname, city) AS res FROM salers;

-- 4
SELECT sname, LENGTH(sname) FROM salers;

-- 5
SELECT sname, CHAR_LENGTH(sname) FROM salers;

-- 6
SELECT sname, CHARACTER_LENGTH(sname) FROM salers;

-- 7
SELECT * FROM salers WHERE CHAR_LENGTH(sname) <= 6;

-- 8
SELECT * FROM salers WHERE LOCATE('kin', sname);

-- 9
SELECT * FROM salers WHERE LOCATE('\'', sname);

-- 10
SELECT odate, LEFT(odate,7) FROM orders;

-- 11
SELECT odate, RIGHT(odate,5) FROM orders;

-- 12
SELECT odate, SUBSTRING(odate,6) FROM orders;

-- 13
SELECT odate, SUBSTRING(odate,1,7) FROM orders;

-- 14
SELECT odate, SUBSTRING_INDEX(odate, '-', 2) FROM orders;

-- 15
SELECT LTRIM('string   ');

-- 16
SELECT RTRIM('   string');

-- 17
SELECT LTRIM(RTRIM('   string   ')) AS res;

-- 18
SELECT TRIM('   string   ') AS res;

-- 19
SELECT TRIM(TRAILING '-10' FROM odate) FROM orders;

-- 20
SELECT TRIM(LEADING '1990-' FROM odate) FROM orders;

-- 21
SELECT TRIM(BOTH 'xx' FROM 'xxbarxx');

-- 22
SELECT comm, REPLACE(comm, '0.', '') AS res FROM salers;

-- 23
SELECT LOWER(sname) FROM salers;

-- 24
SELECT LCASE(sname) FROM salers;

-- 25
SELECT UPPER(sname) FROM salers;

-- 26
SELECT UCASE(sname) FROM salers;