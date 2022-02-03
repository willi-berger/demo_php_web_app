<?php
/** @var Demo\View\Posts\ListView $this */
var_dump($this)?>

<div id="app">

	<h1>Posts</h1>
	<p>{{ message }}</p>

	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<table class="vertical, striped">
					<caption>People</caption>
					<thead>
						<tr>
							<th>UserId</th>
							<th>Title</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="item in posts" :key="item.id">
							<td data-label="Name" width="10%">{{ item.userId }}</td>
							<td data-label="Surname">{{ item.title }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-sm-4">
				<p>Top posts</p>
				<ul>
					<li v-for="item in posts" :key="item.id">{{ item.title }}</li>
				</ul>
			</div>
		</div>
	</div>



</div>
<hr />
<a href="<?= $this->portalUrl('portal/posts/add')?>">Add new post</a>


<script type="text/javascript">
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    posts: JSON.parse('<?= json_encode($this->getData()['posts']);?>'),
    
  }
})
</script>