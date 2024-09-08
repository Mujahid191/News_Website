<?php include "header.php"; 
include 'config.php';
if($_SESSION['username'] == ''){
    header("location:{$hostname}");
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody id="tbody">
                      </tbody>
                  </table>
                  <div id="pagination" class='pagination admin-pagination'>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <script>
    function laod_data(page){
        fetch(`fetch.php?page=${page}`)
        .then((response) => response.json())
        .then((result) =>{
            var tr = '';
            result['all_data'].forEach(e => {
                tr+=`<tr>
                        <td class='id'>${e.post_id}</td>
                        <td>${e.title}</td>
                        <td>${e.category_name}</td>
                        <td>${e.post_date}</td>
                        <td>${e.username}</td>
                        <td id='edit' class='edit'><a href='update-post.php?pid=${e.post_id}'><i class='fa fa-edit'></i></a></td>
                        <td class='delete'><a href='delete-post.php'><i class='fa fa-trash-o'></i></a></td>
                    </tr>`
            });
            let total_record = result['all_post'].length;
            let page_post = 4;
            let total_page = Math.ceil(total_record / page_post);
            let li = ``;
            li += page > 1 ? `<li><a href="#" onclick="laod_data(${page - 1})">Prev</a></li>` : '';
            for(var i = 1; i <= total_page; i++){
                {page == i ? active = 'active' : active = ''}
                li += `<li class='${active}'>
                        <a href="#" onclick="laod_data(${i})">${i}</a>
                    </li>`;
            }
            li += page < total_page ? `<li><a href="#" onclick="laod_data(${page + 1})">Next</a></li>` : '';
            document.getElementById('pagination').innerHTML = li;
            document.getElementById('tbody').innerHTML = tr;
        }).catch((error) =>{
            console.log('error');
        })
    }
    laod_data(1);
  </script>
<?php include "footer.php"; ?>
