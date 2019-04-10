<?php

namespace Drupal\convertercoin\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'converter coin custom' block.
 *
 * @Block(
 *   id = "coin_converter_block",
 *   admin_label = @Translation("convertcoin Block"),
 *
 * )
 */
class convertercoins extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\convertercoin\Form\converter');
    return $form;
  }

}
