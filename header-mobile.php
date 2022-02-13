<div class="overbg-mobile"></div>
<div id="mobile-nav">
   <div class="close-menu"><i class="fas fa-times"></i></div> 
  <div id="mobile-menu">    
    <ul>
          <li><a class="<?php if ($view=='home') {echo 'current-menu-item';} ?>" href="index.php">Trang chủ</a></li>
          <li><a class="<?php if ($view=='about') {echo 'current-menu-item';} ?>" href="?view=about">Giới thiệu</a></li>
          <li class="menu-item-has-children">
            <a class="<?php if ($status=='news' && $view=='product_cat') {echo 'current-menu-item';} ?>" href="?view=product_cat&status=news">Bán xe mới</a>
            <ul class="sub-menu">
              <?php
                $dt->select("SELECT * FROM product_cat ORDER BY id desc");
                while ($row=$dt->fetch()) {
                ?>
                <li><a class="<?php if ($view=='product_cat' && $cat==$row['id']) {echo 'current-menu-item';} ?>" href="?view=product_cat&cat=<?php echo $row['id'] ?>&status=news"><?php echo $row['name_dongxe'] ?></a></li>
                <?php
              }?>
            </ul>
          </li>
          <li class="menu-item-has-children">
            <a class="<?php if ($status=='old' && $view=='product_cat') {echo 'current-menu-item';} ?>" href="?view=product_cat&status=old">Bán xe cũ</a>
            <ul class="sub-menu">
              <?php
                $dt->select("SELECT * FROM product_cat ORDER BY id desc");
                while ($row=$dt->fetch()) {
                ?>
                <li><a class="<?php if ( $view=='product_cat' && $cat==$row['id']) {echo 'current-menu-item';} ?>" href="?view=product_cat&cat=<?php echo $row['id'] ?>&status=old"><?php echo $row['name_dongxe'] ?></a></li>
                <?php
              }?>
            </ul>
          </li>
          <li><a class="<?php if ($view=='contact') {echo 'current-menu-item';} ?>" href="?view=contact">Liên hệ</a></li>
          <li><a class="<?php if ($view=='category') {echo 'current-menu-item';} ?>" href="?view=category">Tin tức</a></li>
          <?php
            $dt->select("SELECT * FROM social");
            $row=$dt->fetch();
          ?>
          <li><a href="tel:<?php echo $row['hotline']; ?>"><i class="fas fa-phone-square"></i> <?php echo $row['hotline']; ?></a></li>
        </ul>
  </div>
</div>
<script>
  jQuery(function($){ 
    
    $('#menu-mobile-toggle-btn').click(function(){
      $('#mobile-menu').slideToggle('fast');
    });
    $('#mobile-menu li.menu-item-has-children').click(function(event){
      event.stopPropagation();
      $(this).find('> .sub-menu').slideToggle('fast');
    });
    $('#mobile-menu a').click(function(event){
      event.stopPropagation();
    });
  });
</script>