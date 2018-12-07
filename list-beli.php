<html>
	<head> 
			<title>List Belanja</title>
	</head>

	
	
	<body> 
		<div style="width:100%;">
			<div style="background-color:4190B6;width:100%;height:100px;float:left;">
				<p style="font-family:BlackChancery;text-align:left;font-size:50pt;color:white;margin-left:20px;margin-top:5px;">Resto-Online</p>

			    
			</div>

		</div>
		
		<fieldset style="width:80%;height:200px;background-color:B6E3FF;margin:auto;text-align:center;"><legend>List</legend>
				<img src="menuayam-bakar.jpg" style="width:150px;height:100px;margin:auto;"/>
				
				<div style="width:80%;heigth:100%;text-align:left;">
					<label> Nama Makanan : Ayam bakar</label><BR>
					<label> Harga : RP 15000</label><BR>
					<label> Jumlah :</label>
					<input type="number" name="quantity" min="1" max="999">
					<input type="submit" value="Check">
				</div>
		</fieldset>
		
		<fieldset style="width:80%;height:50px;background-color:B6E3FF;margin:auto;"><legend>Checkout</legend>
				
				<label>Harga Total : Rp 15000</label> <input type="submit" value="Bayar" style="float:right;">
				
		</fieldset>
		<div style="width:100%;">
				<div style="margin-top:5px;width:100%;background-color:00518B;height:100px;float:left;text-align:center;color:white;">
					<p>&copy; 2018 - <?php echo date("Y"); ?></p>
				</div>
		</div>
	</body>
	
</html>