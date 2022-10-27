<?php

namespace Drupal\test\Controller;


use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Drupal\test\Entity\ServiceEntityInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\image\Entity\ImageStyle;
use \Drupal\paragraphs\Entity\Paragraph;

class AssignmentController extends ControllerBase {

    public function accessFields($id=Null) {
        // get the id from the controller argument
        $entity=\Drupal::routeMatch()->getParameter('id');

        $node = \Drupal::entityTypeManager()->getStorage('service_entity')
        ->load($entity);


            $page_title = $node->field_title->value;
            $page_body = strip_tags($node->field_body->value);

            $paragraph = $node->field_cards->getValue();
            // Loop through the result set.
            
       

            $card=array();

            $build = [];

                foreach ( $paragraph as $element ) {
                 $p = \Drupal\paragraphs\Entity\Paragraph::load( $element['target_id'] );
                    $card_title = strip_tags($p->field_card_title->value);
                    $card_body = strip_tags($p->field_card_body->value);
                    $card_link = $p->field_link->title;
                    $card_link_url = $p->field_link->uri;
                    $card_image = $p->field_card_image->entity->getFileUri();
                        $url = ImageStyle::load('medium')->buildUrl($card_image);

                  $card=[];
                  $card  =[   $card_image,
                              $card_title,
                              $card_body,
                              $card_link,
                              $card_link_url,];

                    array_push($build,$card);
                    
                }
        
        
                return [
                    '#theme' => 'nodedata',
                    '#cards' => $build,
                    '#title' => $page_title,
                    '#description' => $page_body,
                  ];       

                
        }

}