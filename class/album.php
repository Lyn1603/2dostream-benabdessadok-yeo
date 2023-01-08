<?php
require_once 'connect.php';

class Album
{
    public int $id;
    public string $name;
    public int $views;
    public int $likes;
    public bool $isprivate;

    public function __construct($array)
    {
        $this->id = $array['id'];
        $this->name = $array['name'];
        $this->views = $array['views'];
        $this->likes = $array['likes'];
        $this->isprivate = $array['isprivate'] === 1;
    }

}