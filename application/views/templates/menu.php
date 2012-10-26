			</div>
			<div id="side-menu" class="structure">
				<div id="search-form">
					<form id="searchForm" data-url="<?php echo site_url('/posts/search'); ?>">
					    <fieldset>
					        <div class="input">
					            <input type="text" name="s" id="s" value="Vous désirez?" />
					        </div>
					        <input type="submit" id="searchSubmit" value="" />
					    </fieldset>
					</form>
				</div>
				
				<?php $this->load->view('menu/tweets'); ?>
				
				<?php $this->load->view('menu/last_posts'); ?>
				
				<?php $this->load->view('menu/last_comments'); ?>
				
				<?php $this->load->view('menu/instagram_picture'); ?>
				
			</div>
			
		</div>
	

</div>