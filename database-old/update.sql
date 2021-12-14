--add column
ALTER TABLE product
add pro_list double(10,2) DEFAULT 0 NULL,
add pro_cost double(10,2) DEFAULT 0 NULL,
add pro_send double(10,2) DEFAULT 0 NULL,
add pro_note varchar(100) CHARACTER set utf8 COLLATE utf8_general_ci null

--create view
CREATE OR REPLACE VIEW view_pro_cate AS
SELECT a.pro_id, a.pro_name, a.pro_list , a.pro_send , a.pro_cost , a.cate_id , b.cate_name
FROM product as a 
INNER JOIN category as b 
ON a.cate_id = b.cate_id
ORDER BY pro_id;

--update product from record
UPDATE product
SET pro_cost = (SELECT rec_cost FROM record WHERE record.pro_id = product.pro_id),
pro_list = (SELECT rec_list FROM record WHERE record.pro_id = product.pro_id),
pro_send = (SELECT rec_send FROM record WHERE record.pro_id = product.pro_id)

--drop column from table record
ALTER TABLE record
DROP COLUMN rec_cost,
DROP COLUMN rec_list,
DROP COLUMN rec_send

--CREATE VIEW view_rec_pro_cate_com1
CREATE VIEW view_rec_pro_cate_com1 AS
SELECT a.rec_id,a.pro_id,a.com_id , b.pro_name,b.pro_stock,b.pro_cost,b.pro_list,b.pro_send,b.cate_id, c.cate_name , d.com_name
FROM record as a 
INNER JOIN product as b 
ON a.pro_id = b.pro_id
INNER JOIN category as c 
ON b.cate_id = c.cate_id
INNER JOIN company as d 
ON a.com_id = d.com_id
ORDER BY rec_id;





