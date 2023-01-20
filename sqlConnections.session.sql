CREATE TABLE user
( id int(11) PRIMARY KEY,
  email varchar(255),
  password varchar(32),
  date_reg datetime current_timestamp(),
  );