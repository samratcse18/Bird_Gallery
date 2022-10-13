<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="output.css">
	<title>Gallery</title>
</head>
<body class="bg-blue-600">
<div class="text-end">
    <a href="index.php"><button class="bg-cyan-500 shadow-lg shadow-cyan-900/100 text-white py-4 px-2 mx-4 w-32  my-5 rounded-lg hover:bg-purple-700 active:bg-purple-900 focus:outline-yellow-500 focus:bg-black">Home</button></a>
    </div>
	<div class="flex flex-wrap justify-center items-center">
     <?php 
	 	  $conn=mysqli_connect("localhost","root","","bird_house");
          $sql = "SELECT * FROM image ORDER BY id ASC";
          $res = mysqli_query($conn,  $sql);
          if (mysqli_num_rows($res) > 0) {
          	while ($image = mysqli_fetch_assoc($res)) {  ?>
		<div class="flex mx-auto  justify-between">
			<div class="my-2 max-w-sm w-full bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
				<a href="view.php?id=<?php echo $image["id"]; ?>">
					<img class="p-8 rounded-t-lg" src="uploads/<?=$image['bird']?>" alt="product image">
				</a>
				<div class="px-5 pb-5 text-center">
						<h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-yellow-400"><?php echo $image['name'];?></h5>
				</div>
			</div>
       </div>		
    <?php 
	} }?>
	</div>
</body>
</html>