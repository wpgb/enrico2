<?php
//Options for the eniro api settings (under the Settings Menu)

function enrico_settings_register(){
    register_setting ('enrico_settings_group','enrico_api_profile');
    register_setting ('enrico_settings_group','enrico_api_key');
    register_setting ('enrico_settings_group','enrico_api_version');
    register_setting ('enrico_settings_group','enrico_map_partnerId');
    register_setting ('enrico_settings_group','enrico_googleapi_key');
    register_setting ('enrico_settings_group','enrico_map_preferredMap');
    register_setting ('enrico_settings_group','enrico_map_marker_logo');
    register_setting ('enrico_settings_group','enrico_map_marker_logo_width');
    register_setting ('enrico_settings_group','enrico_archive_posts_per_page');
    register_setting ('enrico_settings_group','enrico_archive_posts_sort_term');
    register_setting ('enrico_settings_group','enrico_archive_posts_sort_order');
    register_setting ('enrico_settings_group','enrico_link_display');
}
function enrico_settings_menu(){
add_options_page('Company Settings Page','Enrico','administrator',__FILE__,'enrico_settings_page');

    
}

function enrico_settings_page(){
   ?>
   <div class="wrap">
   <h2>Enrico Company Settings Options</h2>
   
   <form method='post' action='options.php'>
       <?php
       settings_fields( 'enrico_settings_group' );
       do_settings_sections( 'enrico_settings_group' );
       
       if(!get_option( 'enrico_map_preferredMap' )){
           add_option('enrico_map_preferredMap','eniro');
       }
       
       if(!get_option( 'enrico_archive_posts_sort_term' )){
           add_option('enrico_archive_posts_sort_term','default');
       }
       
       
       if(!get_option( 'enrico_archive_posts_sort_order' )){
           add_option('enrico_archive_posts_sort_order','ASC');
       }
       
       ?>
       
       <table class="form-table">
        <tr valign="top">
        <th scope="row">Eniro API Profile: </th>
        <td><input name="enrico_api_profile" size="35" type="text" value="<?php echo get_option("enrico_api_profile");?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Eniro API key: </th>
        <td><input name="enrico_api_key" size="35" type="text" value="<?php echo get_option("enrico_api_key");?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Eniro API version: </th>
        <td><input name="enrico_api_version" type="text" value="<?php echo get_option("enrico_api_version");?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Eniro Maps Partner ID: </th>
        <td><input name="enrico_map_partnerId" type="text" value="<?php echo get_option("enrico_map_partnerId");?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Google Maps API key: </th>
        <td><input name="enrico_googleapi_key" size="50" type="text" value="<?php echo get_option("enrico_googleapi_key");?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Preferred map service: </th>
        
        <td><input name="enrico_map_preferredMap" type="radio" value="eniro"
                        <?php checked( 'eniro', get_option( 'enrico_map_preferredMap' ) ); ?> /> EniroMap<br>
            
            
            <input name="enrico_map_preferredMap" type="radio" value="google" 
                        <?php checked( 'google', get_option( 'enrico_map_preferredMap' ) ); ?> /> GoogleMap<br>
                        
            <input name="enrico_map_preferredMap" type="radio" value="none" 
                        <?php checked( 'none', get_option( 'enrico_map_preferredMap' ) ); ?> /> None</td>
                        
        <tr valign="top">
        <th scope="row">Map Marker Logo:</th>
        <td><input name="enrico_map_marker_logo" size="50" type="url" value="<?php echo get_option("enrico_map_marker_logo");?>" />(link to .jpg or .png file)</td>
        </tr>              
            
        <tr valign="top">
        <th scope="row">Marker Logo Width:</th>
        <td><input name="enrico_map_marker_logo_width" size="10" type="number" min="10" max="500" value="<?php echo get_option("enrico_map_marker_logo_width");?>" /> px</td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Enrico posts per page:</th>
        <td><input name="enrico_archive_posts_per_page" size="10" type="number" min="-1" max="500" value="<?php echo get_option("enrico_archive_posts_per_page");?>" /> (-1 will show all posts on same page)</td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Archive Sort Term: </th>
        
        <td><input name="enrico_archive_posts_sort_term" type="radio" value="default"
                        <?php checked( 'default', get_option( 'enrico_archive_posts_sort_term' ) ); ?> /> Use Default sort<br>
            
            
            <input name="enrico_archive_posts_sort_term" type="radio" value="post_title"
                        <?php checked( 'post_title', get_option( 'enrico_archive_posts_sort_term' ) ); ?> /> Company Name<br>
            
            
            <input name="enrico_archive_posts_sort_term" type="radio" value="enrico-postCode" 
                        <?php checked( 'enrico-postCode', get_option( 'enrico_archive_posts_sort_term' ) ); ?> /> Post Code<br>
                        
            <input name="enrico_archive_posts_sort_term" type="radio" value="enrico-latitude" 
                        <?php checked( 'enrico-latitude', get_option( 'enrico_archive_posts_sort_term' ) ); ?> /> Latitude<br> 
            
            <input name="enrico_archive_posts_sort_term" type="radio" value="enrico-longitude" 
                        <?php checked( 'enrico-longitude', get_option( 'enrico_archive_posts_sort_term' ) ); ?> /> Longitude</td>

        </tr>
        
        
        <tr valign="top">
        <th scope="row">Archive Sort Order: </th>
        
        <td><input name="enrico_archive_posts_sort_order" type="radio" value="ASC"
                        <?php checked( 'ASC', get_option( 'enrico_archive_posts_sort_order' ) ); ?> /> Ascending<br>
                        
            <input name="enrico_archive_posts_sort_order" type="radio" value="DESC" 
                        <?php checked( 'DESC', get_option( 'enrico_archive_posts_sort_order' ) ); ?> /> Descending</td>

        </tr>
        
        <tr valign="top">
        <th scope="row">Display Links to: </th>
        
        <td><input name="enrico_link_display[homepage]" type="checkbox" value="on"
                        <?php checked( 'on', get_option( 'enrico_link_display')[homepage] ); ?> /> Homepage<br>
                        
            <input name="enrico_link_display[altURL]" type="checkbox" value="on"
                        <?php checked( 'on', get_option( 'enrico_link_display')[altURL] ); ?> /> Use alternative URL (overrides Homepage if available)<br>
            
            <input name="enrico_link_display[facebook]" type="checkbox" value="on"
                        <?php checked( 'on', get_option( 'enrico_link_display')[facebook] ); ?> /> Facebook<br>
                        
            <input name="enrico_link_display[email]" type="checkbox" value="on"
                        <?php checked( 'on', get_option( 'enrico_link_display')[email] ); ?> /> email<br>
            
            <input name="enrico_link_display[infoPageLink]" type="checkbox" value="on"
                        <?php checked( 'on', get_option( 'enrico_link_display')[infoPageLink] ); ?> /> InfoPage<br>
                        
            <input name="enrico_link_display[directions]" type="checkbox" value="on"
                        <?php checked( 'on', get_option( 'enrico_link_display')[directions] ); ?> /> Directions (Vägbeskrivning)<br><br>

             (The links will be shown in the post archive and in the map marker) </td>
           
            

        </tr>
        
            
    </table>
    
    <?php  submit_button(); ?>
    
    

   </form>
   </div>



   <?php
  
}





?>