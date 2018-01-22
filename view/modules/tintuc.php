<style>
.news-demo {
  background: #fff;
  padding: 20px;
}

.news-demo h1 {
  text-align: center;
  font-family: Arial, sans-serif;
  color: #777;
  margin-bottom: 40px;
}

.news-demo .p {
  text-align: center;
  font-family: Arial, sans-serif;
  font-size: 22px;
  margin-top: 70px;
}

.news-demo .p ~ p {
  margin-top: 0;
}

.news-demo .p a {
  text-decoration: underline;
}

.news-demo .p a:hover {
  color: red;
}
</style>
<link rel="stylesheet" href="public/css/free-simple-slider.css?v=1.0">
<div class="news-demo">
  <div class="news-holder cf">

    <ul class="news-headlines">
      <li class="selected">
        <?php // chọn ra 1 silde tin đầu tiên khác giới thiệu
        $rows0 = mysqli_fetch_array($tin0);
          echo $rows0['tieude'];
        ?>
      </li>
      <?php // lấy ra các bản tin còn lại
        while ($rows = mysqli_fetch_array($tin)) { 
      ?>
      
      <li><?php echo $rows['tieude']?></li>
      <?php
      }
      ?>
    </ul>

    <div class="news-preview">
      <div class="news-content top-content">
        <img src="admin-vm2017/<?php echo $rows0['img']; ?>">
        <p><a href="#"><?php echo $rows0['tieude']; ?></a></p>
        <p><?php echo $rows0['tomtat']; ?></p>
      </div>

       <?php // lấy ra dịch vụ còn lại khác giới thiệu
        while ($rows5 = mysqli_fetch_array($tin5)) {
      ?>
      <div class="news-content top-content">
        <img src="admin-vm2017/<?php echo $rows5['img']; ?>">
        <p><a href="#"><?php echo $rows5['tieude']; ?></a></p>

        <p><?php echo $rows5['tomtat']; ?></p>
      </div>
      <?php
        }
      ?>
      

    </div><!-- .news-preview -->

  </div><!-- .news-holder -->


  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="public/js/vertical.news.slider.min.js"></script>
  <script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-1965499-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
</div>