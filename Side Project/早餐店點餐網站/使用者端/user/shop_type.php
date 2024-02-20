<?php
	$choose_type="";
	if(isset($choose_type))
	{
		$choose_type=$_POST["choose_type"];
		switch ($choose_type) 
		{
			case '全部':
				$type="全部";
				header("location:shop.php?type=$type");
				break;
			
			case '漢堡':
				$type="漢堡";
				header("location:shop.php?type=$type");
				break;

			case '炸物':
				$type="炸物";
				header("location:shop.php?type=$type");
				break;

			case '飲料':
				$type="飲料";
				header("location:shop.php?type=$type");
				break;
		}
	}
?>
<a href="shop.php">回商店</a>