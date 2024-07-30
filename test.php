






<?php
$info = mysqli_query( $conn,"SELECT * from basic where username = '$user' " );
while($data = mysqli_fetch_array($info) )
{
echo "
<tr>
    <th>$data['$username']</th>
</tr>
";
}













// <?php
// include('config.php');
// if(isset($_POST['login']))
// {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
// }
// $sql ="SELECT  FROM basic where username ='blal' AND password = 'a2245852' ";
// $result = mysqli_query($conn,$sql);
// $row = mysqli_fetch_assoc($result);
// echo"
// $row[id]
// $row[username]
// $row[username]


// ";