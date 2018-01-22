<script type="text/javascript">
        jQuery(document).ready(function($) {
            var $filter = $('.top');
            var $filterSpacer = $('<div />', {
                "class": "vnkings-spacer",
                "height": $filter.outerHeight()
            });
            if ($filter.size())
            {
                $(window).scroll(function ()
                {
                    if (!$filter.hasClass('fix') && $(window).scrollTop() > $filter.offset().top)
                    {
                        $filter.before($filterSpacer);
                        $filter.addClass("fix");
                    }
                    else if ($filter.hasClass('fix')  && $(window).scrollTop() < $filterSpacer.offset().top)
                    {
                        $filter.removeClass("fix");
                        $filterSpacer.remove();
                    }
                });
            }
 
        });
    </script>     
<div class='top'>
    <div class="logo"><img src="public/img/logo-1.jpg" width="95%"></div>
    <div class='top-company'>
          <h4>CÔNG TY TNHH THƯƠNG MẠI VÀ DỊCH VỤ THIẾT BỊ Y TẾ ÁNH NGỌC</h4>
          <p>ANHNGOC MEDICAL EQUIPMENT TRADING AND SERVICES CO, LTD</p>
    </div>
    <div class='top-lang'>
          <a href='index.html' title='Tiếng Việt'><img src='public/img/icon-vi.jpg' alt='Tiếng Việt' /></a>
          <a href='l/en' title='English'><img src='public/img/icon-en.png' alt='English' /></a> 
    </div>

  	<div class = 'top-tk'>
      <div class="top-timkiem">
        <form method='get' action='index.php'>
              <input type='submit' name='seach' value=''/>
              <input type='text' name= 'text_seach' placeholder = '&nbsp;&nbsp;Tìm kiếm sản phẩm !'/>        
        </form>
      </div>
      <div class='top-hotline'></div>
   </div>  
</div>