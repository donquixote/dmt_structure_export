<?php

namespace Drush\dmt_structure_export\TableBuilder;

/**
 * Class TableBuilder.
 */
abstract class TableBuilder implements TableBuilderInterface {

  /**
   * {@inheritdoc}
   */
  protected $header = [];

  /**
   * {@inheritdoc}
   */
  protected $rows = [];

  /**
   * {@inheritdoc}
   */
  public function setHeader(array $header) {
    $this->header = $header;
  }

  /**
   * {@inheritdoc}
   */
  public function getHeader() {
    return $this->header;
  }

  /**
   * {@inheritdoc}
   */
  public function getRows() {
    return $this->rows;
  }

  /**
   * {@inheritdoc}
   */
  public function setRows(array $rows) {
    $this->rows = $rows;
  }

  /**
   * {@inheritdoc}
   */
  public function getTable() {
    $table = [];

    if (!empty($this->header)) {
      $table[] = $this->header;
    }

    if (!empty($this->rows)) {
      $table = array_merge($table, $this->rows);
    }

    return $table;
  }

}
