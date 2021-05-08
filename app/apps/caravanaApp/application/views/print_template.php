<html lang="en">
	<?= (!empty($main)) ? $main : ''; ?>
	<body>
    <div class="container text-center">
      <img src="<?=$img?>assets/images/logo_print.jpg" alt="caravanacumedici.ro">
    </div>
		<div>
			<?= (!empty($content)) ? $content : ''; ?>
		</div>
	</body>
  <script>
    $(function() {
      window.print();
    });
  </script>
</html>
