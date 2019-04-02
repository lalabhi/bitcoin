<?php
namespace Drupal\feedback_converter\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'converter custom' block.
 *
 * @Block(
 *   id = "curreny_block",
 *   admin_label = @Translation("Currency Block"),
 *
 * )
 */
class converterBlock extends BlockBase
{
  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $form = \Drupal::formBuilder()->getForm('Drupal\feedback_converter\Form\feedback');
    return $form;
  }
}
