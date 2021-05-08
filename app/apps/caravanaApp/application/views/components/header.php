

<nav class="navbar navbar-default">
	<div class="container">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" title="caravanacumedici.ro" href="/">
				<img src="/media/img/assets/images/logo.png" class="logo-big" title="caravanacumedici.ro" alt="caravanacumedici.ro">
				<img src="/media/img/assets/images/mobile_logo.png" class="logo-small" title="caravanacumedici.ro" alt="caravanacumedici.ro">
			</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<? if (!empty($menu)):?>
				<ul class="nav navbar-nav navbar-left main-menu bebas">
					<? foreach($menu as $link): ?>
						<li><a href="<?=$link['link']?>"><?=$link['name']?></a></li>
					<? endforeach; ?>
				</ul>
			<? endif; ?>

			<? if($user) : ?>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bine ai benit <?=$user->username?> <span class="caret"></span></a>
						<?=view::factory('profile/headerMenu')?>
					</li>
				</ul>
			<? else: ?>
				<p class="navbar-text navbar-right">
					<a href="javascript:;" onclick="$('#loginModal').modal('show');"class="navbar-link">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						Autentificare
					</a>
				</p>
			<? endif; ?>

			<? if (false): ?>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cont <span class="caret"></span></a>
					<?=view::factory('profile/headerMenu')?>
				</li>
			</ul>

				<form class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Cautare</button>
				</form>
			<? endif; ?>

		</div>
	</div>
</nav>
