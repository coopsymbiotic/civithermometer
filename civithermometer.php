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
  _civithermometer_civix_insert_navigation_menu($menu, 'Administer/CiviContribute', array(
    'label' => E::ts('CiviThermometer Settings'),
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
      $tab['thermometer'] = array(
        'title' => ts('Thermometer'),
        'link' => NULL,
        'valid' => 1,
        'active' => 1,
        'current' => false,
      );
      // Insert this tab into position 2
      $tabs = array_merge(
        array_slice($tabs, 0, 2),
        $tab,
        array_slice($tabs, 2)
       );
    }
    if (!empty($context['urlString']) && !empty($context['urlParams'])) {
      $tabs[CRM_Core_Action::VIEW] = array(
        'title' => ts('Thermometer'),
        'name' => ts('Thermometer'),
        'url' => $context['urlString'] . 'thermometer',
        'qs' => $context['urlParams'],
        'uniqueName' => 'thermometer',
      );
    }
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

function civithermometer_civicrm_buildForm($formName, &$form) {
  // Only focus on Contribution Pages
  if ($formName == 'CRM_Contribute_Form_Contribution_Main') {
    $formId = $form->_id;
    $contribPage = \Civi\Api4\ContributionPage::get()
      ->setSelect([
        'thermometer_is_enabled',
        'thermometer_is_double',
        'thermometer_stretch_goal',
        'goal_amount',
      ])
      ->addWhere('id', '=', $formId)
      ->setCheckPermissions(FALSE)
      ->execute();

    // Only continue if the thermometer_is_enabled variable is set to 1
    if ($contribPage->first()['thermometer_is_enabled'] == 1 && $contribPage->first()['goal_amount'] != NULL) {
      $contributions = \Civi\Api4\Contribution::get()
        ->addWhere('is_test', '=', 0)
        ->addWhere('contribution_status_id', '=', 1)
        ->addWhere('contribution_page_id', '=', $formId)
        ->setCheckPermissions(FALSE)
        ->execute();

      // Prepare variables to pass through to Javascript
      $amountGoal = $contribPage->first()['goal_amount'];
      $amountStretch = $contribPage->first()['thermometer_stretch_goal'];
      $isDouble = $contribPage->first()['thermometer_is_double'];
      $numberDonors = $contributions->count();
      $amountRaised = 0;

      if ($numberDonors > 0) {
        $amounts = array_column((array) $contributions, 'total_amount');
        $amountRaised = array_reduce($amounts, function ($a, $b) {
          return ($a += $b);
        });
      }

      // Get thermometer HTML and CSS
      $thermo_settings = \Civi\Api4\Setting::get()
        ->setSelect([
          'civithermometer_css',
          'civithermometer_html',
        ])
        ->setCheckPermissions(FALSE)
        ->execute();

      $css = $thermo_settings[0]['value'];
      $html = $thermo_settings[1]['value'];

      // Add thermo data to the page so our JS can access it
      CRM_Core_Resources::singleton()->addVars('civithermo', array(
        'numberDonors' => $numberDonors,
        'amountGoal' => $amountGoal,
        'amountStretch' => $amountStretch,
        'amountRaised' => $amountRaised,
        'currency' => $form->_values['currency'],
        'isDouble' => $isDouble,
      ));

      if (empty($form->_pcpInfo['id']) && !empty($form->_values['intro_text'])) {
        $intro_text = $form->_values['intro_text'];
        $intro_text .= html_entity_decode($html);
        $form->assign('intro_text', $intro_text);
      }

      CRM_Core_Resources::singleton()->addStyle($css);
      CRM_Core_Resources::singleton()->addScriptFile('civithermometer', 'js/civithermo.js');
      CRM_Core_Resources::singleton()->addScript('civithermo_render();');
    }
  }
}
