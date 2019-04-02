<?php

namespace Drupal\feedback_converter\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Serialization\Json;



/**
 *
 */
class converter extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'converter_form';
  }

  /**
   *
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['first_value'] = [
      '#type' => 'textfield',
      '#placeholder' => t('Enter Amount'),
      '#required' => TRUE,
      '#ajax' => [
        'callback' => '::promptCallback',
        'wrapper' => 'select-2',
        'event' => 'keyup'
      ],
      '#field_prefix' => '<div id="select-1">',
      '#field_suffix' => '</div>',

    ];
    $form['first_list'] = [
      '#type' => 'select',
      '#options' => [
        'BTC' => 'BTC',
        'USD' => 'USD',
        'INR' => 'INR',
      ],

    ];
    $form['second_value'] = [
      '#type' => 'textfield',
      '#placeholder' => t('Enter Amount'),
      '#required' => TRUE,
      '#ajax' => [
        'callback' => '::promptCallbacker',
        'wrapper' => 'select-1',
        'event' => 'keyup'
      ],
      '#field_prefix' => '<div id="select-2">',
      '#field_suffix' => '</div>',
    ];
    $form['second_list'] = [
      '#type' => 'select',
      '#options' => [
        'BTC' => 'BTC',
        'USD' => 'USD',
        'INR' => 'INR',
      ],

    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Buy Now'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // drupal_set_message($this->t('@can_name ,Your application is being submitted!', array('@can_name' => $form_state->getValue('candidate_name'))));.
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }
  }

  public function promptCallback(array &$form, FormStateInterface $form_state) {
//      var_dump($form);

    $value1 = $form_state->getValue('first_value');

    if($value1){

      $client = \Drupal::httpClient();
      $to = $form_state->getValue('first_list');
      $from = $form_state->getValue('second_list');
      $data =$client->request('GET', 'https://free.currencyconverterapi.com/api/v6/convert?q='.$to.'_'.$from.'&compact=ultra&apiKey=4376755d238cd866b975');
      $response = Json::decode($data->getBody());
      $ratio =array_values($response)[0];
      $form['second_value']['#value'] = $value1*$ratio;
      return $form['second_value'];
    }


  }

  public function promptCallbacker(array &$form, FormStateInterface $form_state)
  {
    $value2 = $form_state->getValue('second_value');

    if($value2){
      $client = \Drupal::httpClient();
      $from = $form_state->getValue('first_list');
      $to = $form_state->getValue('second_list');
      $data =$client->request('GET', 'https://free.currencyconverterapi.com/api/v6/convert?q='.$to.'_'.$from.'&compact=ultra&apiKey=4376755d238cd866b975');
      $response = Json::decode($data->getBody());
      $ratio =array_values($response)[0];
      $form['first_value']['#value'] = $value2*$ratio;
      //$form['first_value']['#attributes']['id'] = 'edit-first-value';
      return $form['first_value'];

    }

  }


  }
