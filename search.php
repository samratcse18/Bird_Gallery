<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="output.css">
	<title>Search</title>
</head>
<body class="bg-[url(image/bg.jpg)] bg-cover bg-center ">
    <div class="flex justify-end mx-auto">
    <a href="index.php"><button class="bg-cyan-500 shadow-lg shadow-cyan-900/100 text-white py-4 px-2 mx-4 w-32  my-5 rounded-lg hover:bg-purple-700 active:bg-purple-900 focus:outline-yellow-500 focus:bg-black">Home</button></a>
    </div>
	<div class="flex flex-wrap justify-center items-center">
     <?php 
	 	            $conn=mysqli_connect("localhost","root","","bird_house");
                    if(count($_POST)>0) {
                    $name=$_POST['name'];
                    $result = mysqli_query($conn,"SELECT * FROM image where name='$name' ");
                    while($image = mysqli_fetch_array($result)) {  ?>
		<div class="flex mx-auto  justify-between">
			<div class="my-2 w-full bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
					<img class="p-8 rounded-t-lg" src="uploads/<?=$image['bird']?>" alt="product image">
				<div class="px-5 pb-5 text-center flex justify-between">
						<h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Name: <?php echo $image['name'];?></h5>
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Scientific Name: <?php echo $image['scientific_name'];?></h5>
				</div>
                <div class="px-5 pb-5 text-center flex justify-between">
						<h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Color: <?php echo $image['color'];?></h5>
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Weight: <?php echo $image['weight'];?></h5>
				</div>
                <div class="px-5 pb-5 text-center flex justify-between">
						<h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Alive: <?php echo $image['alive'];?></h5>
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Found: <?php echo $image['found'];?></h5>
				</div>
			</div>
       </div>		
    <?php 
	} }?>
	</div>
</body>
</html>