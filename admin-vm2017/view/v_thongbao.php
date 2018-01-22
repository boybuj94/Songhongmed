<?php
if ($ac == 'add'){
			echo "
			<form method='post' action='model/m_thongbao.php' enctype='multipart/form-data' name='dangky'>
				
				<table width='380px' border='0'>
				<caption><p>THÊM MỚI LOẠI SẢN PHẨM</p></caption>
					<tr>
						<td  width = '120px'><label for='ten'>cau hoi </label></td>
						<td><input class = 'text' id='ten' type='text' name = 'ten' /></td>
					</tr>
					<tr>
						<td  width = '120px'><label for='ten'>a </label></td>
						<td><input class = 'text' id='ten' type='text' name = 'a' /></td>
					</tr>
					<tr>
						<td  width = '120px'><label for='ten'>b</label></td>
						<td><input class = 'text' id='ten' type='text' name = 'b' /></td>
					</tr>
					<tr>
						<td  width = '120px'><label for='ten'>c </label></td>
						<td><input class = 'text' id='ten' type='text' name = 'c' /></td>
					</tr>
					<tr>
						<td  width = '120px'><label for='d'>d </label></td>
						<td><input class = 'text' id='ten' type='text' name = 'd' /></td>
					</tr>
					<tr>
						<td  width = '120px'><label for='ten'>dap an</label></td>
						<td><select name = 'dapan'>
									<option value=''	 ></option>
							
							</select>
						</td>
					</tr>
					<tr>
						<td>Ngôn ngữ: </td>
						<td>
							Vi_vn <input type='radio' name = 'nn' value='0' checked ='checked '/>
							&nbsp;&nbsp;&nbsp;En_en <input type='radio' name = 'nn' value='1'/>
						</td>
					</tr>
					<tr>
						<td><label id='botton'></label>
</td>
						<td><input id='submit' type='submit' name = 'add' value='Thêm'/></td>
					</tr>
				</table>
			</form>
			
				";
		}
		?>