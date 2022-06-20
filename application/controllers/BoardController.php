<?php
namespace application\controllers;
// use application\controllers\Controller;
// 같은 namespace면 굳이 안적어도된다?

use application\models\BoardModel;

    class BoardController extends Controller {
        public function list(){
            $model = new BoardModel();
            $this->list = $model->selBoardList();
            //$this->addAttribute("list", $model->selBoardList());
            //이렇게 써도 된다
            
            return "board/list.php"; //view 파일명
        }
    }