<?php

namespace Drupal\ourservice\Controller;
use Drupal\Core\Database\Database;


use Drupal\Core\Controller\ControllerBase;

class ServicePage extends ControllerBase {

        public function fetchData($id) {
                
                $result = \Drupal::database()->select('Heading', 'H')
                ->fields('H', array('fid', 'title', 'description'))
                ->condition('id',$id)
                ->execute()->fetchAllAssoc('id');

                $fid= $result[""]->fid;

                
                $connection = \Drupal::database();
                $query = $connection->select('Cards', 'C');
                $query->condition('C.fid',$fid);
                $query->fields('C', ['title', 'body', 'link','image']);
                // use fetchAllKeyed
                $cards = $query->execute()->fetchAll();
                
// dd($result);

                return [
                        '#theme' => 'nodedata1',
                        '#cards' => $cards,
                        '#headers' => $result,
                        
                        
                      ];   

}
}