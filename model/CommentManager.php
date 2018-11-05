<?php

class CommentManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=projet3;charset=utf8", "root", "");
    }

    public function findAllComments(){
        $bdd = $this->bdd;

        $query = "SELECT id, fk_post_id, author, comment, report, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%i') AS comment_date_fr FROM projet3_comments ORDER BY report DESC ";

        $req = $bdd->prepare($query);
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
        if (isset($comments)) {
            return $comments;
        }
    }

    public function findAll($id)
    {
        $bdd = $this->bdd;

        $query = "SELECT id, fk_post_id, author, comment, report, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%i') AS comment_date_fr FROM projet3_comments WHERE fk_post_id = :fk_post_id ORDER BY comment_date DESC ";

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
        if (isset($comments)) {
            return $comments;
        }
    }

    public function find($id)
    {
        $bdd = $this->bdd;

        $query = "SELECT id, fk_post_id, author, comment, report, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%i') AS comment_date_fr FROM projet3_comments WHERE id = :id";

        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);

        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setFkPostID($row['fk_post_id']);
        $comment->setAuthor($row['author']);
        $comment->setComment($row['comment']);
        $comment->setCommentDate($row['comment_date_fr']);
        $comment->setReport($row['report']);

        return $comment;
    }


    public function create($values, $id)
    {
        $bdd = $this->bdd;

        $query = "INSERT INTO projet3_comments (id, fk_post_id, author, comment, comment_date, report) VALUES (NULL, :fk_post_id, :author, :comment, CURRENT_TIMESTAMP, 0)";

        $req = $bdd->prepare($query);

        $req->bindValue(':fk_post_id', $id, PDO::PARAM_STR);
        $req->bindValue(':author', $_SESSION['pseudo'], PDO::PARAM_STR);
        $req->bindValue(':comment', $values['comment'], PDO::PARAM_STR);

        $req->execute();
    }

    public function delete($id)
    {
        $bdd = $this->bdd;

        $query = "DELETE FROM projet3_comments WHERE id = :id";

        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }

    public function report($id)
    {
        $bdd = $this->bdd;


        $query = "SELECT report FROM projet3_comments WHERE id = :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $report = $req->fetch();
        $report['report'] = $report['report'] + 1;


        $query = "UPDATE projet3_comments SET report = :report WHERE id = :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':report', $report['report'], PDO::PARAM_STR);
        $req->execute();


        $query = "INSERT INTO projet3_report_comments (fk_comment_id, fk_pseudo) VALUES (:fk_comment_id, :fk_pseudo)";
        $req = $bdd->prepare($query);
        $req->bindValue(':fk_comment_id', $id, PDO::PARAM_INT);
        $req->bindValue(':fk_pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);
        $req->execute();

    }

    public function checkReport($id)
    {
        $bdd = $this->bdd;

        $query = "SELECT fk_comment_id, fk_pseudo FROM projet3_report_comments WHERE fk_comment_id = :fk_comment_id AND fk_pseudo = :fk_pseudo";

        $req = $bdd->prepare($query);

        $req->bindValue(':fk_comment_id', $id, PDO::PARAM_INT);
        $req->bindValue(':fk_pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);

        $req->execute();

        $isReport = $req->fetch();

        return $isReport;

    }

}