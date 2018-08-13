-- 1
SELECT 'a' REGEXP 'a'; -- 1

-- 2
SELECT 'a' REGEXP 'b'; -- 0

-- 3
SELECT * FROM salers WHERE sname REGEXP '[a-z]';

-- 4
SELECT * FROM salers WHERE sname REGEXP '[а-я]';

-- 5
SELECT * FROM salers WHERE sname REGEXP '[a-zа-я]';

-- 6
SELECT * FROM salers WHERE sname REGEXP '^s';

-- 7
SELECT * FROM salers WHERE sname REGEXP 'n$';

-- 8
SELECT * FROM salers WHERE sname REGEXP '^[^r].*';

-- 9
SELECT * FROM salers WHERE sname REGEXP '^[^r]*$';

-- 10
SELECT * FROM salers WHERE sname REGEXP '[r]{2}';

-- 11
SELECT * FROM salers WHERE sname REGEXP '\'';

-- 12
SELECT * FROM salers WHERE sname REGEXP '(r){2}';

-- 12
SELECT * FROM salers WHERE sname REGEXP '(rr)';

-- 13
SELECT comm, ABS(comm) AS res FROM salers;

-- 14
SELECT comm, SIGN(comm) AS res FROM salers;

-- 15
SELECT * FROM salers WHERE SIGN(comm) = -1;

-- 16
SELECT MOD(5,2); -- 1
SELECT MOD(5,2); -- 0

-- 17
SELECT comm, FLOOR(comm) FROM salers;

-- 18
SELECT comm, CEIL(comm) FROM salers;

-- 19
SELECT ROUND(2.6);

-- 20
SELECT comm, ROUND(comm, 1) FROM salers;
SELECT comm, ROUND(comm, 0) FROM salers;

-- 21
SELECT POW(3,2);

-- 22
SELECT SQRT(9);

-- 23
SELECT * FROM salers ORDER BY RAND() LIMIT 1;

-- 24
SELECT comm, TRUNCATE(comm, 1) FROM salers;