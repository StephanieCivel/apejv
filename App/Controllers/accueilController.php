<?php

namespace App\Controllers;
use App\Models\order\Model;

class HomeController extends MainController{

    public function renderHome(){    
  
      $postModel = new PostModel();        
        $this->data = $postModel->getPosts(5);  
       $this->render();        
    }
}
