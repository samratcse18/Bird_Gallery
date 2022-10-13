<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="output.css">
    <title>Update</title>
    
<body class="bg-[url(image/bg.jpg)] bg-cover">
    <div class="flex justify-end mx-auto">
    <a href="index.php"><button class="bg-cyan-500 shadow-lg shadow-cyan-900/100 text-white py-4 px-2 mx-4 w-32  my-5 rounded-lg hover:bg-purple-700 active:bg-purple-900 focus:outline-yellow-500 focus:bg-black">Home</button></a>
    <a href="gallery.php"><button class="bg-cyan-500 shadow-lg shadow-cyan-900/100 text-white py-4 px-2 mx-4 w-32  my-5 rounded-lg hover:bg-purple-700 active:bg-purple-900 focus:outline-yellow-500 focus:bg-black">Back</button></a>
    </div>
    <?php
    				$conn=mysqli_connect("localhost","root","","bird_house");
                    if(isset($_POST['submit_button']))
                    {
                        $name=$_POST['name'];
                        $scientific_name=$_POST['scientific_name'];
                        $color=$_POST['color'];
                        $weight=$_POST['weight'];
                        $alive=$_POST['alive'];
                        $found=$_POST['found'];
                        $id=$_POST['id'];
                        $bird=$_FILES["bird_image"]["name"];
                        $tmpname=$_FILES["bird_image"]["tmp_name"];
                        $folder="./uploads/".$bird;
                        $query="UPDATE image set name='$name',scientific_name='$scientific_name',color='$color',weight='$weight',alive='$alive',found='$found',bird='$bird'WHERE id='$id'";
                        mysqli_query($conn,$query);
                        if(move_uploaded_file($tmpname,$folder)){
                            echo '<script>alert("Registration Successfully Completed ")</script>';
                            $message = "Record Modified Successfully";
                        }
                        else
                        {
                            echo '<script>alert("Problem Ase Boss")</script>';
                        }
                    
                    }
		
                    $sql = "SELECT * FROM image WHERE id='" . $_GET['id'] . "'";
                    $res = mysqli_query($conn,  $sql);
                    $image = mysqli_fetch_assoc($res);
    ?>
    <div class=" flex flex-col mx-auto max-w-sm">
            <div class=" items-center justify-center px-2">
                <div class="bg-white px-6 py-8 rounded shadow-md text-black ">
                    <h1 class="mb-8 text-3xl text-center text-green-600">Update Bird Details</h1>
                    <div class="mb-8 text-center text-yellow-500 text-2xl">
                        <?php if(isset($message)) { echo $message; } ?>
                    </div>
                    <form action=""method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" class="txtField" value="<?php echo $image['id']; ?>">
                        <input type="text" value="<?php echo $image['name']; ?>" class="block border w-full p-3 rounded mb-4"name="name"placeholder="Full Name" required />
                        <input type="text" value="<?php echo $image['scientific_name']; ?>" class="block border w-full p-3 rounded mb-4"name="scientific_name"placeholder="Scientific Name" required />
                        <input type="text" value="<?php echo $image['color']; ?>" class="block border w-full p-3 rounded mb-4"name="color"placeholder="Color" required />
                        <input type="text" value="<?php echo $image['weight']; ?>" class="block border w-full p-3 rounded mb-4"name="weight"placeholder="Weight" required />
                        <input type="text" value="<?php echo $image['alive']; ?>" class="block border w-full p-3 rounded mb-4"name="alive"placeholder="Alive" required />
                        <input type="text" value="<?php echo $image['found']; ?>" class="block border w-full p-3 rounded mb-4"name="found"placeholder="Found" required />
                        <input type="file" class="block border w-full p-3 rounded mb-4"name="bird_image" required />
                        <button type="submit"class="bg-black w-full text-center py-3 rounded bg-green text-white hover:bg-green-dark focus:outline-none my-1"name="submit_button">Update Bird</button>
                    </form>
                </div>
            </div>
        </div>
  </body>
</html>