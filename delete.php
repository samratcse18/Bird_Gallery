<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <title>Delete</title>
</head>
<body class="bg-[url(image/bg.jpg)] bg-cover">
    <div class="flex justify-end mx-auto">
    <a href="index.php"><button class="bg-cyan-500 shadow-lg shadow-cyan-900/100 text-white py-4 px-2 mx-4 w-32  my-5 rounded-lg hover:bg-purple-700 active:bg-purple-900 focus:outline-yellow-500 focus:bg-black">Home</button></a>
    <a href="gallery.php"><button class="bg-cyan-500 shadow-lg shadow-cyan-900/100 text-white py-4 px-2 mx-4 w-32  my-5 rounded-lg hover:bg-purple-700 active:bg-purple-900 focus:outline-yellow-500 focus:bg-black">Back</button></a>
    </div>
    <?php
        $conn= mysqli_connect("localhost","root","","bird_house");
        if(!$conn){
            die('Could not Connect My Sql:' .mysql_error());
           }
        $data="SELECT * FROM image";
        $result = mysqli_query($conn,$data);
        $sql = "DELETE FROM image WHERE id='" . $_GET["id"] . "'";
        if (mysqli_query($conn, $sql)) {
            echo '<h1 class="text-center font-extrabold text-6xl my-32 text-yellow-500">Record deleted successfully</h1>';
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    ?>
</body>
</html>