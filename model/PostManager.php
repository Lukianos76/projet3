<?php

class PostManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=projet3;charset=utf8", "root", "");
    }

    public function findAll()
    {
        $bdd = $this->bdd;

        $query = "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date_fr FROM projet3_posts ORDER BY creation_date";

        $req = $bdd->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $post = new Post();
            $post->setId($row['id']);
            $post->setTitle($row['title']);
            $post->setContent($row['content']);
            $post->setCreationDate($row['creation_date_fr']);

            $posts[] = $post;
        }

        return $posts;
    }

    public function findHome(){
        $bdd = $this->bdd;

        $query = "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date_fr FROM projet3_posts ORDER BY creation_date DESC LIMIT 3";

        $req = $bdd->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $post = new Post();
            $post->setId($row['id']);
            $post->setTitle($row['title']);
            $post->setContent($row['content']);
            $post->setCreationDate($row['creation_date_fr']);

            $posts[] = $post;
        }

        return $posts;
    }

    public function find($id)
    {
        $bdd = $this->bdd;

        $query = "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date_fr FROM projet3_posts WHERE id = :id";

        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);

        $post = new Post();
        $post->setId($row['id']);
        $post->setTitle($row['title']);
        $post->setContent($row['content']);
        $post->setCreationDate($row['creation_date_fr']);

        return $post;
    }

    public function create($values)
    {
        $bdd = $this->bdd;

        $query = "INSERT INTO projet3_posts (id, title, content, creation_date) VALUES (NULL, :title, :content, CURRENT_TIMESTAMP)";

        $req = $bdd->prepare($query);

        $req->bindValue(':title', $values['title'], PDO::PARAM_STR);
        $req->bindValue(':content', $values['content'], PDO::PARAM_STR);

        $req->execute();
    }

    public function delete($id)
    {
        $bdd = $this->bdd;

        $query = "DELETE FROM projet3_posts WHERE id = :id";

        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();

        $query = "DELETE FROM projet3_comments WHERE fk_post_id = :id";

        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }

    public function update($values)
    {
        $bdd = $this->bdd;

        $query = "UPDATE projet3_posts SET title = :title, content = :content WHERE id = :id";

        $req = $bdd->prepare($query);

        $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
        $req->bindValue(':title', $values['title'], PDO::PARAM_STR);
        $req->bindValue(':content', $values['content'], PDO::PARAM_STR);

        $req->execute();
    }
}