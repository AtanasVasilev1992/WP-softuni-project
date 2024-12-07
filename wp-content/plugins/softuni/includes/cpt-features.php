<?php

if (! class_exists( 'Softuni_Feature')) :
	class Softuni_Feature {
		public function __construct() {
			add_action('init', array($this, 'softuni_register_feature_cpt'));
			
			add_action('add_meta_boxes', array($this, 'add_feature_class_meta_box'));
			add_action('save_post', array($this, 'save_feature_class_meta'));
		}

		/**
		 * Register a custom post type called "Feature".
		 *
		 * @see get_post_type_labels() for label keys.
		 */
		public function softuni_register_feature_cpt() {
			$labels = array(
				'name'                  => _x('Features', 'Post type general name', 'softuni'),
				'singular_name'         => _x('Feature', 'Post type singular name', 'softuni'),
				'menu_name'             => _x('Features', 'Admin Menu text', 'softuni'),
				'name_admin_bar'        => _x('Feature', 'Add New on Toolbar', 'softuni'),
				'add_new'               => __('Add New', 'softuni'),
				'add_new_item'          => __('Add New Feature', 'softuni'),
				'new_item'              => __('New Feature', 'softuni'),
				'edit_item'             => __('Edit Feature', 'softuni'),
				'view_item'             => __('View Feature', 'softuni'),
				'all_items'             => __('All Features', 'softuni'),
				'search_items'          => __('Search Features', 'softuni'),
				'parent_item_colon'     => __('Parent Features:', 'softuni'),
				'not_found'             => __('No Feature found.', 'softuni'),
				'not_found_in_trash'    => __('No Feature found in Trash.', 'softuni'),
				'featured_image'        => _x('Feature Cover Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'softuni'),
				'set_featured_image'    => _x('Set cover image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'softuni'),
				'remove_featured_image' => _x('Remove cover image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'softuni'),
				'use_featured_image'    => _x('Use as cover image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'softuni'),
				'archives'              => _x('Feature archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'softuni'),
				'insert_into_item'      => _x('Insert into Feature', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'softuni'),
				'uploaded_to_this_item' => _x('Uploaded to this Feature', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'softuni'),
				'filter_items_list'     => _x('Filter Features list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'softuni'),
				'items_list_navigation' => _x('Features list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'softuni'),
				'items_list'            => _x('Features list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'softuni'),
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array('slug' => 'feature'),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'show_in_rest'       => true,
				'supports'           => array('title', 'editor', 'thumbnail'),
			);

			register_post_type('feature', $args);
		}

		/**
		 * Add meta box for HTML class
		 */
		public function add_feature_class_meta_box() {
			add_meta_box(
				'feature_class_meta_box',   
				'Feature CSS Class',                
				array($this, 'render_class_meta_box'), 
				'feature',                          
				'side',                             
				'default'                           
			);
		}

		/**
		 * Display the meta box with the field for the class.
		 */
		public function render_class_meta_box($post) {
			$feature_class = get_post_meta($post->ID, '_feature_css_class', true);

			wp_nonce_field('feature_class_nonce', 'feature_class_nonce');
			?>
			<label for="feature_css_class">CSS Class:</label>
			<input type="text" 
				   id="feature_css_class" 
				   name="feature_css_class" 
				   value="<?php echo esc_attr($feature_class); ?>" 
				   style="width:100%;"
			/>
			<?php
		}

		/**
		 * Save value of meta field.
		 */
		public function save_feature_class_meta($post_id) {
			if (!isset($_POST['feature_class_nonce']) || 
				!wp_verify_nonce($_POST['feature_class_nonce'], 'feature_class_nonce')) {
				return;
			}

			if (!current_user_can('edit_post', $post_id)) {
				return;
			}

			if (isset($_POST['feature_css_class'])) {
				$feature_class = sanitize_text_field($_POST['feature_css_class']);
				update_post_meta($post_id, '_feature_css_class', $feature_class);
			}
		}
	}

	$softuni_Feature = new Softuni_Feature();

endif;