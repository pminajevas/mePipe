CREATE TABLE users (
  idUsers int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  emailUsers TINYTEXT NOT NULL,
  pwdUsers LONGTEXT NOT NULL,
  uidUsers TINYTEXT NULL,
  firstUsers tinytext null,
  lastUsers tinytext null,
  countryUsers tinytext null,
  cityUsers tinytext null,
  imgUsers int(11) null
);


CREATE TABLE videos (
  idUsers int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  name TINYTEXT NOT NULL,
  videoName tinytext NOT NULL,
  userId int(11) not NULL,
  thumbnailName tinytext not null
);


CREATE TABLE subscriptions (
  idSubscriber int(11) PRIMARY KEY NOT NULL,
  idSubscribedto int(11) not null
)