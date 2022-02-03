<?php
/** @var Demo\View\Posts\PostsDetailView $this */
var_dump($this)?>

<div id="app">
	<h1>Post</h1>
	<p>{{ message }}</p>
<form>
  <fieldset>
    <legend>Choose your favorite monster</legend>

    <input type="radio" id="kraken" name="monster">
    <label for="kraken">Kraken</label><br/>

    <input type="radio" id="sasquatch" name="monster">
    <label for="sasquatch">Sasquatch</label><br/>

    <input type="radio" id="mothman" name="monster">
    <label for="mothman">Mothman</label>
  </fieldset>
</form>

	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<form>
					<fieldset>
						<legend>Simple form</legend>
						<label for="username">Username</label> <input type="text"
							id="Username" placeholder="Username" /> <label for="password">Password</label>
						<input type="password" id="password" placeholder="Password" />
					</fieldset>
				</form>
			</div>
		</div>
	</div>


	<form>
		<fieldset>
			<legend>Simple form</legend>
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<label for="title">Title</label> <input type="text" id="title"
						placeholder="Title" />
				</div>
				<div class="col-sm-12 col-md-6">
					<label for="body">Body</label>
					<textarea id="body" placeholder="Text ..."></textarea>
				</div>
			</div>
		</fieldset>
	</form>

</div>
<hr />


<script type="text/javascript">
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue - Post detail!',    
  }
})
</script>