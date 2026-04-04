CREATE TABLE `cars` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `price` INT NOT NULL,
  
  PRIMARY KEY (`id`)
);

INSERT INTO `cars` (`name`, `price`) VALUES
('Koenigsegg', 2000000),
('Rolls Royce', 100000),
('Nissan', 50000);


INSERT INTO `cars` (`name`) VALUES
('Q7')

ALTER TABLE `cars`
ADD COLUMN `brand` VARCHAR(100) NOT NULL;