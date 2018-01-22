<div class="hotro">
    <div class="hotro-check">
         <div class="duongdan">
            <span><a href="/?l=en">Home</a>&nbsp;&nbsp;/&nbsp;&nbsp;Download</span>
        </div>
    <?php
        if(isset($_REQUEST['id'])){
    ?>
            <h4><?php echo $rows['tieude'];?></h4>
            <h5><?php echo $rows['info'];?></h5>
            <img src="admin-vm2017/<?php echo $rows['img'];?>" width="70%" title="<?php echo $rows['img'];?>"/>
    <?php
        }else{
        while($rows = mysqli_fetch_array($danhmuc))
        {
    ?>
    <div class="download">
        <div class="download-img" style="background-image: url(admin-vm2017/public/img/anh/<?php echo $rows['img'];?>);"> </div>
        <!-- 
        <div class="download-title"><p>What the FAA has told us is that </p></div> -->
        <div class="download-content">
            <!-- <div class="download-info"><p>What the FAA has told us is that we would be permitted to use our ‘existing fleet’ of tow planes, for the life of those aircraft, provided that they were certificated as Experimental Light-Sport Aircraft.</p></div>-->
            <?php 
                $sql1 = "SELECT iditem FROM item WHERE iddm = '{$rows['iddm']}' AND item = '0' AND ngonngu = '1'";
                $danhmuc1 = mysqli_query($con,$sql1);
                $rows1= mysqli_fetch_array($danhmuc1);

                $sql2 = "SELECT iditem FROM item WHERE iddm = '{$rows['iddm']}' AND item = '1' AND ngonngu = '1'";
                $danhmuc2 = mysqli_query($con,$sql2);
                $rows2= mysqli_fetch_array($danhmuc2);
            ?>
            <div class="download-certificate">
                <a href="en/download/certificate-<?php echo $rows1['iditem'];?>.html"><img src="public/img/logo/certificate.png" width="70px"/></a>
                <p>Certificate</p>
            </div>
            <div class="download-catalog">
                <a href="en/download/calatog-<?php echo $rows1['iditem'];?>.html"><img src="public/img/logo/calatog.png" width="70px"/></a>
                <p>Catalog</p>
            </div>
        </div>
    </div> 

    <?php
        }
    }
    ?>    
    </div>
</div>