<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="output.css">
    <title>Insert</title>
    
<body class="bg-[url(image/bg.jpg)] bg-cover">
    <div class="text-end">
    <a href="index.php"><button class="bg-cyan-500 shadow-lg shadow-cyan-900/100 text-white py-4 px-2 mx-4 w-32  my-5 rounded-lg hover:bg-purple-700 active:bg-purple-900 focus:outline-yellow-500 focus:bg-black">Home</button></a>
    </div>
    <div class=" flex flex-col mx-auto max-w-sm">
            <div class=" items-center justify-center px-2">
                <div class="bg-white px-6 py-8 rounded shadow-md text-black ">
                    <h1 class="mb-8 text-3xl text-center">Add Bird Details</h1>
                    <form action="insert.php"method="POST" enctype="multipart/form-data">
                        <input type="text"class="block border w-full p-3 rounded mb-4"name="name"placeholder="Full Name" required />
                        <input type="text"class="block border w-full p-3 rounded mb-4"name="scientific_name"placeholder="Scientific Name" required />
                        <input type="text"class="block border w-full p-3 rounded mb-4"name="color"placeholder="Color" required />
                        <input type="text"class="block border w-full p-3 rounded mb-4"name="weight"placeholder="Weight" required />
                        <input type="text"class="block border w-full p-3 rounded mb-4"name="alive"placeholder="Alive" required />
                        <input type="text"class="block border w-full p-3 rounded mb-4"name="found"placeholder="Found" required />
                        <input type="file"class="block border w-full p-3 rounded mb-4"name="bird_image" required />
                        <button type="submit"class="bg-black w-full text-center py-3 rounded bg-green text-white hover:bg-green-dark focus:outline-none my-1"name="submit_button">Add Bird</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
			if(isset($_POST['submit_button']))
			{
				$name=$_POST['name'];
                $scientific_name=$_POST['scientific_name'];
                $color=$_POST['color'];
                $weight=$_POST['weight'];
                $alive=$_POST['alive'];
				$found=$_POST['found'];
                
                $bird=$_FILES["bird_image"]["name"];
                $tmpname=$_FILES["bird_image"]["tmp_name"];
                $folder="./uploads/".$bird;
				$conn=mysqli_connect("localhost","root","","bird_house");
				$query="INSERT INTO image(name,scientific_name,color,weight,alive,found,bird) 
                VALUES('$name','$scientific_name','$color','$weight','$alive','$found','$bird')";
                mysqli_query($conn,$query);
				if(move_uploaded_file($tmpname,$folder)){
					echo '<script>alert("Registration Successfully Completed ")</script>';
				}
				else
				{
					echo '<script>alert("Problem Ase Boss")</script>';
				}
            
			}
		
		?>
  </body>
</html>