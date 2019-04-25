</div>
<footer>
  <div class="container">
    <div class="bottom-footer">
      <div class="bottom-footer-inner">

        <div class="items">
          <div class="footer-header"><a href="#">Меню</a></div>
          <?php wp_nav_menu([
                'theme_location' => 'footerMenuLocationOne'
              ]); 
          ?>
        </div>

        <div class="items">
          <div class="footer-header"><a href="#">Контакты</a></div>
          <div class="menu">
            <ul>
              <li class="page_item">
                <span class="block"><i class="fas fa-phone"></i>(34643) 3-13-96</span>
              </li>
              <li class="page_item">
                <span class="block"><i class="fas fa-envelope"></i>school1megion@mail.ru</span>
              </li>
              <li class="page_item">
                <span class="block"><i class="fas fa-map-marker-alt"></i>628685, г. Мегион, ул. Свободы 6</span>
              </li>
            </ul>
          </div>
        </div>


        <div class="items map">
          <div class="footer-header"><a href="#">Адрес</a></div>
          <?php dynamic_sidebar('footer_widget_area') ?>
        </div>



      </div>
    </div>


    <div class="bottom-line">
      <div class="bottom-line-box">
        <div class="school-copy">
          <?php echo date("Y"); ?> &copy; МБОУ СОШ №1, Мегион
        </div>
        <div class="author-copy">
          Сайт сделал - <a href="https://vk.com/id147196025">Андрей Чеботарь</a>
        </div>
      </div>
    </div>
</footer>
<a href="#" class="scroll-to-top" id="scrollBtn"><i class="fas fa-arrow-up"></i></a>

<?php wp_footer();?>
</body>




</html>