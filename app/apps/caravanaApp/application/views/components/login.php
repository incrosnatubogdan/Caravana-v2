<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="loginModalLabel">Login modal</h4>
			</div>
			<div class="modal-body">
				<form class="loginForm" id="headerLoginForm" onsubmit="return false;" role="form" action="<?=url::link('profile/login')?>">
					<div class="form-group">
						<label class="control-label" for="usr">Username:</label>
						<input type="text" name="username" class="form-control" id="usr">
					</div>
					<div class="form-group">
						<label class="control-label" for="pwd">Parola:</label>
						<input type="password" name="password" class="form-control" id="pwd">
					</div>

					<div class="form-group hidden has-success">
						<label class="control-label">Succes! Te rog sa astepti ...</label>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" onclick="login('headerLoginForm')" class="btn btn-primary">Login</button>
			</div>
		</div>
	</div>
</div>
