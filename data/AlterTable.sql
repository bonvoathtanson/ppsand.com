ALTER TABLE `Users`
ADD Email VARCHAR(50)

ALTER TABLE `Sales`
ADD `PayAmount` DECIMAL(18,2) DEFAULT 0 NOT NULL

ALTER TABLE `Imports`
ADD `PayAmount` DECIMAL(18,2) DEFAULT 0 NOT NULL

ALTER TABLE `Incomes`
ADD `SaleId` INT DEFAULT NULL

ALTER TABLE `Expanses`
ADD `ImportId` INT DEFAULT NULL

-- Change `Expanses`.`ExpansesDate` => `Expanses`.`ExpanseDate`
