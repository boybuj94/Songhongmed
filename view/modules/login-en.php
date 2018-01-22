<div class="login">
	<table style="padding-bottom:30px;border-bottom:1px dashed #0099ff;">
    <caption style="padding-top:30px; ">LOGIN</caption>
    	<form action="admin-vm2017/model/m_us.php" method="post" name="dangky">
        	<tr>
            	<td>Account: </td>
                <td><input type="text" name="taikhoan" placeholder ="&nbsp;Email or Phone"/></td>
            </tr>
            <tr>
            	<td>Password: </td>
                <td><input type="password" name="matkhau" placeholder ="&nbsp;Password"/></td>
            </tr>
            <tr>
            	<td><a href="">Forgot password?</a></td>
                <td><input type="submit" name="login" value="Login" /></td>
            </tr>
            
        </form>
    </table>
    
    <table style="padding-top:10px; ">
    <p style="padding-top:5px;text-align:center; font-size:12px; color:#999;">If you do not already have an account</p>
    <caption style="padding-top:10px; ">REGISTER</caption>
    	 <form action="admin-vm2017/model/m_us.php" method="get" name='dangky'>
        	<tr>
            	<td>Email: </td>
                <td><input type="text" name="email" placeholder ="&nbsp;Email"/></td>
            </tr>
            <tr>
            	<td>Phone: </td>
                <td><input type="text" name="sdt" placeholder ="&nbsp;Phone"/></td>
            </tr>
            <tr>
            	<td>Full name: </td>
                <td><input type="text" name="ten" placeholder ="&nbsp;Full name"/></td>
            </tr>
            <tr>
            	<td>Password: </td>
                <td><input type="password" name="pass" placeholder ="&nbsp;Password"/></td>
            </tr>
            <tr>
            	<td>Enter the password: </td>
                <td><input type="password" name="repass" placeholder ="&nbsp;Enter the password"/></td>
            </tr>
            <tr>
            	<td><input type="checkbox" name="dieukhoan" value="Đồng ý" /><a href="">&nbsp;Agree to terms of service?</a></td>
                <td></td>
            </tr>
<!--            <tr>
            	<td colspan ="2"><div class="g-recaptcha" data-sitekey="6LfQYh4UAAAAAMuhP1uht1pvLntIKzEMDqOPi4Xy"></div></td>
                
            </tr>-->
            <tr>
            	<td></td>
                <td><input type="submit" name="add" value="Register" /></td>
            </tr>
        </form>
    </table>
</div>