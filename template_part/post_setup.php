                <div class="post-wrapper overflow-hidden max-w-full">
                    <div class="post-image w-full md:w-9/12 mx-auto h-100 mb-5">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnails'); ?></a>
                    </div>
                    <div class="post-content w-full md:w-9/12 mx-auto ">
                        <div class="content-details">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>