<?php

class CommentManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=projet3;charset=utf8", "root", "");
    }

    public function findAll($id)
    {
        $bdd = $this->bdd;

        $query = "SELECT id, fk_post_id, author, comment, report, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%i') AS comment_date_fr FROM comments WHERE fk_post_id = :fk_post_id ORDER BY comment_date DESC ";

        $req = $bdd->prepare($query);
        $req->bindValue(':fk_post_id', $id, PDO::PARAM_INT);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $comment = new Comment();
            $comment->setId($row['id']);
            $comment->setFkPostID($row['fk_post_id']);
            $comment->setAuthor($row['author']);
            $comment->setComment($row['comment']);
            $comment->setCommentDate($row['comment_date_fr']);
            $comment->setReport($row['report']);


            $comments[] = $comment;
        }
        return $comments;
    }


}