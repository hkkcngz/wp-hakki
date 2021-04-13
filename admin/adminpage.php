<?php

	$categories = get_categories('hide_empty=0&orderby=name');
	$wp_cats = array();
	foreach ($categories as $category_list ) {
		$wp_cats[$category_list->cat_ID] = $category_list->cat_name;
	}
	array_unshift($wp_cats, "Select Category"); 

$themename = "hakki";
$shortname = "hc";

$options = array (
 
	array( "name" => $themename." Options",
		"type" => "title"),
	
	array( "name" => "Links",
		"type" => "section"),
	array( "type" => "open"),

	array( "name" => "My Menu - Blog",
		"desc" => "If you want to change Logo text here.",
		"id" => $shortname."_my_menu01",
		"type" => "text",
		"std" => "/blog"),
	array( "name" => "My Menu - Shop",
		"desc" => "If you want to change Logo text here.",
		"id" => $shortname."_my_menu02",
		"type" => "text",
		"std" => "/shop"),

	array( "name" => "My Menu - Culture",
		"desc" => "If you want to change Logo text here.",
		"id" => $shortname."_my_menu03",
		"type" => "text",
		"std" => "/culture"),

	array( "name" => "My Menu - Lab",
		"desc" => "If you want to change Logo text here.",
		"id" => $shortname."_my_menu04",
		"type" => "text",
		"std" => "/labs"),


	array( "type" => "close")

);

function hakki_add_admin() {
 
	global $themename, $shortname, $options;
	
	if ( $_GET['page'] == basename(__FILE__) ) {
	
		if ( 'save' == $_REQUEST['action'] ) {
	
			foreach ($options as $value) {
				update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
			}
	
			foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
				} else { 
					delete_option( $value['id'] ); 
				} 
			}
	
			header("Location: admin.php?page=adminpage.php&saved=true");
		} else if( 'reset' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				delete_option( $value['id'] ); 
			}
			header("Location: admin.php?page=adminpage.php&reset=true");
		}
	}
	add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'hakki_admin');
}

