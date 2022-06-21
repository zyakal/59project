<?php
namespace application\models;
use PDO;

class BoardModel extends Model {
    public function selBoardList(){
        $sql = "SELECT i_board, title, created_at 
                    FROM t_board
                    ORDER BY i_board DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
    }   
    public function selBoard(&$param) {
        $sql = "SELECT A.i_board, A.title, A.ctnt, B.nm, A.created_at, A.updated_at 
                    FROM t_board as A
                    INNER JOIN t_user as B 
                    ON A.i_user =B.i_user 
                    WHERE i_board = :i_board";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function delboard(&$param){
        $sql = "DELETE FROM t_board WHERE i_board = :i_board";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        $stmt->execute();
    }

    public function modBoard(&$param){
        $sql = "UPDATE t_board SET title = :title, ctnt = :ctnt WHERE i_board = :i_board";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        $stmt->bindValue(':title', $param["title"]);
        $stmt->bindValue(':ctnt', $param["ctnt"]);
        $stmt->execute();
    }
}