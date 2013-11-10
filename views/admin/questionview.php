
<html>
    
    <body>
        
        <table>
             <tr><th>Username</th></tr>
<?php

$questions_controller=new QuestionCon();
$questions_array=$questions_controller->loadQuestions();


foreach($questions_array as $value)
{
    echo '<tr><td>'.$questions_controller->questionmodel->get('qtext',$value).
        '</td></tr>';
}
               ?>
            
        </table>
    </body>
</html>