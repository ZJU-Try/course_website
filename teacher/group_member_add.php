<?php
require_once('../common/mysql_connect.php');

if($_POST) {
  if(empty($_POST['student_id']))
  {
      echo '<script>
              alert("输入不能为空");
              setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
            </script>';
      return;
  }
  // $query = 'Insert into student_class_group VALUES('.$_SESSION['class_id'].','.$_POST['student_id'].','.$_SESSION['group_id'].')';
  $query = 'select * from student_class_group WHERE class_id = 1 AND student_id = '.$_POST['student_id'];
  $result = mysqli_query($conn, $query);
  if(@mysqli_num_rows($result) == 1){
      echo '<script>
              alert("该学生已经拥有小组");
              setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
              </script>';
      return;
  }

  $query = 'Insert into student_class_group VALUES(1,'.$_POST["student_id"].','.$_GET['group_id'].')';
  mysqli_query($conn, $query);
  echo '<script>
        setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
        alert("添加成功");
      </script>';
  mysqli_close($conn);
  return;
}
?>

<form id="form" action="" method="post">
<input type="hidden" name="student_id" id="student_id" value="">
</form>
<script>
  var str=window.prompt('请输入学生学号 :');
  document.getElementById("student_id").value =str;
  document.getElementById("form").submit();
</script>

?>

