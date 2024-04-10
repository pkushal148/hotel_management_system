<?php

    $hname="localhost";
    $uname="root";
    $password="";
    $db="hotel_web";

    $con=mysqli_connect($hname,$uname,$password,$db);
    
    if(!$con)
    {
        die("cannot connect to db".mysqli_connect_error());
    }

    function filteration($data)
    {
        foreach($data as $key => $value)
        {
            $value=trim($value);  //extra space
            $value=stripslashes($value);   //backward spaces
            $value=strip_tags($value);  //html tags
            $value=htmlspecialchars($value);  //special

            $data[$key]=$value;
        }
        return $data;
    }

    function select($sql,$values,$datatypes)
    {
        $con=$GLOBALS['con'];
        if($stmt=mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt))
            {
                $res=mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else
            {
                mysqli_stmt_close($stmt);
                die("query cannot be executed-Select");
            }
            
        }
        else
        {
            die("query cannot be prepared-Select");
        }
    }

    function selectAll($table)
    {
        $con=$GLOBALS['con'];
        $res=mysqli_query($con,"SELECT * FROM $table");
        return $res;
    }

    function update($sql,$values,$datatypes)
    {
        $con=$GLOBALS['con'];
        if($stmt=mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt))
            {
                $res=mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else
            {
                mysqli_stmt_close($stmt);
                die("query cannot be executed-Update");
            }
            
        }
        else
        {
            die("query cannot be prepared-Update");
        }
    }

    function insert($sql,$values,$datatypes)
    {
        $con=$GLOBALS['con'];
        if($stmt=mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt))
            {
                $res=mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else
            {
                mysqli_stmt_close($stmt);
                die("query cannot be executed-Insert");
            }
            
        }
        else
        {
            die("query cannot be prepared-Insert");
        }
    }

    function delete($sql,$values,$datatypes)
    {
        $con=$GLOBALS['con'];
        if($stmt=mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt))
            {
                $res=mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else
            {
                mysqli_stmt_close($stmt);
                die("query cannot be executed-Delete");
            }
            
        }
        else
        {
            die("query cannot be prepared-Delete");
        }
    }
    
?>