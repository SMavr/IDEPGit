<?php
require_once 'lib/framework.php';

//require_once CONS.DS.'usercon.php';
//require_once TABLES.DS.'ideainfo.php';
//require_once VIEWS.'admin'.DS.'usersview.php';
//require_once VIEWS.'login.php';




// here we can test if the model sql questions work
echo "<pre>";

//testing answers
require_once TABLES.DS.'answerinfo.php';
require_once MODELS.DS.'answermodel.php';
$answermodel=new AnswerModel();
//print_r($answermodel->getAnswer(4));
print_r($answermodel->getAnswers());

//testing categories
//require_once TABLES.DS.'categoryinfo.php';
//require_once MODELS.DS.'categorymodel.php';
//$categorymodel=new CategoryModel();
////print_r($categorymodel->getCategory(1));
//print_r($categorymodel->getCatagories());


//testing ideas
//require_once TABLES.DS.'ideainfo.php';
//require_once MODELS.DS.'ideamodel.php';
//$ideamodel=new IdeaModel();
////print_r($ideamodel->getIdea(1));
//print_r($ideamodel->getIdeas());

// tesing user models
//$logic = new UserModel();
//print_r($logic->getUser(1));
//print_r($logic->getUsers());
//print_r($logic);
//$logic->db->setQuery("select * from user");
//
//print_r($logic->db->getRows());
?>


