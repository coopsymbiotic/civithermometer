<?php

require_once 'civithermometer.civix.php';
use CRM_Civithermometer_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function civithermometer_civicrm_config(&$config) {
  _civithermometer_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function civithermometer_civicrm_xmlMenu(&$files) {
  _civithermometer_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function civithermometer_civicrm_install() {
  // First test if the thermometer columns already exist
  $result = CRM_Core_DAO::executeQuery("SHOW COLUMNS FROM civicrm_contribution_page LIKE 'thermometer%';");
  if (sizeof($result->fetchAll()) == 3) {
    // The columns already exist
  }
  else {
    $this->executeSqlFile('sql/install.sql');
  }
  _civithermometer_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function civithermometer_civicrm_postInstall() {
  _civithermometer_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function civithermometer_civicrm_uninstall() {
  _civithermometer_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function civithermometer_civicrm_enable() {
  _civithermometer_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function civithermometer_civicrm_disable() {
  _civithermometer_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function civithermometer_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _civithermometer_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function civithermometer_civicrm_managed(&$entities) {
  _civithermometer_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function civithermometer_civicrm_caseTypes(&$caseTypes) {
  _civithermometer_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function civithermometer_civicrm_angularModules(&$angularModules) {
  _civithermometer_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function civithermometer_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _civithermometer_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_thems().
 */
function civithermometer_civicrm_themes(&$themes) {
  _civithermometer_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 *
function civithermometer_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
function civithermometer_civicrm_navigationMenu(&$menu) {
  _civithermometer_civix_insert_navigation_menu($menu, 'Administer/CiviThermometer', array(
    'label' => E::ts('CiviThermometer'),
    'name' => 'civithermometer_settings',
    'url' => 'civicrm/admin/thermometer',
    'permission' => 'administer CiviCRM',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _civithermometer_civix_navigationMenu($menu);
}

function civithermometer_civicrm_tabset($tabsetName, &$tabs, $context) {
  // check if the tab set is Contribution page manage
  if ($tabsetName == 'civicrm/admin/contribute') {
    if (!empty($context['contribution_page_id'])) {
      $contribID = $context['contribution_page_id'];
      $url = CRM_Utils_System::url('civicrm/admin/contribute/thermometer',
        "reset=1&snippet=5&force=1&id=$contribID&action=update&component=contribution");
      $tab['thermometer'] = array(
        'title' => ts('Thermometer'),
        'link' => $url,
        'valid' => 1,
        'active' => 1,
        'current' => false,
      );
    }
    if (!empty($context['urlString']) && !empty($context['urlParams'])) {
      $tab[] = array(
        'title' => ts('Thermometer'),
        'name' => ts('Thermometer'),
        'url' => $context['urlString'] . 'thermometer',
        'qs' => $context['urlParams'],
        'uniqueName' => 'thermometer',
      );
    }
    // Insert this tab into position 2
    $tabs = array_merge(
      array_slice($tabs, 0, 2),
      $tab,
      array_slice($tabs, 2)
    );
  }
}

function civithermometer_civicrm_entityTypes(&$entityTypes) {
  $entityTypes['CRM_Contribute_DAO_ContributionPage']['fields_callback'][] = function($class, &$fields) {
    $fields['thermometer_is_enabled'] = array(
    'name' => 'thermometer_is_enabled',
    'title' => E::ts('Add thermometer to the page'),
    'type' => CRM_Utils_Type::T_BOOLEAN,
    'entity' => 'ContributionPage',
    'bao' => 'CRM_Contribute_BAO_ContributionPage',
    'localizable' => 0,
    'html' => array(
      'type' => 'CheckBox',
    ),
  );
  $fields['thermometer_is_double'] = array(
    'name' => 'thermometer_is_double',
    'title' => E::ts('is this a double your donation thermometer? (optional)'),
    'type' => CRM_Utils_Type::T_BOOLEAN,
    'entity' => 'ContributionPage',
    'bao' => 'CRM_Contribute_BAO_ContributionPage',
    'localizable' => 0,
    'html' => array(
      'type' => 'CheckBox',
    ),
  );
  $fields['thermometer_stretch_goal'] = array(
    'name' => 'thermometer_stretch_goal',
    'title' => E::ts('Stretch goal if goal amount is reached? (optional)'),
    'type' => CRM_Utils_Type::T_MONEY,
    'entity' => 'ContributionPage',
    'bao' => 'CRM_Contribute_BAO_ContributionPage',
    'localizable' => 0,
    'html' => array(
      'type' => 'Text',
    ),
  );
  };
}
