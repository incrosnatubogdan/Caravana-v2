<nav class="text-center">
	<ul class="pagination">

	<?php if ($first_page !== FALSE): ?>
		<li>
			<a href="<?php echo HTML::chars($page->url($first_page)) ?>" aria-label="Prima pagina"> <span aria-hidden="true">&laquo;</span> </a>
		</li>
	<?php endif ?>

	<?php if ($previous_page !== FALSE): ?>
		<li>
			<a href="<?php echo HTML::chars($page->url($previous_page)) ?>" aria-label="Pagina anterioara">
				<span aria-hidden="true"> &lsaquo; </span>
			</a>
		</li>
	<?php endif ?>

	<?php for ($i = 1; $i <= $total_pages; $i++): ?>

		<?php if ($i == $current_page): ?>
			<li class="active"><a><?php echo $i ?></a></li>
		<?php else: ?>
			<li><a href="<?php echo HTML::chars($page->url($i)) ?>"><?php echo $i ?></a></li>
		<?php endif ?>

	<?php endfor ?>

	<?php if ($next_page !== FALSE): ?>
		<li>
			<a href="<?php echo HTML::chars($page->url($next_page)) ?>" aria-label="Pagina urmatoare">
				<span aria-hidden="true">&rsaquo;</span>
			</a>
		</li>
	<?php endif ?>

	<?php if ($last_page !== FALSE): ?>
		<li>
			<a href="<?php echo HTML::chars($page->url($last_page)) ?>" aria-label="Ultima pagina"> <span aria-hidden="true">&raquo;</span> </a>
		</li>
	<?php endif ?>

	</ul>
</nav>
