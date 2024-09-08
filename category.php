<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  <h2 id="page_heading" class="page-heading"></h2>
                  <div id="post">
                    </div>
                    <ul id='pagination' class='pagination'>
                    </ul>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<script>
const load_category = (cpage) =>{
    let cid = location.search;
    fetch(`fetch.php${cid}&cpage=${cpage}`)
    .then((response) => response.json())
    .then((result) => {
        let post = '';
        result['post_by_category'].forEach(e => {
            let heading = `${e.category_name}`;
            document.getElementById('page_heading').innerText = heading;
            post += `<div class="post-content" id="post_content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single.php"><img src="admin/uploads/${e.post_img}" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php?pid=${e.post_id}'>${e.title}</a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='#'>${e.category_name}</a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php?uid=${e.user_id}'>${e.username}</a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            ${e.post_date}
                                        </span>
                                    </div>
                                    <p class="description">${e.description.slice(0, 70)}...</p>
                                    <a class='read-more pull-right' href='single.php?pid=${e.post_id}'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>`
            });
            let total_record = result['category_pagination'].length;
            let limit = 3;
            let total_pages = Math.ceil(total_record/limit);
            let li = '';
            li += cpage > 1 ? `<li><a href="#" onclick="load_category(${cpage - 1})">Prev</a></li>` : '';
                for(var i = 1; i <= total_pages; i++){
                    cpage == i ? active = 'active' : active = ''; 
                    li += `<li class=${active}><a href="#" onclick="load_category(${i})">${i}</a></li>`
                }
            li += cpage < total_pages ? `<li><a href='#' onclick='load_category(${cpage + 1})'>Next</a></li>` : '';
                document.getElementById('pagination').innerHTML = li;
                document.getElementById('post').innerHTML = post;
        }).catch((error) => console.log('errors'));
    }
    load_category(1);
</script>
<?php include 'footer.php'; ?>
