<?php
namespace zlyq\zlyqmodel\video;

class VideoUploadInfo
{
    private $video;
    private $image;
    private $title;
    private $userId;
    private $content;
    private $orgFileName;
    private $os;
    private $source;
    private $thirdId;
    private $thirdExtra;

    public function __construct($video='', $image='', $title='', $userId='', $content='',
                                $orgFileName='', $os=0, $source=0, $thirdId='', $thirdExtra='')
    {
        $this->video = $video;
        $this->image = $image;
        $this->title = $title;
        $this->userId = $userId;
        $this->content = $content;
        $this->orgFileName = $orgFileName;
        $this->os = $os;
        $this->source = $source;
        $this->thirdId = $thirdId;
        $this->thirdExtra = $thirdExtra;
    }

    public function __toArray()
    {
        return call_user_func('get_object_vars', $this);
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
