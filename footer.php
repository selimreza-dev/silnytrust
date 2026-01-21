   <!-- Footer Area -->
   <footer>
       <section id="scroll-top">
           <div class="max-w-full px-5 md:max-w-7xl mx-auto relative">
               <div id="scroll-top-btn" class=" fixed secondary-color-bg  cursor-pointer transition-all p-2.5 rounded-full hidden z-50">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 font-bold light-color-text">
                       <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 18.75 7.5-7.5 7.5 7.5" />
                       <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 7.5-7.5 7.5 7.5" />
                   </svg>

               </div>
           </div>
       </section>
       <section id="footer-main-area" class="secondary-color-bg">
           <div class="max-w-full px-5 md:max-w-7xl mx-auto flex flex-col md:flex-row gap-5 py-10">
               <div class="footer-one w-12/12 md:w-4/12">
                   <?php dynamic_sidebar('footer-one') ?>
               </div>
               <div class="footer-two w-12/12 md:w-4/12">
                   <?php dynamic_sidebar('footer-two') ?>
               </div>
               <div class="footer-three w-12/12 md:w-4/12">
                   <?php dynamic_sidebar('footer-three') ?>
               </div>
           </div>
       </section>
       <section id="copyright-area" class="secondary-color-bg ">
           <div class="max-w-full px-5 md:max-w-7xl mx-auto">
               <p class="text-center py-5 light-color-text  text-[14px] uppercase"> © Copyright <?php
                                                                                                date_default_timezone_set('Asia/Dhaka');
                                                                                                echo date('Y');
                                                                                                ?>
                   | <?php echo get_theme_mod('silnytrust_footer_copyright_setting'); ?>
               </p>
           </div>
       </section>
   </footer>

   <?php wp_footer(); ?>
   </body>

   </html>