ALTER TABLE civicrm_contribution_page ADD COLUMN thermometer_is_enabled tinyint unsigned DEFAULT NULL COMMENT 'Does the contribution page use a thermometer';
ALTER TABLE civicrm_contribution_page ADD COLUMN thermometer_is_double tinyint unsigned DEFAULT NULL COMMENT 'is the thermometer a double your money one';
ALTER TABLE civicrm_contribution_page ADD COLUMN thermometer_stretch_goal decimal(20,2) COMMENT 'Stretch goal for the thermometer';
