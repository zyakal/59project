<?php
namespace application\controllers;
// use application\controllers\Controller;
// 같은 namespace면 굳이 안적어도된다?

use application\models\BoardModel;

    class BoardController extends Controller {
        public function list(){
            $model = new BoardModel();
            $this->list = $model->selBoardList();         
            $this->addAttribute(_JS, ["board/list"]);

            //$this->addAttribute("list", $model->selBoardList());
            //이렇게 써도 된다
            $this->addAttribute(_TITLE, "리스트");
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/list.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            
            return "template/t1.php"; //view 파일명
        }

        public function detail(){
            $i_board = $_GET["i_board"];
            $this->addAttribute(_JS, ["board/detail"]);
            $model = new BoardModel();
            // print $i_board;
            $param = ["i_board"=> $i_board];
            $this->addAttribute("data", $model->selBoard($param));
            $this->addAttribute(_TITLE, "디테일");
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/detail.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            return "template/t1.php";

            //글번호, 제목, 내용, 글쓴이 이름, 작성일
        }

        public function del(){
            $i_board = $_GET["i_board"];
            $model = new BoardModel();
            $this->addAttribute(_JS, ["board/del"]);
            $param = ["i_board"=> $i_board];
            $this->addAttribute("data", $model->delboard($param));
            return "redirect:/board/list";

        }

        public function mod(){
            $i_board = $_GET["i_board"];
            $param = ["i_board"=> $i_board];
            $model = new BoardModel();
            $this->addAttribute("data", $model->selBoard($param));
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/mod.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));

            return "template/t1.php";
        }

        public function modProc(){
            $param = [
                "i_board"=> $_POST["i_board"], 
                "title"=> $_POST["title"], 
                "ctnt"=> $_POST["ctnt"]
            ];
            print_r($param);
            $model = new BoardModel();
            $this->addAttribute("data", $model->updBoard($param));
            return "redirect:/board/detail?i_board=" . $param['i_board'];
        }

        public function write(){
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/write.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));

            return "template/t1.php";
        }

        public function writeProc(){            
            $param = [
                "i_user" => $_SESSION[_LOGINUSER]->i_user,
                "title" => $_POST["title"],
                "ctnt" => $_POST["ctnt"]
            ];
            $model = new BoardModel();
            $this->addAttribute("data", $model->insBoard($param));

            $this->addAttribute(_TITLE, "글쓰기");
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/list.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));

            return "redirect:/board/list";
        }

    }