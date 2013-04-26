<?php global $shortcode_tags; ?>
<?php $custom_post_types = installed_custom_post_types(); ?>

<div id="theme-help" class="i-am-a-fancy-admin">
	<div class="container">
		<h2>Help</h2>
		
		<?php if ($updated):?>
		<div class="updated fade"><p><strong><?=__( 'Options saved' ); ?></strong></p></div>
		<?php endif; ?>
		
		<div class="sections">
			<ul>
				<li class="section"><a href="#updating">Updating Site Content</a></li>
				<li class="section"><a href="#shortcodes">Shortcodes</a></li>
			</ul>
		</div>
		<div class="fields">
			<ul>
				<li class="section" id="updating">
					<h3>Updating Site Content</h3>
					<p>Most of your site's content can be edited by going to the 
					<a href="<?=admin_url('edit.php?post_type=page')?>">'Pages'</a> admin area and 
					selecting the page you wish to edit.  Information about people can be edited through 
					the <a href="<?=admin_url('edit.php?post_type=person')?>">'People' admin area</a>.  
					Other sections, like the home page content and the site's headers and footers, 
					are modifiable elsewhere.</p>
					
					<br/><hr /><br/>
					
					<h4>Updating the Home Page</h4>
					<p>The home page is editable through the 
					<a href="<?=admin_url('admin.php?page=theme-options')?>">Page Customization admin area</a>.
					In the 'Home page blurb' field, you can edit the large text that appears at the top of the 
					home page.  You can add shortcodes or HTML in this content if you'd like.</p>
					<p>Note:  make sure that this content always starts with </p>
					<pre style="white-space: pre-line;"><code>< p id="home-content" ></code></pre> 
					<p>and ends with </p>
					<pre><code>< /p ></code></pre><p>(no spaces between the < > brackets.)  This applies the 
					special styling to the text in the home page blurb (large green text.)</p>
					<p>The Featured Page 1, 2, and 3 refer to pages that you've published that you want to 
					display on the home page, under the large text at the top.  You can specify up to 3, 
					or you can select (none) for any of them to remove those columns.  Selecting (none) 
					for all 3 Features will hide the entire row that they appear on.</p>
					
					<br/><hr /><br/>
					
					<h4>Updating the "Below the Fold"</h4>
					<p>The Below the Fold area refers to the space just above the footer, which 
					contains a megaphone icon, a title, description, and large green button.  
					This content is modifiable in the 
					<a href="<?=admin_url('admin.php?page=theme-options#below-the-fold')?>">Page Customization admin area</a>.  
					Here, you can modify the bolded title area, the blurb beneath it, the text in the green 
					button, and what the green button links to.</p>
					
					<br/><hr /><br/>
					
					<h4>Updating the Header Menu</h4>
					<p>The site's header menu can be modified from the 
					<a href="<?=admin_url('nav-menus.php')?>">Appearance > Menus</a> admin 
					area.  At the top of this screen, make sure to select the menu labeled 
					'Header Navigation'.</p>
					<p>When the Header Navigation menu editor loads, you 
					can drag and drop any of the pages that are already listed to re-order them, 
					or you can add another existing page by checking a page under the 'Pages' 
					box, and clicking the 'Add to Menu' button.  You can also add any 
					arbitrary link, whether it be within your site or on an external site, by 
					typing the URL and a label for the link in the 'Custom Links' box, and clicking 
					the 'Add to Menu' button.</p>
					<p>When you're finished editing the menu, click the blue 'Save Menu' button.</p>
					
					<br/><hr /><br/>
					
					<h4>Updating the Footer</h4>
					<p>The site footer consists of 4 columns; 3 of these contain custom navigation 
					menus, and the last one is empty, but outputs your organization's contact 
					information by default.  These columns are customizable by adding or 
					removing what are called 'widgets' in WordPress.</p>
					<p>Widgets are modifiable from the 
					<a href="<?=admin_url('widgets.php')?>">Appearance > Widgets</a> admin area.  On the 
					left is a list of all available widgets; on the right is a list of all available 
					columns that widgets can be dropped into.  Widgets on the left can be dragged 
					and dropped into any of the columns on the right.</p>
					<p>Currently, there are Custom Menu widgets in Footer Columns 1, 2, and 3.  If 
					you expand a Custom Menu widget (click the down arrow next to the name of the 
					widget), you can modify the title of the menu that is displayed, and the custom 
					menu that should appear.</p>
					<p>Custom Menu widgets allow you to place an existing menu into a footer column.  
					To modify an existing menu, you can access the menu editor from the 
					<a href="<?=admin_url('nav-menus.php')?>">Appearance > Menus</a> admin 
					area.  Follow the steps above for updating the header menu, except select any 
					one of the 3 Footer Nav menus to modify.</p>
					<p>By default, the 4th footer column will display your site's contact information.  
					If you want to display something else there, simply add a widget to the Footer 
					Column Four.  If you want to display your site's contact information and some 
					other content above or below, you'll need to create a new widget for the 
					contact information, as well as a widget for the new content you want to add.  
					To re-add the contact information, simply drag a new Text widget into Footer 
					Column Four, leave the title blank, and type the shortcode </p>
					<pre><code>[contact-info]</code></pre> 
					<p>into the large text area.  Click the 'Save' button when finished.</p>
					<p>Next, create whatever new type of widget you want to add to Column Four by 
					dragging a new widget into Footer Column Four, placing it either above or below 
					the Text widget with the site contact shortcode.  Make sure to save any changes.</p>
					
					<br/><hr /><br/>
					
					<h4>Updating Your Site's Contact Information</h4>
					<p>Your site's contact information is modifiable from the 
					<a href="<?=admin_url('admin.php?page=theme-options#contact-information')?>">Page Customization admin area</a>.  
					Any information modified here will automatically be updated anywhere the </p>
					<pre><code>[contact-info]</code></pre>
					<p>shortcode is used, including the footer.</p>
				</li>
				
				<li class="section" id="shortcodes">
					<h3>Shortcodes</h3>
					
					<?php if (isset($shortcode_tags['page-link'])) { ?>
					<h4>page-link</h4>
					<p>Create a link to page (or other custom post type) specified by its title.  
					This shortcode should be wrapped around some text.</p>
					
					<p>Available attributes:</p>
					<table>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>Default Value</th>
							<th>Available Values</th>
						</tr>
						<tr>
							<td>title</td>
							<td>The title of the page to retrieve.</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>post_type</td>
							<td>The post type to retrieve posts for.</td>
							<td>page</td>
							<td>
								<ul>
								<?php 
									foreach ($custom_post_types as $custom_post_type) {
										print '<li style="list-style: disc; margin-left: 15px;">'.$custom_post_type->name.'</li>';
									}
								?>
								</ul>
							</td>
						</tr>
						<tr>
							<td>class</td>
							<td>(Optional) CSS class(es) to apply to the generated link tag.  Useful for generating styled buttons, 
							etc.  Multiple classes should be separated with a single space.</td>
							<td></td>
							<td></td>
						</tr>
					</table>
					
					<p>Examples:</p>
<pre style="white-space: pre-line;"><code># Generate a basic link to the Contact Us page.
[page-link title="Contact Us"]Click Here to visit the Contact Us page.[/page-link]

# Generate a large Bootstrap-styled button that links to a Person.  (see http://twitter.github.io/bootstrap/base-css.html#buttons)
[page-link class="btn btn-info btn-large" title="John Doe" post_type="person"]View John Doe's Profile[/page-link]
</code></pre>		

<br/><hr /><br/>		
					<?php } ?>
					
					<?php if (isset($shortcode_tags['page-url'])) { ?>
					<h4>page-url</h4>
					<p>Similar to page-link, but returns just the URL of the page specified (does not 
					generate a link tag.)  Since this shortcode doesn't generate a link tag, it should 
					not be passed any content (It should not be wrapped around text/other content).</p>
					
					<p>Available attributes:</p>
					<table>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>Default Value</th>
							<th>Available Values</th>
						</tr>
						<tr>
							<td>title</td>
							<td>The title of the page to retrieve.</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>post_type</td>
							<td>The post type to retrieve posts for.</td>
							<td>page</td>
							<td>
								<ul>
								<?php 
									foreach ($custom_post_types as $custom_post_type) {
										print '<li style="list-style: disc; margin-left: 15px;">'.$custom_post_type->name.'</li>';
									}
								?>
								</ul>
							</td>
						</tr>
					</table>
					
					<p>Examples:</p>
<pre style="white-space: pre-line;"><code># Get the URL to the Contact Us page.
[page-url title="Contact Us"]
</code></pre>

<br/><hr /><br/>
					<?php } ?>
					
					<?php if (isset($shortcode_tags['contact-info'])) { ?>
					<h4>contact-info</h4>
					<p>Display your organization's contact info, defined in the site Theme Options, under 
					the Contact Information section.  This shortcode accepts no attributes.</p>
					
					<p>Usage:</p>
<pre style="white-space: pre-line;"><code># Display the organization's contact info.
[contact-info]
</code></pre>

<br/><hr /><br/>
					<?php } ?>
					
					<h4>(post type)-list</h4>
					<p>Outputs a list of a given post type filtered by arbitrary taxonomies, for 
					example a tag or category.  A default output can be added for when no objects 
					matching the criteria are found.</p>
					
					<p>Available attributes:</p>
					<table>
						<tr>
							<th scope="col">Post Type</th>
							<th scope="col">Shortcode Call</th>
							<th scope="col">Available Taxonomy Filters</th>
							<th scope="col">Additional Filters</th>
						</tr>
						
							<?php 
								foreach ($custom_post_types as $custom_post_type) {
									if (isset($shortcode_tags[$custom_post_type->name.'-list'])) { 
							?>
						<tr>
							<td><?=$custom_post_type->singular_name?></td>
							<td><?=$custom_post_type->name?>-list</td>
									
							<td>
								<ul>
								<?php foreach ($custom_post_type->taxonomies as $tax) { 
									switch ($tax) {
										case 'post_tag':
											$tax = 'tags';
											break;
										case 'category':
											$tax = 'categories';
											break;
									}
									
								?>
									<li style="list-style: disc; margin-left: 15px;"><?=$tax?></li>
								</ul>
								<?php } ?>
							</td>
							<td>
								<ul>
								<?php
									// if more than 1 taxonomy is assigned to the post type, show 'join'
									// as being an available filter:
									if (count($custom_post_type->taxonomies) > 1) { 
									?>
										<li style="list-style: disc; margin-left: 15px;">join ('and', 'or')</li>
									<?php
									}
									?>
										<li style="list-style: disc; margin-left: 15px;">limit (number)</li>
								</ul>
							</td>
						</tr>
							<?php }
							}	?>
					</table>
						
						<p>Examples:</p>
	<pre><code># Output a maximum of 5 Documents tagged 'foo' or 'bar', with a default output.
