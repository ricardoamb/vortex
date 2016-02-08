

<!-- END CONTENT -->

<?php if(isset($globalVendors)): ?><!-- BEGIN GLOBAL AND THEME VENDORS -->{globalVendors}<!-- END GLOBAL AND THEME VENDORS --><?php echo PHP_EOL; endif;  ?>
<?php if(isset($pluginsJS)): ?><!-- BEGIN PLUGINS AREA -->{pluginsJS}<!-- END PLUGINS AREA --><?php echo PHP_EOL; endif;  ?>
<?php if(isset($settings)): ?><!-- PLUGINS INITIALIZATION AND SETTINGS -->{settings}<!-- END PLUGINS INITIALIZATION AND SETTINGS --><?php echo PHP_EOL; endif;  ?>
<?php if(isset($vortex)): ?><!-- VORTEX -->{vortex}<!-- END VORTEX --><?php echo PHP_EOL; endif;  ?>
<?php if(isset($footerIncludes)): ?><!-- BEGIN FOOTER INCLUDES -->{footerIncludes}<!-- END FOOTER INCLUDES --><?php echo PHP_EOL; endif;  ?>

<?php include_once('initialization.php'); ?>

</body>
</html>