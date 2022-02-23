<?php
    $roll = isset($_POST['roll']) ? $_POST['roll'] : "";
    $q1=isset($_POST['ques1']) ? $_POST['ques1'] : "";
    $q2=isset($_POST['ques2']) ? $_POST['ques2'] : "";
    $q3=isset($_POST['ques3']) ? $_POST['ques3'] : "";
    $q4=isset($_POST['ques4']) ? $_POST['ques4'] : "";
    $q5=isset($_POST['ques5']) ? $_POST['ques5'] : "deii";
    $t=isset($_POST['time']) ? $_POST['time'] : false;
    //Database connection
    $conn = new mysqli("localhost","root","","quiz");
    if(!$conn){
        echo "Connection failed";
    }
    else{
        $result=$conn->query("select * from student where Roll_No = $roll");
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            if($q5==='deii' && $t!=true){
                echo json_encode(
                    array(
                        'ok' => true,
                        'roll' => $roll,
                        'name' => $row['Name'],
                        'ques' => $row['Ques_submitted'],
                        'score' =>$row['Score']
                        
                    )
                );
            }
            if($t){
                $time= $row['time']-1;
                $conn->query("update student set time=$time where Roll_No = $roll;");
                if($time=== 0){
                    $conn->query("update student set Ques_submitted=5 where Roll_No = $roll;");
                    $result=$conn->query("select * from student where Roll_No = $roll");
                    $row=$result->fetch_assoc();
                }
                echo json_encode(
                    array(
                        'time' => $time,
                        'score' => $row['Score'],
                        'ques' => $row['Ques_submitted']
                    )
                );
            }
        }
        else{
            echo json_encode(
                array(
                    'ok' => false
                )
            );
        }
        if($q1==='true' || $q1==='false'){
            if($q1==='true'){
                $result=$conn->query("select Score from student where Roll_No = $roll");
                $score=$result->fetch_assoc();
                $score=$score['Score']+1;
                $conn->query("update student set Score = $score where Roll_No=$roll");
            }
            $result=$conn->query("select Ques_submitted from student where Roll_No = $roll");
            $score=$result->fetch_assoc();
            $score=$score['Ques_submitted']+1;
            $conn->query("update student set Ques_submitted = $score where Roll_No=$roll");
        }
        if($q2==='true' || $q2==='false'){
            if($q2==='true'){
                $result=$conn->query("select Score from student where Roll_No = $roll");
                $score=$result->fetch_assoc();
                $score=$score['Score']+1;
                $conn->query("update student set Score = $score where Roll_No=$roll");
            }
            $result=$conn->query("select Ques_submitted from student where Roll_No = $roll");
            $score=$result->fetch_assoc();
            $score=$score['Ques_submitted']+1;
            $conn->query("update student set Ques_submitted = $score where Roll_No=$roll");
        }
        if($q3==='true' || $q3==='false'){
            if($q3==='true'){
                $result=$conn->query("select Score from student where Roll_No = $roll");
                $score=$result->fetch_assoc();
                $score=$score['Score']+1;
                $conn->query("update student set Score = $score where Roll_No=$roll");
            }
            $result=$conn->query("select Ques_submitted from student where Roll_No = $roll");
            $score=$result->fetch_assoc();
            $score=$score['Ques_submitted']+1;
            $conn->query("update student set Ques_submitted = $score where Roll_No=$roll");
        }
        if($q4==='true' || $q4==='false'){
            if($q4==='true'){
                $result=$conn->query("select Score from student where Roll_No = $roll");
                $score=$result->fetch_assoc();
                $score=$score['Score']+1;
                $conn->query("update student set Score = $score where Roll_No=$roll");
            }
            $result=$conn->query("select Ques_submitted from student where Roll_No = $roll");
            $score=$result->fetch_assoc();
            $score=$score['Ques_submitted']+1;
            $conn->query("update student set Ques_submitted = $score where Roll_No=$roll");
        }
        if($q5==='true' || $q5==='false'){
            $result=$conn->query("select Score from student where Roll_No = $roll");
            $score=$result->fetch_assoc();
            $score=$score['Score'];
            if($q5==='true'){
                $result=$conn->query("select Score from student where Roll_No = $roll");
                $score=$result->fetch_assoc();
                $score=$score['Score']+1;
                $conn->query("update student set Score = $score where Roll_No=$roll");
            }
            $result=$conn->query("select Ques_submitted from student where Roll_No = $roll");
            $ques=$result->fetch_assoc();
            $ques=$ques['Ques_submitted']+1;
            $conn->query("update student set Ques_submitted = $ques where Roll_No=$roll");
            echo json_encode(
                array(
                    'Score' => $score
                )
                );
        }
    }
    $conn -> close();
    
?>