<?php

class Post
{
    private $id;
    private $title;
    private $content;
    private $creation_date;

    /**
     * @return mixed
     */
    public function getContentResume()
    {
        $endStr = '[...]';
        if( strlen( $this->getContent() ) <= 250 ) return $this->getContent();
        $str = mb_substr( $this->getContent(), 0, 300 - strlen( $endStr ) + 1, 'UTF-8');

        return substr( $str, 0, strrpos( $str,' ') ).$endStr;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * @param mixed $creation_date
     */
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;
    }


}