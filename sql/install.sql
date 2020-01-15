ALTER TABLE civicrm_contribution_page ADD COLUMN thermometer_is_enabled tinyint unsigned DEFAULT NULL COMMENT 'Does the contribution page use a thermometer';
ALTER TABLE civicrm_contribution_page ADD COLUMN thermometer_is_double tinyint unsigned DEFAULT NULL COMMENT 'Is the thermometer a double your money one';
ALTER TABLE civicrm_contribution_page ADD COLUMN thermometer_stretch_goal decimal(20,2) COMMENT 'Stretch goal for the thermometer';
ALTER TABLE civicrm_contribution_page ADD COLUMN thermometer_offset_amount decimal(20,2) COMMENT 'Offset for amount of money raised';
ALTER TABLE civicrm_contribution_page ADD COLUMN thermometer_offset_donors INTEGER COMMENT 'Offset for number of contributors';
