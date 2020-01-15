ALTER TABLE civicrm_contribution_page ADD COLUMN thermometer_offset_amount decimal(20,2) COMMENT 'Offset for amount of money raised';
ALTER TABLE civicrm_contribution_page ADD COLUMN thermometer_offset_donors INTEGER COMMENT 'Offset for number of contributors';