function hakki_admin() {
	global 	$themename, 
			$shortname, 
			$options;
	$i=0;
?>

	<div class="demo-page-wrapper">
		<div class="demo-page">
			<div class="demo-page-navigation">
				<nav>
				<ul>
					<li>
						<a href="#">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512">
						<path d="M506.555,208.064L263.859,30.367c-4.68-3.426-11.038-3.426-15.716,0L5.445,208.064
							c-5.928,4.341-7.216,12.665-2.875,18.593s12.666,7.214,18.593,2.875L256,57.588l234.837,171.943c2.368,1.735,5.12,2.57,7.848,2.57
							c4.096,0,8.138-1.885,10.744-5.445C513.771,220.729,512.483,212.405,506.555,208.064z" />
						<path d="M442.246,232.543c-7.346,0-13.303,5.956-13.303,13.303v211.749H322.521V342.009c0-36.68-29.842-66.52-66.52-66.52
							s-66.52,29.842-66.52,66.52v115.587H83.058V245.847c0-7.347-5.957-13.303-13.303-13.303s-13.303,5.956-13.303,13.303v225.053
							c0,7.347,5.957,13.303,13.303,13.303h133.029c6.996,0,12.721-5.405,13.251-12.267c0.032-0.311,0.052-0.651,0.052-1.036v-128.89
							c0-22.009,17.905-39.914,39.914-39.914s39.914,17.906,39.914,39.914v128.89c0,0.383,0.02,0.717,0.052,1.024
							c0.524,6.867,6.251,12.279,13.251,12.279h133.029c7.347,0,13.303-5.956,13.303-13.303V245.847
							C455.549,238.499,449.593,232.543,442.246,232.543z" />
						</svg>
						About Theme</a>
					</li>
					<li>
					<a href="#installation">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool">
						<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
						</svg>
						Installation</a>
					</li>
					<li>
					<a href="#structure">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
						<polygon points="12 2 2 7 12 12 22 7 12 2" />
						<polyline points="2 17 12 22 22 17" />
						<polyline points="2 12 12 17 22 12" />
						</svg>
						Structure</a>
					</li>
					<li>
					<a href="#input-types">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify">
						<line x1="21" y1="10" x2="3" y2="10" />
						<line x1="21" y1="6" x2="3" y2="6" />
						<line x1="21" y1="14" x2="3" y2="14" />
						<line x1="21" y1="18" x2="3" y2="18" />
						</svg>
						Navigation Menu</a>
					</li>
					<li>
					<a href="#contribute">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
						<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22" />
						</svg>
						Contribute</a>
					</li>
				</ul>
				</nav>
			</div>
			<main class="demo-page-content">
				<section>
					<div class="href-target" id="intro"></div>
					<h1 class="package-name"><?php echo $themename; ?> boilerplate</h1>
					<p>
						One theme to rule them all 😄 Then you can use that copy-paste :P That's why I created
						<strong>hakki boilerplate</strong> to help devs who want to hit the
						ground running, but don't want to stare at default input fields when
						doing so 💩
					</p>
					<strong>In a nutshell:</strong>
					<ul>
						<li>It provides a sensible input styling 'reset'</li>
						<li>Get nice looking forms with zero effort</li>
						<li>Easily customizable with css-variables</li>
						<li>
						Perfect for rapid prototyping or tweak it and make it your own.
						</li>
						<li>No hacks or unnecessary elements, pure semantics</li>
					</ul>
				</section>

				<section>
					<div class="href-target" id="installation"></div>
					<h1>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool">
						<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
						</svg>
						Installation
					</h1>
					<p>
						Import my-works.css from <strong>unpkg</strong>
						<br />
						<code>https://unpkg.com/</code>
					</p>
					<p>
						Install via <strong>NPM</strong>
						<br />
						<code> npm install .. </code>
					</p>
				</section>

				<section>
					<div class="href-target" id="structure"></div>
					<h1>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
						<polygon points="12 2 2 7 12 12 22 7 12 2" />
						<polyline points="2 17 12 22 22 17" />
						<polyline points="2 12 12 17 22 12" />
						</svg>
						Structure
					</h1>
					<p>
						All you need to do is add the class <code>.nice-form-group</code> to
						get a nice base style for all your input fields. Add a
						<code>small</code> element for additional information, this can be
						below the label or below the field.
					</p>

					<div class="dropping righten">
						<label class="dropping-opener" for="dropping00"><i class="fas fa-user"></i></label>

						<input type="checkbox" id="dropping00" name="dropping" class="dropping-input" />
						<div class="dropping-menu">
						<ul>
							<li>
							<span>Login</span>
							</li>
							<li>
							<span>Register</span>
							</li>
						</ul>
						</div>
					</div>

					<div class="dropping leften">
						<label class="dropping-opener" for="dropping03"><i class="fas fa-user"></i></label>

						<input type="checkbox" id="dropping03" name="dropping" class="dropping-input" />
						<div class="dropping-menu">
						<ul>
							<li>
							<span>Login</span>
							</li>
							<li>
							<span>Register</span>
							</li>
						</ul>
						</div>
					</div>

					<details>
						<summary>
						<div class="toggle-code">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
							<polyline points="16 18 22 12 16 6" />
							<polyline points="8 6 2 12 8 18" />
							</svg>
							Toggle code
						</div>
						</summary>
						<script src="https://gist.github.com/nielsVoogt/a00c2c8b6b7acfacce6d50926379e722.js"></script>
					</details>
				</section>

				<section>
					<div class="href-target" id="input-types"></div>
					<h1>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify">
						<line x1="21" y1="10" x2="3" y2="10" />
						<line x1="21" y1="6" x2="3" y2="6" />
						<line x1="21" y1="14" x2="3" y2="14" />
						<line x1="21" y1="18" x2="3" y2="18" />
						</svg>
						Navigation Menu
					</h1>

					<form method="post">
						
						<?php foreach ($options as $value) {
							switch ( $value['type'] ) {
								
								case "open":
									break;
								
								case "close":
									echo '<hr />';
									break;

								case "title":
									echo "<p>$themename tema yönetim paneline hoşgeldiniz.</p>";
									break;
								
								case 'text': ?>

									<div class="nice-form-group">
										<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
										<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
										<small><?php echo $value['desc']; ?></small>
									</div>

								<?php
									break;
								
								case 'textarea':
								?>

									<div class="nice-form-group hc_textarea">
										<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
										<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
										<small><?php echo $value['desc']; ?></small>
									</div>
								
								<?php
									break;

								case 'select':
								?>

									<div class="nice-form-group hc_select">
										<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

										<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
											<?php foreach ($value['options'] as $option) { ?>
												<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
										</select>

										<small><?php echo $value['desc']; ?></small>
									</div>
								<?php
									break;

								case "checkbox":
								?>

									<div class="nice-form-group hc_checkbox">
										<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
										
										<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
										<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />

										<small><?php echo $value['desc']; ?></small>
									</div>
								<?php 
									break; 
								case "section":
									$i++; ?>

										<h3>
											<?php echo $value['name']; ?>
										</h3>
									
									<?php break; 
										}
								}
						?>

						<input class="btn-submit" name="save<?php echo $i ?>" type="submit" value="Kaydet" />
						<input type="hidden" name="action" value="save" />
						
					</form>
					<form method="post">
						<br>
						<input class="btn-submit" name="reset" type="submit" value="Varsayılana Dön" />
						<input type="hidden" name="action" value="reset" />
						
					</form>

				</section>

				<section>
					<div class="href-target" id="contribute"></div>
					<h1>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
						<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22" />
						</svg>
						Contribute
					</h1>
					<p>
						If you encounter a bug on any device or have suggestions for
						improvement, don't hesitate to open a bug report or pull request.
					</p>

					<a href="https://github.com/hkkcngz" class="to-repo" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link">
						<path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
						<polyline points="15 3 21 3 21 9" />
						<line x1="10" y1="14" x2="21" y2="3" />
						</svg>
						Check out the repo
					</a>
				</section>

				<footer>Made with ♥ for hakki boilerplate theme.</footer>
			</main>
		</div>
	</div>


<?php }

function hakki_add_init() {
	$file_dir=get_bloginfo('template_directory');
	wp_enqueue_style("functions", $file_dir."/admin/assets/admin.css", false, "1.0", "all");
	wp_enqueue_script("rm_script", $file_dir."/admin/assets/admin.js", false, "1.0");
}

add_action('admin_init', 'hakki_add_init');
add_action('admin_menu', 'hakki_add_admin');
?>