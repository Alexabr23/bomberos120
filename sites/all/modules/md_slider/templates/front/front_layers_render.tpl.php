<?php
/**
 * @file: front_layers_render.tpl.php
 * User: Duy
 * Date: 1/29/13
 * Time: 3:57 PM
 */
?>
<div class="<?php print $class; ?>" <?php print $data; ?>>
    <?php if ($layer->type == 'text'): ?>
        <?php if (isset($link)):?>
            <a href="<?php print $link;?>"><?php print htmlentities($layer->title, ENT_QUOTES, "UTF-8");?></a>
        <?php else:?>
            <?php print htmlentities($layer->title, ENT_QUOTES, "UTF-8");?>
        <?php endif; ?>
    <?php elseif ($layer->type == 'image'): ?>
        <?php if (isset($link)):?>
            <a href="<?php print $link;?>">
                <img src="<?php print $layer->url;?>" alt="<?php print htmlentities($layer->title, ENT_QUOTES, "UTF-8");?>" />
            </a>
        <?php else:?>
            <img src="<?php print $layer->url;?>" alt="<?php print htmlentities($layer->title, ENT_QUOTES, "UTF-8");?>" />
        <?php endif; ?>
    <?php elseif ($layer->type == 'video'): ?>
    <a title="<?php print htmlentities($layer->title, ENT_QUOTES, 'UTF-8'); ?>" class="md-video"
       href="<?php print $layer->url; ?>">
        <img src="<?php print $layer->thumb; ?>"
             alt="<?php print htmlentities($layer->title, ENT_QUOTES, 'UTF-8'); ?>"/>
        <span class="md-playbtn"></span>
    </a>
  <?php endif; ?>
</div>
