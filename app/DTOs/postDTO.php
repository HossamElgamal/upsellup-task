<?php

namespace App\DTOs;

class postDTO
{
    public string $title;
    public string $contnt;
    public string $author;

    public function __construct(string $title, string $contnt, string $author)
    {
        $this->title = $title;
        $this->contnt = $contnt;
        $this->author = $author;
    }



}

