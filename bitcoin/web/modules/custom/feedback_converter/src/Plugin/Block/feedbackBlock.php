<?php
namespace Drupal\feedback_converter\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
* Provides a 'ws custom' block.
*
* @Block(
*   id = "coin_feedback_block",
*   admin_label = @Translation("Feedback Block"),
*
* )
*/
class feedbackBlock extends BlockBase
{
  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $form = \Drupal::formBuilder()->getForm('Drupal\feedback_converter\Form\converter');
    return $form;
  }

}
