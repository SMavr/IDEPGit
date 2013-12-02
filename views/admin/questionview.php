
<html>
    
    <body>
        
        <table>
             <tr><th>Username</th></tr>
<?php

$questions_controller=new QuestionCon();
$questions_array=$questions_controller->loadQuestions();
$answers_array=$questions_controller->loadAnswersPerQuestion(2);

//foreach($questions_array as $value)
//{
//    echo '<tr><td>'.$questions_controller->questionmodel->get('qtext',$value).
//        '</td></tr>';
//}
foreach($answers_array as $value)
{
    echo '<tr><td>'.$questions_controller->answermodel->get('avalue',$value).
        '</td></tr>';
}

               ?>
            
        </table>
    </body>
</html>