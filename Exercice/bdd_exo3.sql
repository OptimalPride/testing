

CREATE TABLE IF NOT EXISTS car (
  id INT(5) NOT NULL AUTO_INCREMENT,
  marque VARCHAR(50) NOT NULL,
  modele VARCHAR(50) NOT NULL,
  annee  YEAR,
  couleur VARCHAR(50) NOT NULL,
  date_create datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

