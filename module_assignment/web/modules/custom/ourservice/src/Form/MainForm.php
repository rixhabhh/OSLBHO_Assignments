<?php
/**
 * @file
 * Contains \Drupal\ourservice\Form\MainForm.
 */

namespace Drupal\ourservice\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
use Drupal\Core\Routing;
use Drupal\Component\Utility\UrlHelper;



class MainForm extends FormBase {

      public function getFormId() {
    return 'main_form';
  }
    

public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#tree'] = TRUE;
    $i = 0;
    $num_rows = $form_state->get('num_rows');

    $form['form_title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#required' => TRUE,
    );
    $form['form_description'] = array(
      '#type' => 'textfield',
      '#title' => t('Description'),
      '#required' => TRUE,
    );
    // $form['fid'] = array(
    //     '#type' => 'hidden',
    //     '#title' => t('Description'),
    //     '#required' => TRUE,
    //   );

    $form['actions']['#type'] = 'actions';

    $form['service_row'] = [
        '#type' => 'details',
        '#title' => $this->t('Add Service'),
        '#prefix' => '<div id="book-row-wrapper">',
        '#suffix' => '</div>',
        '#attributes' => array('class'=>array('container-inline')),
        '#open'  =>  TRUE,
    ];
    if (empty($num_rows)) {
        $num_rows = $form_state->set('num_rows', 1);
    }
    for ($i = 0; $i < $num_rows; $i++) {
        $form['service_row']['content'][$i] = [
            '#type' => 'fieldset',
        ];
        /******** You can add as many fields you want here *********/
        $form['service_row']['content'][$i]['profile_image'][$i] = [
            '#type' => 'managed_file',
            '#title' => $this->t('Image'),
            '#upload_location' => 'public://upload/profile/'
        ];
              $form['service_row']['content'][$i]['title_a'][$i] = [
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#required' => FALSE, // Added
              ];

              $form['service_row']['content'][$i]['body_a'][$i] = [
        '#type' => 'textfield',
        '#title' => t('Description'),
        '#required' => FALSE, // Added
              ];

            //   $form['service_row']['content'][$i]['fid'][$i] = [
            //     '#type' => 'hidden',
            //     '#title' => t('Description'),
            //     '#required' => FALSE, // Added
            //           ];

        $form['service_row']['content'][$i]['link'][$i] = [
          '#type' => 'url',
          '#title' => $this->t('Link title'),
                // Example of a Url object from a route. See the documentation
                // for more methods that may help generate a Url object.
                // '#url' => Url::fromRoute('entity.node.canonical', ['node' => 1]),
                      ];



        if ($i == 0) {
            $form['service_row']['content'][$i]['actions']['add_row'] = [
                '#type' => 'submit',
                '#value' => t('Add more'),
                '#submit' => array('::addOne'),
                '#limit_validation_errors' => array(),
                '#ajax' => [
                    'callback' => '::addmoreCallback',
                    'wrapper' => 'book-row-wrapper',
                ],
            ];
        }
        if ($i > 0) {
            $form['service_row']['content'][$i]['actions']['remove_name'][$i] = [
                '#type' => 'submit',
                '#value' => t('Remove'),
                '#submit' => array('::removeCallback'),
                '#limit_validation_errors' => array(),
                '#ajax' => [
                    'callback' => '::addmoreCallback',
                    'wrapper' => 'book-row-wrapper',
                ],
            ];
        }
    }


    $form_state->setCached(FALSE);
    $form['actions']['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Save'),
        '#button_type' => 'primary',
    );
    return $form;
}

/**
* Callback for both ajax-enabled buttons.
*
* Selects and returns the fieldset with the names in it.
*/
public function addmoreCallback(array &$form, FormStateInterface $form_state) {
$name_field = $form_state->get('num_rows');
return $form['service_row'];
}
/**
* Submit handler for the "add-one-more" button.
*
* Increments the max counter and causes a rebuild.
*/
public function addOne(array &$form, FormStateInterface $form_state) {
$name_field = $form_state->get('num_rows');
$add_button = $name_field + 1;
$form_state->set('num_rows', $add_button);
$form_state->setRebuild();
}
/**
* Submit handler for the "remove one" button.
*
* Decrements the max counter and causes a form rebuild.
*/
public function removeCallback(array &$form, FormStateInterface $form_state) {
$name_field = $form_state->get('num_rows');
if ($name_field > 1) {
  $remove_button = $name_field - 1;
  $form_state->set('num_rows', $remove_button);
}
$form_state->setRebuild();
}

public function submitForm(array &$form, FormStateInterface $form_state) {

    $randnum = rand(11111111,99999999);

    try{

        $test="hello world";
		$conn = Database::getConnection();
        
		
		$field = $form_state->getValues();
	   
		$fields["title"] = $field['form_title'];
		$fields["description"] = $field['form_description'];
        $fields["fid"] = $randnum;

		
		  $conn->insert('Heading')
			   ->fields($fields)->execute();
		

        for($i=0;$i<count($form_state->getValue('service_row')['content']);$i++){
            $title=  $form_state->getValue('service_row')['content'][$i]['title_a'][$i];
            $body= $form_state->getValue('service_row')['content'][$i]['body_a'][$i];
            $link= $form_state->getValue('service_row')['content'][$i]['link'][$i];
            $image= $form_state->getValue('service_row')['content'][$i]['profile_image'][$i];
                $image1=$image[0];
                $file = \Drupal\file\Entity\File::load($image1);
                $filename = $file->getFileURI();


              $query=\Drupal::database()->insert('Cards');
              $query->fields(array(
                  'title',
                  'body',
                   'link',
                   'image',
                   'fid',
                   
              ));
               $query->values(array(
                   $title,
                   $body,
                   $link,
                   $filename,
                   $randnum,
                   
                ));
               $query->execute();
      }
      
      

    } catch(Exception $ex){
		\Drupal::logger('dn_students')->error($ex->getMessage());
	}
    
  }
  }

  