<?php

class Hashtag_Mapper extends Abstract_Mapper
{
    public function create(Hashtag_Model $hashtag): Hashtag_Model
    {
        Hashtag_Validator::validateNew($hashtag);

        $hashtagTitle = $hashtag->title;

        $sql = 'INSERT INTO hashtags (h_title) VALUES (:h_title)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':h_title', $hashtagTitle, PDO::PARAM_STR);
        if (!$stmt->execute()) {
            $error = $stmt->errorInfo();
            throw new Exception($error[2], $error[1]);
        }

        $hashtagID = (int) $this->pdo->lastInsertId();
        $hashtag->setID($hashtagID);
        if ($hashtag->getID() === 0) {
            throw new Exception('Hashtag not saved', 1);
        }

        return $hashtag;
    }

    public function update(Hashtag_Model $hashtag): Hashtag_Model
    {
        Hashtag_Validator::validateExists($hashtag);

        $hashtagID = $hashtag->getID();
        $hashtagTitle = $hashtag->title;

        $sql = 'UPDATE hashtags SET h_title=:h_title WHERE h_id=:h_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':h_id', $hashtagID, PDO::PARAM_INT);
        $stmt->bindParam(':h_title', $hashtagTitle, PDO::PARAM_STR);
        if (!$stmt->execute()) {
            $error = $stmt->errorInfo();
            throw new Exception($error[2], $error[1]);
        }
        $count = $stmt->rowCount();
        if ($count == 0) {
            throw new Exception('Hashtag with ID '.$hashtagID.' not exists', 0);
        }

        return $hashtag;
    }
}
