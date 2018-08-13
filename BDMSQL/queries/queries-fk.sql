-- 1
CREATE TABLE country 
(
	country_id TINYINT UNSIGNED AUTO_INCREMENT NOT NULL, 
	country_name VARCHAR(50) NOT NULL, 
	PRIMARY KEY (country_id)
) ENGINE=InnoDB;

-- 2
CREATE TABLE city 
(
	city_id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, 
	city_name VARCHAR(50) NOT NULL, 
	country_id TINYINT UNSIGNED NOT NULL, 
	PRIMARY KEY (city_id), 
	INDEX ixCity (country_id), 
	CONSTRAINT country_city FOREIGN KEY (country_id) REFERENCES country (country_id)
) ENGINE=InnoDB;