[document-list tags="foo bar" limit=5]No Documents were found.[/document-list]

# Output all People categorized as 'foo'
[person-list categories="foo"]

# Output all People matching the terms in the custom taxonomy named 'org_groups'
[person-list org_groups="term list example"]

# Outputs all People found categorized as 'staff' and in the org_group 'small'.
[person-list limit=5 join="and" categories="staff" org_groups="small"]</code></pre>
				
<br/><hr /><br/>				
					<?php 
					if (isset($shortcode_tags['person-picture-list'])) { ?>
					
					<h4>person-picture-list</h4>
					<p>Outputs a list of People with thumbnails, person names, and job titles.  
					If a person's description is available, a link to the person's profile will be 
					outputted.  If a thumbnail for the person does not exist, a default 'No Photo 
					Available' thumbnail will display.  An optional <strong>row_size</strong> parameter 
					is available to customize the number of rows that will display, in addition to the 
					other filter parameters available to the <strong>person-list</strong> shortcode.</p>
					
					<p>Example:</p>
	<pre><code># Output all People (default to 5 columns.)
[person-picture-list]
	
# Output all People in 4 columns.
[person-picture-list row_size=4]
	
# Output People in org_group 'staff' in 6 columns.
[person-picture-list org_groups="staff" row_size=6]
</code></pre>
	
<br/><hr /><br/>
					<?php } ?>
						
					<?php if (isset($shortcode_tags['slideshow'])) { ?>
						
					<h4>slideshow</h4>
					<p>Create a javascript slideshow of each top level element in the shortcode.  All 
					attributes are optional, but may default to less than ideal values.</p>
					
					<p>Available attributes:</p>
					<table>
						<tr>
							<th scope="col">Name</th>
							<th scope="col">Description</th>
							<th scope="col">Default Value</th>
						</tr>
						<tr>
							<td>height</td>
							<td>CSS height of the outputted slideshow</td>
							<td>100px</td>
						</tr>
						<tr>
							<td>width</td>
							<td>CSS width of the outputted slideshow</th>
							<td>100%</td>
						</tr>
						<tr>
							<td>transition</td>
							<td>Length of transition in milliseconds</td>
							<td>1000</td>
						</tr>
						<tr>
							<td>cycle</td>
							<td>Length of each cycle in milliseconds</td>
							<td>5000</td>
						</tr>
						<tr>
							<td>animation</td>
							<td>The animation type, one of: 'slide' or 'fade'</td>
							<td>slide</td>
						</tr>
					</table>
					<p>Example:
	<pre><code>[slideshow height="500px" transition="500" cycle="2000"]
&lt;img src="http://some.image.com" .../&gt;
&lt;div class="robots"&gt;Robots are coming!&lt;/div&gt;
&lt;p&gt;I'm a slide!&lt;/p&gt;
[/slideshow]</code></pre>
	
<br/><hr /><br/>
					<?php } ?>
						
					<?php if (isset($shortcode_tags['post-type-search'])) { ?>
					<h4>post-type-search</h4>
					<p>Returns a list of posts of a given post type that are searchable through a generated 
					search field.  Posts are searchable by post title and any associated tags.</p>
					
					<p>Available attributes:</p>	
					<table>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>Default Value</th>
							<th>Available Values</th>
						</tr>
						<tr>
							<td>post_type_name</td>
							<td>The post type to retrieve posts for</td>
							<td>post</td>
							<td>
								<ul>
								<?php 
									foreach ($custom_post_types as $custom_post_type) {
										print '<li style="list-style: disc; margin-left: 15px;">'.$custom_post_type->name.'</li>';
									}
								?>
								</ul>
							</td>
						</tr>
						<tr>
							<td>taxonomy</td>
							<td>A taxonomy by which posts can be organized</td>
							<td>category</td>
							<td>Depends on the post type chosen and its available taxonomies</td>
						</tr>
						<tr>
							<td>show_empty_sections</td>
							<td>Determines whether or not empty taxonomy terms will be displayed within the results.</td>
							<td>false</td>
							<td>true, false</td>
						</tr>
						<tr>
							<td>non_alpha_section_name</td>
							<td>Changes the name of the section in which non-alphabetical post results are stored in the alphabetical 
							sort (posts that start with 0-9, etc.)</td>
							<td>Other</td>
							<td></td>
						</tr>
						<tr>
							<td>column_width</td>
							<td>Determines the width of the columns of results.  Intended for use with Bootstrap scaffolding 
							(<a href="http://twitter.github.com/bootstrap/scaffolding.html">see here</a>), but will accept any CSS 
							class name.</td>
							<td>span4</td>
							<td></td>
						</tr>
						<tr>
							<td>column_count</td>
							<td>The number of columns that will be created with the set column_width.</td>
							<td>3</td>
							<td></td>
						</tr>
						<tr>
							<td>order_by</td>
							<td>How to order results by term.  Note that this does not affect alphabetical results.  See 
							<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters">WP Query Orderby params</a> 
							in the Wordpress Codex for more information.</td>
							<td>post_title</td>
							<td>
								<ul>
									<li style="list-style: disc; margin-left: 15px;">none</li>
									<li style="list-style: disc; margin-left: 15px;">ID</li>
									<li style="list-style: disc; margin-left: 15px;">author</li>
									<li style="list-style: disc; margin-left: 15px;">title</li>
									<li style="list-style: disc; margin-left: 15px;">name</li>
									<li style="list-style: disc; margin-left: 15px;">date</li>
									<li style="list-style: disc; margin-left: 15px;">modified</li>
									<li style="list-style: disc; margin-left: 15px;">parent</li>
									<li style="list-style: disc; margin-left: 15px;">rand</li>
									<li style="list-style: disc; margin-left: 15px;">menu_order</li>
								</ul>
							</td>
						</tr>
						<tr>
							<td>order</td>
							<td>Determine if posts are ordered from ascending to descending, or vice-versa.</td>
							<td>ASC</td>
							<td>ASC (ascending), DESC (descending)</td>
						</tr>
							<td>show_sorting</td>
							<td>Whether or not to display the toggle buttons that sort posts by taxonomy and alphabetically.</td>
							<td>true</td>
							<td>true, false</td>
						<tr>
						</tr>
						<tr>
							<td>default_sorting</td>
							<td>How posts will be sorted by default.  Choose between by taxonomy term or alphabetically.</td>
							<td>term</td>
							<td>
								<ul>
									<li style="list-style: disc; margin-left: 15px;">term</li>
									<li style="list-style: disc; margin-left: 15px;">alpha</li>
								</ul>
							</td>
						</tr>
						<tr>
							<td>default_search_text</td>
							<td>Sets the post search field placeholder text.  Note that placeholders are not supported by 
							older browsers (IE 8 and below.)</td>
							<td>Find a (post type name)</td>
							<td></td>
						</tr>
					</table>
						
					<p>Examples:</p>
	<pre style="white-space: pre-line;"><code># Generate a Post search, organized by category, with empty sections visible.  Generates one column of results with CSS class .span3.
[post-type-search column_width="span3" column_count="1" show_empty_sections=true default_search_text="Find Something"]
	
# Generate a Person search, organized by Organizational Groups (that have People assigned to them.)
[post-type-search post_type_name="person" taxonomy="org_groups"]
</code></pre>

<br/><hr /><br/>
				<?php } ?>	
				
				</li>
				
			</ul>
		</div>
	</div>
</div>