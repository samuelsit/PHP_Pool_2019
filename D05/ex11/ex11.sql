SELECT UPPER(last_name) AS NAME, first_name, price FROM user_card INNER JOIN subscription WHERE subscription.price > 42 ORDER BY last_name ASC, first_name ASC;
