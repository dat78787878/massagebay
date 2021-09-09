<div id="Breadcrumb" class="Block Breadcrumb ui-widget-content ui-corner-top ui-corner-bottom">
    <ul>
        <li class="home"><a href="<?php echo base_url(''); ?>Techsystem"><i class="icon-home" style="font-size:14px;"></i> <?php echo alang("HOME") ?></a></li>
        <li class="SecondLast"><a href="Techsystem/view_plugins/alternative_menu">Cấu hình Menu Version 2</a></li>
    </ul>
</div>
<?php $config = @$config?$config:[]; ?>
<div id="cph_Main_ContentPane " class="alternative_menu">
    <div class="row">
        <div class="col-xs-12">
            <h3 class="title">Lựa chọn Menu có Active</h3>
            <div class="static-menus box-border">
             <?php 
                $menus = $this->db->get('group_menu')->result_array();

            ?>
            <?php foreach($menus as $menu): ?>
            <div class="item-menu">
                <input <?php  echo isset($config['menus']) &&  array_key_exists($menu['id'], $config['menus'])?'checked':''  ?> type="checkbox" id="<?php echo $menu['id'] ?>"  value="1">
                <label for="<?php echo $menu['id'] ?>"><?php echo $menu['name'] ?></label>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        <div class="col-xs-12 ">
            <h3 class="title">Lựa chọn Link tĩnh và bảng con tương ứng</h3>

            <div class="static-links box-border">
            <?php 
            $this->db->where('is_static',1);
            $staticResults = $this->db->get('nuy_routes')->result_array();

            $this->db->where('name','slug');
            $tableLinks = $this->db->get('nuy_detail_table')->result_array();
             ?>
            <?php foreach ($staticResults as $k => $link):?>
                <div class="item-static">
                <input <?php  echo isset($config['static']) &&  array_key_exists($link['link'], $config['static'])?'checked':''  ?> type="checkbox" id="<?php echo $link['link'] ?>"  value="1">
                <label for="<?php echo $link['link'] ?>"><?php echo $link['link'] ?></label>
                <span>Liên kết Link bảng</span>
                <select >
                    <option value="">Không chọn</option>
                    <?php foreach ($tableLinks as $kl => $vl):?>
                    <option <?php  echo isset($config['static'][$link['link']]['map']) && $vl['link']==$config['static'][$link['link']]['map'] ?'selected':'' ?> value="<?php echo $vl['link'] ?>"><?php echo $vl['link'] ?></option>
                    <?php endforeach ?>
                </select>
                </div>
            <?php endforeach ?>
            </div>
        </div>
        <div class="col-xs-12">
            <form action="" method="post">
            <textarea name="config" class="hidden"><?php echo json_encode($config) ?></textarea>
            <button class="btn btn-primary" type="submit">Lưu</button>
            </form>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function alternativeMenuSetting(){
        var json = {};

        var menus = $('.alternative_menu .static-menus .item-menu');
        var objmenus = {};
        for (var i = 0; i < menus.length; i++) {
            var menu = $(menus[i]);
            var checkbox = menu.find('input[type=checkbox]');
            var id = checkbox.attr('id');
            var value = checkbox.is(":checked")?1:0;
            if(value==1){
                objmenus[id] = {'name':id};
            }
        }
        json['menus'] = objmenus;


        var statics = $('.alternative_menu .static-links .item-static');
        var jsonstatic = {};
        for (var i = 0; i < statics.length; i++) {
            var static = $(statics[i]);
            var checkbox = static.find('input[type=checkbox]');
            var select = static.find('select').val();
            var label = static.find('label').text();
            var value = checkbox.is(":checked")?1:0;
            if(value==1){
                jsonstatic[label] = {'name':label,'map':select};
            }
        }
        json['static'] = jsonstatic;
        $(".alternative_menu textarea[name=config]").val(JSON.stringify(json));
    }
    $(document).on('change', '.alternative_menu .static-menus input,.alternative_menu .static-links input,.alternative_menu .static-links select', function(event) {
        event.preventDefault();
        alternativeMenuSetting();
    });
</script>
<style type="text/css">
.box-border{
        border: 1px solid #00923f;
    padding: 5px 10px;
}
    .alternative_menu .item{
            background: #00923f;
    padding: 3px;
    color: #fff;
        margin-bottom: 10px;
    }
    .alternative_menu .title{
text-align: center;
    text-transform: uppercase;
    background: #fff;
    color: #00923f;
    font-weight: bold;
    }
    .alternative_menu .attribute{
        display: inline-block;
    }
    .alternative_menu select,
    .alternative_menu input{
        height: 20px;
        color: #000;
    }
    .alternative_menu .static-links .item-static,
    .alternative_menu .static-links .item{
        padding: 1px;
    vertical-align: top;
    margin-bottom: 1px;
    }
    .alternative_menu .static-links .item-static input,
    .alternative_menu .static-links .item input{
        margin: 0;
    display: inline-block;
    vertical-align: top;
    height: 20px;
    }
    .alternative_menu .static-links .item-static label,
    .alternative_menu .static-links .item label{
margin: 0;
    display: inline-block;
    vertical-align: top;
    height: 20px;
    width: 150px;
    overflow: hidden;
    }
</style>