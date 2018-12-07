<html>
	<head> <title>Master</title> </head>
	  
	<body style="margin:0;padding:0;">
			<div style="width:100%;height:100%;background-color:cyan;">
					
				<div style="padding-top:100px;">
					<div style="width:80%;height:80%;background-color:white;margin:auto;text-align:center;">
					
						<h1>MASTER</h1> 
						<BR>
						<h1>Insert</h1> 
						<BR>
						<table border="2px" style="margin:auto;">
							<tr>
							
								
									<th>id</th>
									<th>nama</th>
									<th>jenis</th>
									<th>gambar</th>
									<th>harga</th>
								
							</tr>
							<tr>
								<td>1
								</td>
								<td>adfg</td>
								<td>tfgfgh</td>
							</tr>
						</table>
						
						
						<h3>Nama  :  <input type="text" value="" class="namatxt"/></h3>
						<h3>Jenis : 
									<input type="radio" value="makanan" name="jenis">makanan</input> <input type="radio" value="minuman" name="jenis">minuman</input> 
									</h3>
						<h3>Harga :  <input type="text" value="" class="hargatxt"/></h3>
						
						<h3>Gambar : <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg"> </h3>

						<input type="button" value="UPDATE" class="addbtn" style="width:120px;height:50px;font-size:18pt;margin-top:50px;"> <BR>
					</div>
				</div>
			</div>
	
			<!--
				Preview image 
				HTML : 
						<input type='file' onchange="readURL(this);" />
						<img id="blah" src="http://placehold.it/180" alt="your image" />
			
				Javascript :  
			function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
			}
			
				CSS : 
						img{
								max-width:180px;
							}
						input[type=file]{
						padding:10px;
						background:#2d2d2d;}
			
			-->
	</body>
</html>