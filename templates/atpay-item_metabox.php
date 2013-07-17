<table> 

    <tr valign="top">
        <th class="metabox_label_column">
            <label for="price">Item Price</label>
        </th>
        <td>
            <input type="text" id="price" name="price" value="<?php echo @get_post_meta($post->ID, 'price', true); ?>" />
        </td>
    <tr>

    <tr valign="top">
        <th class="metabox_label_column">
            <label for="dwn_link">Download Link</label>
        </th>
        <td>
            <input type="text" id="dwn_link" name="dwn_link" value="<?php echo @get_post_meta($post->ID, 'dwn_link', true); ?>" />
        </td>
    <tr>


        
</table>