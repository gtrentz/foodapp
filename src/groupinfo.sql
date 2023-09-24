SELECT *
FROM group_info
WHERE NOT EXISTS (
  SELECT *
  FROM other_table
  WHERE other_table.group_id = group_info.group_id
);

CREATE DATABASE group_info;
USE group_info;

CREATE TABLE groups (
    ADD COLUMN group_id INT NOT NULL AUTO_INCREMENT,
);