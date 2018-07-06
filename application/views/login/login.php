<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="marg">
	<div class="col-md-8 mx-auto">
		<div class="card rounded-0 border-dark">
			<div class="card-header text-center rounded-0 bg-dark text-white">
				<h2>Login</h2>
			</div>
			<div class="card-body">
				<?php if(!empty($message)) : ?>
				<div class="alert alert-danger" role="alert">
						<?=$message; ?>
				</div>
				<?php endif; ?>

				<?=form_open('login/action'); ?>
					<div class="form-group">
						<label for="username">Username</label>
						<div class="col-sm-10 float-right">
							<input type="text" name="username" class="rounded-0 form-control" id="username" value="<?=set_value('username');?>" autocomplete="off"/>
						</div>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<div class="col-sm-10 float-right">
							<input type="password" name="password" class="rounded-0 form-control" id="password" value="<?=set_value('username');?>"/>
						</div>
					</div>
					<div class="card-footer bg-transparent">
						<button type="submit" class="btn btn-primary float-right">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>