<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

    // Theme defaults
    $primary_color = '#5bc08c';
    $secondary_color = '#666';

    // Stores all the controls that will be added
    /** @var TYPE_NAME $options */
    $options = array();

    // Stores all the sections to be added
    $sections = array();

    // Stores all the panels to be added
    $panels = array();

    // Adds the sections to the $options array
    $options['sections'] = $sections;

    // Category Dropdown and stored data in array
    $output_categories = array();
    $cat_args  = array(
        'type'                     => 'post',
        'orderby'                  => 'name',
        'order'                    => 'ASC'
    );

    $categories=get_categories($cat_args);

    foreach($categories as $category) {
        $output_categories[$category->cat_ID] = $category->name;
    }
    $output_categories['recent_posts'] = 'Recent Posts';


//Header section
    $section = 'Header-panel-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Header', 'newspapertimes-pro' ),
        'priority' => '10',
        'panel' => $panel
    );

    $choices = array(
        'choice-1' => 'Normal',
        'choice-2' => 'Full Width',
        'choice-3' => 'Logo with AD',
    );

    $options['logo-appearance'] = array(
        'id' => 'logo-appearance',
        'label'   => __( 'Header Style', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'choice-1'
    );

    $options['logo-ad-enable'] = array(
        'id' => 'logo-ad-enable',
        'label'   => __( 'AD Beside Logo', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
    );

    $options['logo-ad'] = array(
        'id' => 'logo-ad',
        'label'   => __( 'AD Beside Logo Code', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'textarea',
        'description' => 'Displays Beside the logo (Rightside) - Enter your HTML AD Code into this text area'
    );

    $options['international-text'] = array(
        'id' => 'international-text',
        'label'   => __( 'Edition', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'Edition: International',
    );

    $options['breakingnews-enable'] = array(
        'id' => 'breakingnews-enable',
        'label'   => __( 'Breaking News', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['breakingnews-text'] = array(
        'id' => 'breakingnews-text',
        'label'   => __( 'Breaking News Text', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
        'default' => ' BREAKING NEWS ',
    );

    $options['trending-text'] = array(
        'id' => 'trending-text',
        'label'   => __( 'Trending Text', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
        'default' => ' TRENDING',
    );

    $options['headlines-enable'] = array(
        'id' => 'headlines-enable',
        'label'   => __( 'Headlines', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['headlines-text'] = array(
        'id' => 'headlines-text',
        'label'   => __( 'Headlines Text', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'HEADLINES',
    );


    $options['caregories-options'] = array(
        'id' => 'caregories-options',
        'label'   => __( 'Headlines Category', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $output_categories,
        'default' => 'recent_posts',
    );

    $section = 'Social-Icons-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Icons', 'newspapertimes-pro' ),
        'priority' => '10',
        'panel' => $panel
    );

    $options['facebook-enable'] = array(
        'id' => 'facebook-enable',
        'label'   => __( 'Facebook', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );
    $options['facebook-url'] = array(
        'id' => 'facebook-url',
        'label'   => __( 'Facebook URL', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
    );

    $options['twitter-enable'] = array(
        'id' => 'twitter-enable',
        'label'   => __( 'Twitter', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );
    $options['twitter-url'] = array(
        'id' => 'twitter-url',
        'label'   => __( 'Twitter URL', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
    );

    $options['googleplus-enable'] = array(
        'id' => 'googleplus-enable',
        'label'   => __( 'Googleplus', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['googleplus-url'] = array(
        'id' => 'googleplus-url',
        'label'   => __( 'Googleplus URL', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
    );

    $options['linkedin-enable'] = array(
        'id' => 'linkedin-enable',
        'label'   => __( 'LinkedIn', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['linkedin-url'] = array(
        'id' => 'linkedin-url',
        'label'   => __( 'LinkedIn URL', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
    );

    $options['digg-enable'] = array(
        'id' => 'digg-enable',
        'label'   => __( 'Digg', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['digg-url'] = array(
        'id' => 'digg-url',
        'label'   => __( 'Digg URL', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
    );

    $options['whatsup-enable'] = array(
        'id' => 'whatsup-enable',
        'label'   => __( 'Whats up', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['whatsup-url'] = array(
        'id' => 'whatsup-url',
        'label'   => __( 'Whats up URL', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
    );

    $options['instagram-enable'] = array(
        'id' => 'instagram-enable',
        'label'   => __( 'Instagram', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['instagram-url'] = array(
        'id' => 'instagram-url',
        'label'   => __( 'Instagram URL', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
    );

    $options['medium-enable'] = array(
        'id' => 'medium-enable',
        'label'   => __( 'Medium', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['medium-url'] = array(
        'id' => 'medium-url',
        'label'   => __( 'Medium URL', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
    );

    $options['pinterest-enable'] = array(
        'id' => 'pinterest-enable',
        'label'   => __( 'Pinterest', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['pinterest-url'] = array(
        'id' => 'pinterest-url',
        'label'   => __( 'Pinterest URL', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
    );

    $options['tumblr-enable'] = array(
        'id' => 'tumblr-enable',
        'label'   => __( 'Tumblr', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['tumblr-url'] = array(
        'id' => 'tumblr-url',
        'label'   => __( 'Tumblr URL', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
    );

    $options['reddit-enable'] = array(
        'id' => 'reddit-enable',
        'label'   => __( 'Reddit', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['reddit-url'] = array(
        'id' => 'reddit-url',
        'label'   => __( 'Reddit URL', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
    );



//Single page section
    $section = 'Single page section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Single', 'newspapertimes-pro' ),
        'priority' => '10',
        'panel' => $panel
    );
    $options['related-posts-enable'] = array(
        'id' => 'related-posts-enable',
        'label'   => __( 'Related Posts', 'newspapertimes-pro' ),
        'section' => $section,
        'description' => 'Displays Related Posts below the article',
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['number-of-posts'] = array(
        'id' => 'number-of-posts',
        'label'   => __( 'Number of Posts to display', 'techtheme2017' ),
        'section' => $section,
        'type'    => 'text',
    );

    $options['author-box-enable'] = array(
        'id' => 'author-box-enable',
        'label'   => __( 'Author', 'newspapertimes-pro' ),
        'section' => $section,
        'description' => 'Displays Author information below the post',
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['future-image-enable'] = array(
        'id' => 'future-image-enable',
        'label'   => __( 'Featured Image', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['single-shareicons-enable'] = array(
        'id' => 'single-shareicons-enable',
        'label'   => __( 'Social Icons (Global Option)', 'newspapertimes-pro' ),
        'section' => $section,
        'description' => 'Displays Social Sharing below the post. You can turn off these social sharing icons with this option. ',
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    $options['single-twitter-enable'] = array(
        'id' => 'single-twitter-enable',
        'label'   => __( 'Twitter', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );


    $options['single-facebook-enable'] = array(
        'id' => 'single-facebook-enable',
        'label'   => __( 'Facebook', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );


    $options['single-linkedin-enable'] = array(
        'id' => 'single-linkedin-enable',
        'label'   => __( 'LinkedIn', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );


    $options['single-googleplus-enable'] = array(
        'id' => 'single-googleplus-enable',
        'label'   => __( 'Google plus', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 'Enable',
    );

    //Archive  page section
    $section = 'Archive page section';
    $sections[] = array(
        'id' => $section,
        'title' => __( 'Archive', 'newspapertimes-pro' ),
        'priority' => '10',
        'panel' => $panel
    );

    $options['category-enable']=array(
        'id'=>'category-enable',
        'label' =>__('Hide Archive Label','newstimes-pro'),
        'section'=>$section,
        'type'  => 'checkbox',
        'default'=>'Disable',
        'description' =>'Displays the Header (Categoriy label and type of categories)'
    );


// Advertisement section //
    $section = 'Advertisement-panel-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Advertisement', 'newspapertimes-pro' ),
        'priority' => '10',
        'panel' => $panel
    );

    $options['ads1-img'] = array(
        'id' => 'ads1-img',
        'label'   => __( 'Where are these Advertisement Areas?', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'content',
        'description' => '<a href="' . get_template_directory_uri() . '/images/ad-blocks.jpg" target="_blank">Click to see where are these AD blocks?</a><br />',
    );



    $options['ads1-enable'] = array(
        'id' => 'ads1-enable',
        'label'   => __( 'AD #1', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
    );

    $options['ads1'] = array(
        'id' => 'ads1',
        'label'   => __( 'AD #1 Code', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'textarea',
        'description' => 'Displays Above the Header (Sitewide) - Enter your HTML AD Code into this text area'
    );

    $options['ads2-enable'] = array(
        'id' => 'ads2-enable',
        'label'   => __( 'AD2 #2', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
    );

    $options['ads2'] = array(
        'id' => 'ads2',
        'label'   => __( 'AD #2 Code', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'textarea',
        'description' => 'Displays Below the Navigation Menus (Sitewide) - Enter your HTML AD Code into this text area'
    );

    $options['ads3-enable'] = array(
        'id' => 'ads3-enable',
        'label'   => __( 'AD #3', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
    );

    $options['ads3'] = array(
        'id' => 'ads3',
        'label'   => __( 'AD #3 Code', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'textarea',
        'description' => 'Displays Above the Footer (Sitewide) - Enter your HTML AD Code into this text area'

    );

    $options['ads4-enable'] = array(
        'id' => 'ads4-enable',
        'label'   => __( 'AD #4', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
    );

    $options['ads4'] = array(
        'id' => 'ads4',
        'label'   => __( 'AD #4 Code', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'textarea',
        'description' => 'Displays Below the Footer (Sitewide) - Enter your HTML AD Code into this text area'

    );

    $options['ads5-enable'] = array(
        'id' => 'ads5-enable',
        'label'   => __( 'AD #5', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
    );

    $options['ads5'] = array(
        'id' => 'ads5',
        'label'   => __( 'AD #5 Code', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'textarea',
        'description' => 'Displays Below the Post Title of Single Post - Enter your HTML AD Code into this text area'

    );

    $options['ads6-enable'] = array(
        'id' => 'ads6-enable',
        'label'   => __( 'AD #6', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
    );

    $options['ads6'] = array(
        'id' => 'ads6',
        'label'   => __( 'AD #6 Code', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'textarea',
        'description' => 'Displays Above the Content of Single Post - Enter your HTML AD Code into this text area'

    );

    $options['ads7-enable'] = array(
        'id' => 'ads7-enable',
        'label'   => __( 'AD #7', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
    );

    $options['ads7'] = array(
        'id' => 'ads7',
        'label'   => __( 'AD #7 Code', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'textarea',
        'description' => 'Displays Below the Content of Single Post - Enter your HTML AD Code into this text area'

    );

    $options['ads8-enable'] = array(
        'id' => 'ads8-enable',
        'label'   => __( 'AD #8', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
    );

    $options['ads8'] = array(
        'id' => 'ads8',
        'label'   => __( 'AD #8 Code', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'textarea',
        'description' => 'Displays Above the Archives (Categories and Tags) - Enter your HTML AD Code into this text area'
    );

    $options['ads9-enable'] = array(
        'id' => 'ads9-enable',
        'label'   => __( 'AD #9', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'checkbox',
    );

    $options['ads9'] = array(
        'id' => 'ads9',
        'label'   => __( 'AD #9 Code', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'textarea',
        'description' => 'Displays Below the Archives (Categories and Tags) - Enter your HTML AD Code into this text area'

    );

// footer section //
    $section = 'Footer-panel-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer', 'newspapertimes-pro' ),
        'priority' => '10',
        'panel' => $panel
    );

    $options['copyrights-text'] = array(
        'id' => 'copyrights-text',
        'label'   => __( 'Copyright', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'All rights reserved',
    );


    $options['google-analytic-code'] = array(
        'id' => 'google-analytic-code',
        'label'   => __( 'Google Analytics Code', 'newspapertimes-pro' ),
        'section' => $section,
        'type'    => 'textarea',
    );



    // Adds the sections to the $options array
    $options['sections'] = $sections;

    // Adds the panels to the $options array
    $options['panels'] = $panels;

    $customizer_library = Customizer_Library::Instance();
    $customizer_library->add_options( $options );

    // To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_demo_options' );
