<?php

namespace App\Entity;

/**
 * Description of Album
 *
 * @author fb
 */
class Album {

    //put your code here
    private int $id;
    private string $title;
    private string $artist;
    private int $index;
    private string $range;

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

   public function setIndex(int $index) {
        $this->index = $index;
    }

    public function getIndex(): int {
        return $this->index;
    }
    
    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setArtist(string $artist) {
        $this->artist = $artist;
    }

    public function getArtist(): string {
        return $this->artist;
    }  
    public function setRange(string $range) {
        $this->range = $range;
    }

    public function getRange(): string {
        return $this->range;
    }    
    
}
