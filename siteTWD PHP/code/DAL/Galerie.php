<?php

/**
 * Description of Galerie
 *
 * @author christophe
 */
class Galerie {
    private $id;
    private $description;
    private $URLImage; 
    
    function __construct($id, $description, $URLImage) {
        $this->id = $id;
        $this->description = $description;
        $this->URLImage = $URLImage;
    }
    
    function getURLImage() {
        return $this->URLImage;
    }

    function setURLImage($URLImage) {
        $this->URLImage = $URLImage;
    }
        
    function getId() {
        return $this->id;
    }

    function getDescription() {
        return $this->description;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescription($description) {
        $this->description = $description;
    }


}
