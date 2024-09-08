<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <div id="side_post">
        </div>
    </div>
    <!-- /recent posts box -->
</div>
<script>
    const sidebar_post = () =>{
        fetch(`fetch.php`)
        .then((response) => response.json())
        .then((result) =>{
        let post = ``;
        result['sidebar_post'].forEach(e => {
            post += `<div class="recent-post">
                        <a class="post-img" href="">
                            <img src="admin/uploads/${e.post_img}" alt=""/>
                        </a>
                        <div class="post-content">
                            <h5><a href="single.php?pid=${e.post_id}">${e.title}</a></h5>
                            <span>
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                <a href='category.php?cid=${e.category_id}'>${e.category_name}</a>
                            </span>
                            <span>
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                ${e.post_date}
                            </span>
                            <a class="read-more" href="single.php?pid=${e.post_id}">read more</a>
                        </div>
                    </div>`
        });
        document.getElementById('side_post').innerHTML = post;
        }).catch((errors) => console.log('errors'));
    }
    sidebar_post();
</script>
