<div>
  <nav class="menu">
    <div class="top-menu-timkiem">
        <form method='get' action='index.php'>
              <input type='submit' name='seach' value=''/>
              <input type='text' name= 'text_seach' placeholder = '&nbsp;&nbsp;Tìm kiếm sản phẩm !'/>        
        </form>
      </div>
  <ul id="nav">
  	<a class="icon-home" href="/" title="Trang chủ" style=""><img src="public/img/icon-home.png" width="20px" style="padding-right:10px;"/></a>
  	<!-- <li><a href="index.php?manage=Introduce" title="Giới thiệu">Giới thiệu</a></li> -->
    <li><a href="products/san-pham.html" title="Thiết bị y tế">Thiết bị y tế</a></li>
    <!-- <li><a href="download.html" title="Download phần mềm">Download</a></li> -->
    <li><a href="products/san-pham.html" title="Nội thất ý tế">Nội thất ý tế</a></li>
    <li><a href="dich-vu.html" title="Công trình">Công trình</a></li>
    <li><a href="dich-vu.html" title="Dịch vụ">Dịch vụ</a></li>
    <li><a href="contact.html" title="Liên hệ">Liên hệ</a></li>
  </ul>
  <a href='#' id='pull'></a>   
</nav>
</div>
<script> $(function() {
  var pull        = $('#pull');
      menu        = $('nav ul');
      menuHeight  = menu.height();

  $(pull).on('click', function(e) {
      e.preventDefault();
      menu.slideToggle();
  });
});
$(window).resize(function(){
  var w = $(window).width();
  if(w > 780 && menu.is(':hidden')) {
      menu.removeAttr('style');
  }
});
</script>