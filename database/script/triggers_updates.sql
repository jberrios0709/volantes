DROP TRIGGER IF EXISTS `update_users`;
CREATE TRIGGER update_users BEFORE UPDATE 
    ON `users` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_users`;
CREATE TRIGGER insert_users BEFORE INSERT 
    ON `users` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `update_prices`;
CREATE TRIGGER update_prices BEFORE UPDATE 
    ON `prices` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_prices`;
CREATE TRIGGER insert_prices BEFORE INSERT 
    ON `prices` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `update_measures`;
CREATE TRIGGER update_measures BEFORE UPDATE 
    ON `measures` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_measures`;
CREATE TRIGGER insert_measures BEFORE INSERT 
    ON `measures` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `update_emails`;
CREATE TRIGGER update_emails BEFORE UPDATE 
    ON `emails` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_emails`;
CREATE TRIGGER insert_emails BEFORE INSERT 
    ON `emails` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `update_phones`;
CREATE TRIGGER update_phones BEFORE UPDATE 
    ON `phones` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_phones`;
CREATE TRIGGER insert_phones BEFORE INSERT 
    ON `phones` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `update_clients`;
CREATE TRIGGER update_clients BEFORE UPDATE 
    ON `clients` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_clients`;
CREATE TRIGGER insert_clients BEFORE INSERT 
    ON `clients` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `update_branchs`;
CREATE TRIGGER update_branchs BEFORE UPDATE 
    ON `branchs` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_branchs`;
CREATE TRIGGER insert_branchs BEFORE INSERT 
    ON `branchs` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `update_order_folio`;
CREATE TRIGGER update_order_folio BEFORE UPDATE 
    ON `order_folio` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_order_folio`;
CREATE TRIGGER insert_order_folio BEFORE INSERT 
    ON `order_folio` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `update_folios`;
CREATE TRIGGER update_folios BEFORE UPDATE 
    ON `folios` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_folios`;
CREATE TRIGGER insert_folios BEFORE INSERT 
    ON `folios` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `update_abonos`;
CREATE TRIGGER update_abonos BEFORE UPDATE 
    ON `abonos` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_abonos`;
CREATE TRIGGER insert_abonos BEFORE INSERT 
    ON `abonos` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `update_orders`;
CREATE TRIGGER update_orders BEFORE UPDATE 
    ON `orders` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_orders`;
CREATE TRIGGER insert_orders BEFORE INSERT 
    ON `orders` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `update_abonos`;
CREATE TRIGGER update_abonos BEFORE UPDATE 
    ON `abonos` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_abonos`;
CREATE TRIGGER insert_abonos BEFORE INSERT 
    ON `abonos` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `update_status_design`;
CREATE TRIGGER update_status_design BEFORE UPDATE 
    ON `status_design` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_status_design`;
CREATE TRIGGER insert_status_design BEFORE INSERT 
    ON `status_design` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `update_status_order`;
CREATE TRIGGER update_status_order BEFORE UPDATE 
    ON `status_order` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;
DROP TRIGGER IF EXISTS `insert_status_order`;
CREATE TRIGGER insert_status_order BEFORE INSERT 
    ON `status_order` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP;