
<?php
    $search = function($eachId,$return,$else="",$status=""){
        $menu = helper::getMenu();

        if($status == 'child')
        {
            $id = $menu->id;

        }else{
            if($menu->parent_id != null)
            {
                $id =  $menu->parent_id;
            }else{
                $id = $menu->id;
            }
        }
               

        return $eachId == $id ? $return : $else;
    };
?>

<div class="wg_base_module_navigation" id="main" >
    <ul id="list_container">

        <?php foreach(injectModel('Menu')->whereParentId(null)->orderBy('order','asc')->get() as $row): ?>

            <li class="root <?php echo e($search($row->id,'hover')); ?>">
                <a class="<?php echo e($row->slug); ?>" onclick = "openChild('<?php echo e($row->id); ?>')" href="<?php echo e(($row->controller != '#' ? urlBackend($row->slug.'/index') : '#')); ?>"><span><?php echo e($row->title); ?></span></a>
            </li>

        <?php endforeach; ?>
       
       
    </ul>
    </div>
</div>
<div id="navigation-slick-children">
     <?php foreach(injectModel('Menu')->whereParentId(null)->get() as $parent): ?>
        <ul class="child" id = 'child<?php echo e($parent->id); ?>' onclick = '' style = 'margin-top:5px;display:<?php echo e($search($parent->id,"block","none")); ?>;'>

            <?php foreach($parent->childs as $child): ?>
                <li>
                    <a style = 'margin-right:15px;<?php echo e($search($child->id,"color:green;","","child")); ?>' href="<?php echo e(urlBackend($child->slug.'/index')); ?>"><?php echo e($child->title); ?></a>
                </li>
            <?php endforeach; ?>

        </ul>

     <?php endforeach; ?>

        
    <div id="snbp">&lt;</div>
    <div id="snbn">&gt;</div>
</div>