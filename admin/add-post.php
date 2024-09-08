<?php include "header.php"; 
if($_SESSION['username'] == ''){
    header("location:{$hostname}");
}?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" id="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea id="post_des" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select id="category" class="form-control">
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" id="fileToUpload" required>
                      </div>
                      <input type="submit" id="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<script>
function cat_load(){
    fetch('fetch.php')
    .then((response) => response.json())
    .then((result) =>{
        let option = `<option value="0" selected disabled> Select Category</option>`;
        result['all_category'].forEach(e => {
            option +=  `<option value="${e.category_id}">${e.category_name}</option>`
        });
        document.getElementById('category').innerHTML = option;
    }).catch((error) =>{
        console.log("error");
    })
}
cat_load();
/* Function for data  submit */
const save_btn = document.getElementById('submit');
save_btn.addEventListener('click', (e) =>{
e.preventDefault();
const p_title = document.getElementById('post_title').value;
const p_des = document.getElementById('post_des').value;
const p_category = document.getElementById('category').value;
const p_image = document.getElementById('fileToUpload').files[0];
const formData = new FormData();
formData.append('p_title', p_title);
formData.append('p_des', p_des);
formData.append('p_category', p_category);
formData.append('p_image', p_image);
fetch('fetch.php', {
    method: 'POST',
    body: formData
})
.then((response) => response.json())
.then((result) => {
    if(result.insert == 'success'){
        location.href = 'http://localhost/news/admin/post.php';
    }
})
.catch((error) => {
    console.log('error');
});

})
</script>
<?php include "footer.php"; ?>
