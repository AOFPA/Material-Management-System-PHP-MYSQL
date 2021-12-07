CREATE OR REPLACE VIEW view_pro_cate AS
SELECT a.pro_id,a.pro_name,a.pro_list,a.pro_send,a.pro_cost,a.cate_id,a.pro_stock,b.cate_name,a.pro_note
FROM product as a 
INNER JOIN category as b 
ON a.cate_id = b.cate_id

