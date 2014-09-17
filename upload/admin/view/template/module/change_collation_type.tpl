<?php echo $header; ?>
<div id="content">
<div class="breadcrumb">
  <?php foreach ($breadcrumbs as $breadcrumb) { ?>
  <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
  <?php } ?>
</div>
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<div class="box">
  <div class="heading">
    <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
  </div>
  <div class="content">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      <table class="form">
        <tr><td><?php echo $entry_newcharset; ?></td><td><input id="newcharset" type="text" name="newcharset" placeholder="utf8" value="<?php echo $newcharset; ?>"/></td></tr>
<tr><td><?php echo $entry_newcollation; ?></td><td><input type="text" id="newcollation" name="newcollation" placeholder="utf8_general_ci" value="<?php echo $newcollation; ?>"/></td></tr>
                 <td><a onclick="changecollation()" id="submit" class="button"><span>Change Type</span></a></td>

      </table>
     
    </form>
  </div>
</div>

<?php echo $footer; ?>
<script type="text/javascript"><!--

function changecollation(){
 var newcharset = document.getElementById('newcharset').value;
 var newcollation = document.getElementById('newcollation').value;

}
</script>
