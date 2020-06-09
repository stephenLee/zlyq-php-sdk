<?php

namespace zlyq\zlyqmodel\article;

class ArticleUploadInfo
{
    private $coverIds;
    private $galleryIds;
    private $title;
    private $content;
    private $os;
    private $source;
    private $mediaType;
    private $h5content;
    private $userId;
    private $thirdId;
    private $thirdExtra;

    public function __construct($coverIds=NULL, $galleryIds=NULL, $title='', $content='', $os=0, $source=0,
                                $mediaType=0, $h5content='', $userId='', $thirdId='', $thirdExtra='')
    {
        $this->coverIds = $coverIds;
        $this->galleryIds = $galleryIds;
        $this->title = $title;
        $this->content = $content;
        $this->os = $os;
        $this->source = $source;
        $this->mediaType = $mediaType;
        $this->h5content = $h5content;
        $this->userId = $userId;
        $this->thirdId = $thirdId;
        $this->thirdExtra = $thirdExtra;
    }

    public function __get($property_name)
    {
        if (isset($this->$property_name)) {
            return ($this->$property_name);
        } else {
            return (NULL);
        }
    }

    public function __set($property_name, $value)
    {
        $this->$property_name = $value;
    }

    public function __isset($nm)
    {
        return isset($this->$nm);
    }

    public function __unset($nm)
    {
        unset($this->$nm);
    }
}
