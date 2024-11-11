<?php

	$amount = 1000; 
	$vatRate = 15;  
	$vatAmount = ($amount * $vatRate) / 100;
	$totalAmount = $amount + $vatAmount;

		echo "Amount: $" . number_format($amount, 2) . "<br>";

		echo "VAT Rate: " . $vatRate . "%<br>";

		echo "VAT Amount: $" . number_format($vatAmount, 2) . "<br>";

		echo "Total Amount (including VAT): $" . number_format($totalAmount, 2) . "<br>";
?>


