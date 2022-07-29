<!DOCTYPE html>
<html>

<head>
    <title>Quiz</title>
    <link rel="icon" type="image/png" href="pictures/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body class="questions">
    <div class="container-fluid">
        <?php
        include 'php/header.php'
        ?>
        <br>
        <div class="container">
            <?php
            $conn = OpenCon();
            $id = $_GET['superglobal'];
            //echo $id;
            $sql = "SELECT * FROM tbquizzes WHERE quiz_id=$id";
            $res = $conn->query($sql);
            echo "<form action='./php/CreatingQuiz.php' method='POST' enctype='multipart/form-data>'";
            while ($row = mysqli_fetch_array($res)) {
                $quizName = $row["name"];
                echo '<br><br>';
                echo "<input type='text' name='quizName' value='" . $quizName . "'/>";
                echo '<br><br>';
                echo '<textarea name="quizDescription" rows="4" cols="50">';
                echo $row["description"];
                echo '</textarea>';
                //echo "<p class='col-12 text-center'>" . $row["description"] . "</p>";
                $sql2 = "SELECT * FROM tbgallery WHERE quiz_id=$id";
                $result2 = mysqli_query($conn, $sql2);
                while ($row2 = $result2->fetch_assoc()) {
                    $image = $row2["image_name"];
                    echo '<br><br>';
                    echo "<img src='gallery/$image' style='width:200px;' ><img>";
                    echo '<br><br>';
                    echo "<input type='file' class='form-control' name='picToUpload[]' id='picToUpload' multiple='multiple' value='" . $image . "' /><br />";
                }
                //Importing questions
                $sql3 = "SELECT question_id,question FROM tbquestions WHERE quiz_id='$id'";
                $res = mysqli_query($conn, $sql3);
                $count = 0;
                while ($row3 = $res->fetch_assoc()) {
                    $count++;
                    $questionID = $row3['question_id'];
                    $quest = $row3['question'];
                    echo '<br>';
                    echo '<div class="row">';
                    echo '<div class="col-12">'; //div for question
                    echo '<h4>Question ' . $count . '</h4>';
                    echo '<textarea name="question' . $count . '" rows="4" cols="50">';
                    echo $quest;
                    echo '</textarea>';
                    //echo '<input type="text" name="Question' . $count . '" value="' . $quest . '"/>';
                    //Answers Part
                    $sql4 = "SELECT isCorrect,answer FROM tbanswers WHERE question_id='$questionID'";
                    $res2 = mysqli_query($conn, $sql4);
                    $count2 = 0;
                    while ($row4 = $res2->fetch_assoc()) {
                        $count2++;
                        $isCorrect = $row4['isCorrect'];
                        $ans = $row4['answer'];
                        echo '<div class="col-12">'; //div for answer
                        if ($isCorrect) {
                            $rAns = $ans;
                        }
                        echo '<h4>Answer ' . $count2 . '</h4>';
                        echo '<input class="" type="text" id="question' . $count . 'Ans' . $count2 . '" name="question' . $count . 'Answer' . $count2 . '" value="' . $ans . '">'; //Question1Ans1
                        // echo '<label class="" for="Question' . $count . 'Ans' . $count2 . '">' . $ans . '</label><br>';
                        echo '</div>'; //div for answer
                    }
                    echo '<div>';
                    echo '<br>';
                    echo '<label for="question' . $count . 'RA">Choose the right answer:</label>' .
                        '<select id="question' . $count . 'RA" class="form-select form-select-sm" name="question' . $count . 'RA" size="1">';
                    for ($i = 1; $i <= $count2; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                    echo '</div>';
                    echo '<input type="hidden" name="question' . $count . 'NrAns" value="' . $count2 . '"/>';
                    echo '</div>'; //div for question
                }
                echo '<input type="hidden" id="nrQ" value="' . $count . '"></input>';
                echo '<input type="hidden" name="DeleteQuiz" value="' . $id . '"></input>';
                echo '<br>';
                echo "<input type='submit' value='Save'/>";
                echo "</form>";
            }

            CloseCon($conn);
            ?>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="./js/answers.js"></script>
</body>

</html>