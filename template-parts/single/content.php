<?php
  // variables
  $theme = get_template_directory_uri();
?>
          <!-- Single -->
          <section class="np" id="post-<?php the_ID(); ?>" <?php post_class('single-standard'); ?>>

            <div class="single-post-header">
              <div class="feature-image"
                style="background-image: url('<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } else { echo get_template_directory_uri() . '/images/theme/default-image.png';  } ?>')">
              </div>
              <div class="feature-content">
              
                <?php 
                  $categories = get_the_category();
                  $separator = ' ';
                  $output = '';
                  if ( ! empty( $categories ) ) {
                      foreach( $categories as $category ) {
                          $output .= '<span class="category"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'Tüm Gönderileri Gör %s', 'hakki' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a></span>' . $separator;
                      }
                      echo trim( $output, $separator );
                  }

                  edit_post_link( __( 'edit', 'textdomain' ), '<span class="category"><p>', '</p></span>', null, 'post-edit-link' );
                ?>
                <h1><?php the_title(); ?></h1>
                <span class="desc"> <?php the_excerpt(); ?> </span>
              </div>
            </div>
            <div class="single-post-details">

              <div class="post-details-alt">
                <img src="<?=$theme?>/images/me.jpg" alt="Me">
                <div>
                  <span class="author-name">Hakkı Cengiz</span>
                  <span class="readtime">☙ 1 dk okuma süresi</span> <br>
                  <span class="date">☙ <?php echo get_the_date( 'd M Y', $post->ID ); ?></span> <span class="okunma">☙ 
                  <?php if(function_exists('the_views')) {the_views();} ?></span>
                </div>
              </div>

              <div class='nav'>
                <div class='text-options'>
                  <i class='zmdi zmdi-font trigger'></i>
                  <div class='dropdown'>
                    <ul>
                      <li>
                        <ul class='font'>
                          <li>
                            <div class='font-wrapper pt-serif'>
                              Aa
                            </div>
                          </li>
                          <li>
                            <div class='font-wrapper crimson-text'>
                              Aa
                            </div>
                          </li>
                          <li>
                            <div class='font-wrapper source-sans-pro'>
                              Aa
                            </div>
                          </li>
                          <li>
                            <div class='font-wrapper lato'>
                              Aa
                            </div>
                          </li>
                        </ul>
                        <hr>
                        <ul class='font-size'>
                          <li>
                            <div class='size-wrapper'>
                              <i class='zmdi zmdi-format-size size-big'></i>
                            </div>
                          </li>
                          <li>
                            <div class='size-wrapper'>
                              <i class='zmdi zmdi-format-size size-medium'></i>
                            </div>
                          </li>
                          <li>
                            <div class='size-wrapper'>
                              <i class='zmdi zmdi-format-size size-small'></i>
                            </div>
                          </li>
                          <li>
                            <div class='size-wrapper'>
                              <i class='zmdi zmdi-format-size size-smaller'></i>
                            </div>
                          </li>
                        </ul>
                        <hr>
                        <ul class='margin-size'>
                          <li>
                            <div class='margin-wrapper'>
                              <i class='zmdi zmdi-format-align-justify margin-smaller'></i>
                            </div>
                          </li>
                          <li>
                            <div class='margin-wrapper'>
                              <i class='zmdi zmdi-format-align-justify margin-small'></i>
                            </div>
                          </li>
                          <li>
                            <div class='margin-wrapper'>
                              <i class='zmdi zmdi-format-align-justify margin-medium'></i>
                            </div>
                          </li>
                          <li>
                            <div class='margin-wrapper'>
                              <i class='zmdi zmdi-format-align-justify margin-big'></i>
                            </div>
                          </li>
                        </ul>
                        <hr>
                        <ul class='font-color'>
                          <li>
                            <div class='circle-wrapper'>
                              <div class='circle white'></div>
                            </div>
                          </li>
                          <li>
                            <div class='circle-wrapper'>
                              <div class='circle dark'></div>
                            </div>
                          </li>
                          <li>
                            <div class='circle-wrapper'>
                              <div class='circle sepia'></div>
                            </div>
                          </li>
                          <li>
                            <div class='circle-wrapper'>
                              <div class='circle blue'></div>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <div class='margin margin-small'></div>
                  <div class='margin margin-medium'></div>
                  <div class='margin margin-big'></div>
                </div>
              </div>

            </div>
            <div class="single-content p">


              <div class='text'>
                <div class='text-wrapper'>
                  
                  <?php the_content(); ?>

                </div>
              </div>

              <div class="tagcloud">
                <?php the_tags(); ?>
                <span>Paylaş:</span>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="12"
                    viewBox="0 0 10 20" version="1.1" fill="currentColor">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-385.000000, -7399.000000)" fill="currentColor">
                        <g transform="translate(56.000000, 160.000000)">
                          <path
                            d="M335.821282,7259 L335.821282,7250 L338.553693,7250 L339,7246 L335.821282,7246 L335.821282,7244.052 C335.821282,7243.022 335.847593,7242 337.286884,7242 L338.744689,7242 L338.744689,7239.14 C338.744689,7239.097 337.492497,7239 336.225687,7239 C333.580004,7239 331.923407,7240.657 331.923407,7243.7 L331.923407,7246 L329,7246 L329,7250 L331.923407,7250 L331.923407,7259 L335.821282,7259 Z">
                          </path>
                        </g>
                      </g>
                    </g>
                  </svg>
                </a>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="12"
                    viewBox="0 0 20 16" version="1.1" fill="currentColor">
                    <g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                      <g transform="translate(-60.000000, -7521.000000)" fill="currentColor">
                        <g transform="translate(56.000000, 160.000000)">
                          <path
                            d="M10.29,7377 C17.837,7377 21.965,7370.84365 21.965,7365.50546 C21.965,7365.33021 21.965,7365.15595 21.953,7364.98267 C22.756,7364.41163 23.449,7363.70276 24,7362.8915 C23.252,7363.21837 22.457,7363.433 21.644,7363.52751 C22.5,7363.02244 23.141,7362.2289 23.448,7361.2926 C22.642,7361.76321 21.761,7362.095 20.842,7362.27321 C19.288,7360.64674 16.689,7360.56798 15.036,7362.09796 C13.971,7363.08447 13.518,7364.55538 13.849,7365.95835 C10.55,7365.79492 7.476,7364.261 5.392,7361.73762 C4.303,7363.58363 4.86,7365.94457 6.663,7367.12996 C6.01,7367.11125 5.371,7366.93797 4.8,7366.62489 L4.8,7366.67608 C4.801,7368.5989 6.178,7370.2549 8.092,7370.63591 C7.488,7370.79836 6.854,7370.82199 6.24,7370.70483 C6.777,7372.35099 8.318,7373.47829 10.073,7373.51078 C8.62,7374.63513 6.825,7375.24554 4.977,7375.24358 C4.651,7375.24259 4.325,7375.22388 4,7375.18549 C5.877,7376.37088 8.06,7377 10.29,7376.99705">
                          </path>
                        </g>
                      </g>
                    </g>
                  </svg>
                </a>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 48"
                    version="1.1" height="12">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-388.000000, -391.000000)" fill="currentColor">
                        <path
                          d="M411.993033,391 L411.993033,391.000398 L412.006967,391.000398 C425.237748,391.000398 436,401.765685 436,415.000199 C436,428.234315 425.237748,439 412.006967,439 C407.126434,439 402.598605,437.546975 398.804449,435.035539 L389.579605,437.983798 L392.570026,429.066947 C389.692661,425.116025 388,420.248451 388,414.999801 C388,401.765287 398.762252,391 411.993033,391 Z M405.29285,403.190836 C404.827488,402.07628 404.474784,402.034071 403.769774,402.005401 C403.529728,401.991464 403.262214,401.977527 402.96564,401.977527 C402.04845,401.977527 401.089462,402.245514 400.511043,402.838033 C399.806033,403.557577 398.056843,405.23638 398.056843,408.679202 C398.056843,412.122023 400.567571,415.451756 400.905944,415.917648 C401.258648,416.382743 405.800808,423.55031 412.853297,426.471492 C418.368379,428.757149 420.00491,428.545307 421.260074,428.27732 C423.093658,427.882308 425.393002,426.527239 425.971421,424.891043 C426.54984,423.25405 426.54984,421.857171 426.380255,421.560912 C426.211068,421.264652 425.745308,421.095816 425.040298,420.742615 C424.335288,420.389811 420.90737,418.696673 420.25849,418.470894 C419.623543,418.231179 419.017259,418.315995 418.537963,418.99333 C417.860819,419.938653 417.198006,420.89831 416.661785,421.476494 C416.238619,421.928051 415.547144,421.984595 414.969123,421.744481 C414.193254,421.420348 412.021298,420.657798 409.340985,418.273388 C407.267356,416.42535 405.856938,414.125756 405.448104,413.434484 C405.038871,412.729275 405.405907,412.319529 405.729948,411.938852 C406.082653,411.501232 406.421026,411.191036 406.77373,410.781688 C407.126434,410.372738 407.323884,410.160897 407.549599,409.681068 C407.789645,409.215575 407.62006,408.735746 407.450874,408.382942 C407.281687,408.030139 405.871269,404.587317 405.29285,403.190836 Z">
                        </path>
                      </g>
                    </g>
                  </svg>
                </a>
                <a href="#">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                    y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" height="12"
                    fill="currentColor">
                    <path d="M384,362.7H128V384h256V362.7z M106.7,21.3h192V128h106.7v42.7h21.3v-64L320,0H85.3v170.7h21.3V21.3z M448,192H64
                      c-42.7,0-64,21.3-64,64v128h85.3v128h341.3V384H512V256C512,213.3,490.7,192,448,192z M85.3,277.3H42.7v-42.7h42.7V277.3z
                      M405.3,490.7H106.7V341.3h298.7V490.7z M384,405.3H128v21.3h256V405.3z M384,448H128v21.3h256V448z">
                    </path>
                  </svg>
                </a>
                <a href="#" onclick="window.print();return false;">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" height="12" fill="currentColor">
                  <path d="M384,362.7H128V384h256V362.7z M106.7,21.3h192V128h106.7v42.7h21.3v-64L320,0H85.3v170.7h21.3V21.3z M448,192H64
                  c-42.7,0-64,21.3-64,64v128h85.3v128h341.3V384H512V256C512,213.3,490.7,192,448,192z M85.3,277.3H42.7v-42.7h42.7V277.3z
                  M405.3,490.7H106.7V341.3h298.7V490.7z M384,405.3H128v21.3h256V405.3z M384,448H128v21.3h256V448z">
                  </path>
                </svg>
              </a>
              </div>

            </div>
          </section>