<?php
    $con = mysqli_connect("localhost","root","","try_ajax");

    extract($_POST);
    
    if(isset($_POST['readRecords']))
    {
        $data = '<table border="2" bgcolor="lightblue" align="center">
                    <tr>
                        <th>NO.</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Delete Action</th>
                    </tr>';
                    $display = "SELECT * FROM `login1` ";
                    $res = mysqli_query($con,$display);

        if(mysqli_num_rows($res) > 0)
        {
            $number = 1;
            while($row = mysqli_fetch_array($res))
            {
                $data .= '<tr>
                    <td>'.$number.'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['psd'].'</td>
                    <td>
                    <button onclick="DeleteUser('.$row['id'].')" style="background:red;color:white;">Delete</button>
                    </td>
                    </tr>';
                    $number++;
                }

        }
    }
    echo $data;


    // $name =  $_POST['name'];
    // $psd =  $_POST['psd'];
    if(isset($_POST['name']) && isset($_POST['psd']))
    {
        $ins = "INSERT INTO `login1`  (`name`,`psd`) VALUES ('$name','$psd')";
        $res = mysqli_query($con,$ins);
        echo $res;
        echo "<script>alert('Insert')</script>";
    }
    
    // Delete User Records
    if(isset($_POST['deleteid']))
    {
        $userid = $_POST['deleteid'];
        $del = "DELETE FROM `login1` where `id`='$userid'";
        $res = mysqli_query($con,$del);
        $res;
    }


?>