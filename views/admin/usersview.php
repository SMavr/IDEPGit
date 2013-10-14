<!DOCTYPE html>


<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script type='text/javascript' src='http://twitter.github.io/bootstrap/assets/js/jquery.js'></script>
<?php require_once TABS;?>
    </head>
    <body>
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li <li class="<?php echo isset($_POST['attrname']) ? '' : 'active'; ?>"><a href="#usertablediv" data-toggle="tab">Users</a></li>
        <li class="<?php echo isset($_POST['attrname']) ? 'active' : ''; ?>"><a href="#attrdiv" data-toggle="tab">Attributes</a></li>
        </ul>
          <div id="users_attributes" class="tab-content">
        <div class="tab-pane <?php echo isset($_POST['attrname']) ? '' : 'active'; ?>" id="usertablediv">
              
        <table class="table table-hover" id="usertable">
            <tr><th>Username</th><th>Password</th><th>Role</th><th>Attribute</th></th><th>Ideas/Score Ratio</th><th>Edit</th><th>Delete</th></tr>
        <?php
               $controller=new UserCon();
            //   $users_array=$controller->loadUsers();
               $attrs_array=$controller->loadAttrs();
               $attrs_from_a_user=$controller->loadAttrPerUser(1);
               echo '<tr><td>'.$attrs_from_a_user.'</td></tr>';
               foreach ($attrs_array as $value)
                   echo '<tr><td>'.$controller->attrmodel->get('attr_title',$value).'<td><tr> ';?>
//              foreach ($users_array as $value) 
//                  echo '<tr><td>'.$controller->usermodel->get('username',$value).
//                      '</td><td>'.$controller->usermodel->get('password',$value).'</td>
//                          <td>'.$controller->usermodel->get('role',$value).'</td><td>'
//                              .$controller->attrmodel->get('attr_title',$value)
//                      .'</td></tr>';?>
            
                 
               </table>
            
                <a href="#attrModal" role="button" class="btn btn-primary" data-toggle="modal" onclick="javascript:editAttribute('','','');">Add Attribute</a>
        </div>   
          </div>
      
        <!-- end of attributes table-->
        
        
            <!-- Modal for the creation of a New User -->
            <div id="userModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></div> 
                 <h3 id="myModalLabel">Add New User</h3>
                 <form method='post' action='01users.php'>
                 User Name <input type="text" name="newusername" id='editName'><br>
         User Password <input type="text" name="newpasswordname" id='editPass'><br>
         User Email <input type="text" id='editEmail' name="newMail"><br>
         User Role <select multiple="multiple">
  <option >Evaluator</option>
  <option >Observer</option>
         </select><br>
         User Attribute <select multiple="multiple" name="isattr[]" id="editAttr">
             <?php
           $attrfetch=mysqli_query($con,$attrquery);  
 while($attrresult = mysqli_fetch_array($attrfetch)) {
     // $selected = in_array( $attrresult[attr_title], $attr ) ? ' selected' : '';
echo  "<option >".$attrresult[attr_title]."</option>";
 }
             ?>
         </select><br>
          <!-- hidden div used to capture the edit user id -->
         <div style="visibility: hidden"> <input type="text" name="hiddenid" id="hiddenid"></div>
         <button class='btn btn-primary'type='submit'>OK</button>
         <button class='btn' data-dismiss="modal" aria-hidden="true">Cancel</button>
                 </form>
                
            </div>
          <!--end of user Modal-->  
          
          <!-- Modal for edit uses to each attribute -->
            <div id="attrModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></div> 
                <h5 id="myModalLabel">Edit <p name="attrpd" id="attrpd"></p></h5> 
                 <form method='post' action='01users.php'>
                 Edit attribute title <input type="text" name="attrname" id='attrname'><br>
         Users<br> <select multiple="multiple" name="attr_users_select" id="attr_users_select" style="height:200px">
             <?php
             $fetch1=mysqli_query($con,$query);
 while($result1 = mysqli_fetch_array($fetch1)) {
echo  "<option >".$result1["username"]."</option>";
 }
             ?>
         </select><br>
          <!-- hidden div used to capture the id of the current attribute -->
         <div style="visibility: hidden"> <input type="text" name="attr_hidden_id" id="attr_hidden_id"></div>
         <button class='btn btn-primary'type='submit'>Save</button>
         <button class='btn' data-dismiss="modal" aria-hidden="true">Cancel</button>
                 </form>
                
            </div>
          <!--end of user Modal-->  
     
<script>
function deleteConfirm(userid)
{
var r=confirm("Are you sure you want to delete this user?");
if (r==true){
    deleteAnswers(userid);
}
}

function deleteAnswers(userid)
{
    //document.getElementById("exp").innerHTML=userid;

//run again the php file
// this time the delete post values are valid!
$.post("01users.php",{ deleteuserid : userid });
window.location.href = "01users.php";
confirm("Would you like to delete all of his answers too?");
}

//insert values from table to modal
function rewriteUser(name,password,role,userid,attr) {
 var myTarget = document.getElementById("editName");
    myTarget.value =name;
    myTarget = document.getElementById("editPass");
    myTarget.value =password;
     myTarget = document.getElementById("hiddenid");
    myTarget.value =userid;
    
    //make the preselected attributes of users selected 
 var optionsToSelect=attr.split(",");
myTarget = document.getElementById("editAttr");

  for ( var i = 0, l = myTarget.options.length, o; i < l; i++ )
{
    
  o = myTarget.options[i];
  o.selected=false;
  //is the attribute of the user common with the attributes in the modal?
  if ( optionsToSelect.indexOf( o.text ) != -1 )
  {
    o.selected = true;
  }
}
}

// insert values to the attributes modal
function editAttribute(title,attr_id,users_to_attr) {
 var myTarget = document.getElementById("attrname");
    myTarget.value =title;
    document.getElementById("attrpd").innerHTML = title;
     myTarget = document.getElementById("attr_hidden_id");
    myTarget.value =attr_id;
    
    //grey the users who belong to the specific attribute
 var optionsToSelect=users_to_attr.split(",");
myTarget = document.getElementById("attr_users_select");

  for ( var i = 0, l = myTarget.options.length, o; i < l; i++ )
{
    
  o = myTarget.options[i];
  o.selected=false;
  //is the attribute of the user common with the attributes in the modal?
  if ( optionsToSelect.indexOf( o.text ) != -1 )
  {
    o.selected = true;
  }
}


}
//jQuery(document).ready(function ($) {
//        $('#tabs').tab();
//    });

 
</script>
  

    </body>
    
</html>