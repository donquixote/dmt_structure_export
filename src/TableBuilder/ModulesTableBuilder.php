<?php

namespace Drush\dmt_structure_export\TableBuilder;

/**
 * ModulesTableBuilder class.
 */
class ModulesTableBuilder extends TableBuilder {

  /**
   * {@inheritdoc}
   */
  protected function buildHeader() {
    $this->header = [
      'package' => dt('Package'),
      'machine_name' => dt('Machine name'),
      'label' => dt('Label'),
      'type' => dt('Type'),
      'status' => dt('Status'),
      'core' => dt('Core version'),
      'version' => dt('Version'),
      'description' => dt('Description'),
    ];
    return $this->header;
  }

  /**
   * {@inheritdoc}
   */
  public function buildRows() {
    $this->rows = [];
    $extensions = drush_get_extensions(FALSE);
    uasort($extensions, '_drush_pm_sort_extensions');

    foreach ($extensions as $extension) {
      $this->rows[] = [
        'package' => $extension->info['package'],
        'machine_name' => $extension->name,
        'label' => $extension->info['name'],
        'type' => ucfirst(drush_extension_get_type($extension)),
        'status' => ucfirst(drush_get_extension_status($extension)),
        'core' => $extension->info['core'],
        'version' => $extension->info['version'],
        'description' => $extension->info['description'],
      ];
    }

    return $this->rows;
  }

}
