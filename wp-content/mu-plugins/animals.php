<?php

class Animal_Post_Type
{
    // Create custom post type
    public function register_post_type()
    {
        $labels = [
            'name'               => _x('Animals', 'post type general name'),
            'singular_name'      => _x('Animal', 'post type singular name'),
            'menu_name'          => _x('Animals', 'admin menu'),
            'name_admin_bar'     => _x('Animals', 'add new on admin bar'),
            'add_new'            => _x('Add New Animal', 'animal'),
            'add_new_item'       => __('Add New Animal'),
            'edit_item'          => __('Edit Animal'),
            'view_item'          => __('View Animal'),
            'all_items'          => __('All Animals'),
            'search_items'       => __('Search Animals'),
            'parent_item_colon'  => __('Parent Animal:'),
            'not_found'          => __('No animals found.'),
            'not_found_in_trash' => __('No animals found in trash.'),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'animal'],
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-pets',
            'supports'           => ['title', 'thumbnail',],
        ];

        register_post_type('animal', $args);
    }

    // Register animal category
    public function register_animal_taxonomy()
    {
        $labels = [
            'name'              => _x('Animal Categories', 'taxonomy general name'),
            'singular_name'     => _x('Animal Category', 'taxonomy singular name'),
            'search_items'      => __('Search Animal Categories'),
            'all_items'         => __('All Animal Categories'),
            'parent_item'       => __('Parent Animal Category'),
            'parent_item_colon' => __('Parent Animal Category:'),
            'edit_item'         => __('Edit Animal Category'),
            'update_item'       => __('Update Animal Category'),
            'add_new_item'      => __('Add New Animal Category'),
            'new_item_name'     => __('New Animal Category Name'),
            'menu_name'         => __('Animal Categories'),
        ];

        $args = [
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => 'animal-category'],
        ];

        register_taxonomy('animal_category', 'animal', $args);
    }

    // Create metaboxes
    public function add_animal_box()
    {
        add_meta_box(
            'animal_box_id',
            'Animal Settings',
            [$this, 'animal_box_html'],
            'animal'
        );
    }

    // Create form
    public function animal_box_html($post)
    {
        // Add nonce for verification
        wp_nonce_field('save_animal_data', 'animal_nonce');
?>

        <h1>Animal Information</h1> <br>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo esc_attr(get_post_meta($post->ID, '_animal_name', true)); ?>">
        </div> <br>

        <div>
            <label for="age">Age</label>
            <input type="text" name="age" id="age" value="<?php echo esc_attr(get_post_meta($post->ID, '_animal_age', true)); ?>">
        </div> <br>

        <div>
            <label for="breed">Breed</label>
            <input type="text" name="breed" id="breed" value="<?php echo esc_attr(get_post_meta($post->ID, '_animal_breed', true)); ?>">
        </div> <br>

        <div>
            <label for="comments">Comments</label>
            <textarea name="comments" id="comments"><?php echo esc_textarea(get_post_meta($post->ID, '_animal_comments', true)); ?></textarea>
        </div> <br>
<?php
    }


    // Save box
    public function save_animal_box($post_id)
    {
        if (!isset($_POST['animal_nonce']) || !wp_verify_nonce($_POST['animal_nonce'], 'save_animal_data')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
        $age = isset($_POST['age']) ? intval($_POST['age']) : 0;
        $breed = isset($_POST['breed']) ? sanitize_text_field($_POST['breed']) : '';
        $comments = isset($_POST['comments']) ? sanitize_textarea_field($_POST['comments']) : '';

        update_post_meta($post_id, '_animal_name', $name);
        update_post_meta($post_id, '_animal_age', $age);
        update_post_meta($post_id, '_animal_breed', $breed);
        update_post_meta($post_id, '_animal_comments', $comments);
    }
}

// Hooks
add_action('init', function () {
    $animal_post_type = new Animal_Post_Type();
    $animal_post_type->register_post_type();
    $animal_post_type->register_animal_taxonomy();

    add_action('add_meta_boxes', [$animal_post_type, 'add_animal_box']);
    add_action('save_post_animal', [$animal_post_type, 'save_animal_box']);
});
