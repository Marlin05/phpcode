-- 1. �������� �� ������� ������� (orders) ������ ���� �������, �� ����� � ����.
SELECT onum, amt, odate FROM orders;

-- 2. ��������� ������, ������� ������� ������ �� ������� �������� (customers), ����� �������� ������� ����� 1001.
SELECT * FROM customers WHERE snum = 1001;

-- 3. �������� ����� �������� ������ San Jose � �� ������� �� ������� �������� (customers).
SELECT cname, rating FROM customers WHERE city = 'San Jose';

-- 4. �������� �������������� ��������� �� ������� ������� (orders), ��� ���� ��������� �������.
SELECT DISTINCT snum FROM orders;

-- 5. �������� ��� ���� �� ������� ������� (orders), ��� ����� ������ ������ 1000.
SELECT * FROM orders WHERE amt > 1000;

-- 6. �������� �������� ������ � ����� ��������� � ������� � �������� ������������ ���� 0.11 �� ������� ��������� (salers).
SELECT city, sname FROM salers WHERE city = 'London' AND comm > 0.11;

-- 7. �������� ���� �������� �� ������� �������� (customers), � ������� ������� ������ ��� ����� 100 � ��� ��� ���� �� �� ����. � ������� ������ �������������� �������� NOT.
SELECT * FROM customers WHERE rating <= 100 AND NOT city = 'Rome';

-- 8. ��������� ������: "SELECT * FROM salers WHERE comm < 0.12 OR comm = 0.12;".
SELECT * FROM salers WHERE comm <= 0.12;

-- 9. ���������, ��� ����� ������� � ���������� ���������� �������: 
"SELECT * FROM orders
        WHERE (amt < 1000 OR NOT (odate = '1990-03-10' AND cnum > 2003));"
-- ���� ������ ����� ������� 3001, 3003, 3007
-- ���� ������ ����� ������� 3005, 3009, 3008, 3010, 3011