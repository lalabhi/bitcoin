<?php

namespace Drupal\convertercoin\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;


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
      $image_field = $this->configuration['image'];
      $image_uri = \Drupal\file\Entity\File::load($image_field[0]);
      $image_url = $image_uri->uri->value;
      $form = \Drupal::formBuilder()->getForm('Drupal\convertercoin\Form\converter');
      $form['#image'] = $image_url;
      $form['#title'] = $this->configuration['heading'];
      $form['#subtitle'] = $this->configuration['subheading'];
      $form['#description'] = $this->configuration['description'];
    return $form;
  }

  public function blockForm($form, FormStateInterface $form_state) {
    $form['heading'] = [
      '#type' => 'textfield',
      '#title' => $this->t('heading'),
    ];
    $form['subheading'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Sub Heading'),
    ];
    $form['description'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description'),
    ];
    $form['upload'] = [
      '#type' => 'managed_file',
      '#name' => 'my_file',
      '#title' => t('picture'),
      '#upload_location' => 'public://my_files/',
    ];
    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['heading'] = $form_state->getValue('heading');
    $this->configuration['subheading'] = $form_state->getValue('subheading');
    $this->configuration['description'] = $form_state->getValue('description');
    $this->configuration['image']= $form_state->getValue('upload');
    $image =  $form_state->getValue('upload');
    if(isset($image)){
      $file = \Drupal\file\Entity\File::load( $image[0] );
      /* Set the status flag permanent of the file object */
      $file->setPermanent();
      /* Save the file in database */
      $file->save();
    }

  }

}
