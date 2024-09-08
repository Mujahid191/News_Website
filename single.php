<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div id="post_container" class="post-container">
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
    <script>
        const laod_post = () => {
            let pid = location.search;
            fetch(`fetch.php${pid}`)
            .then((response) => response.json())
            .then((result) =>{
                let post = ``;
                result['single_post'].forEach(e => {
                    post += `<div class="post-content single-post">
                            <h3>${e.title}</h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href='category.php?cid=${e.category_id}'>${e.category_name}</a>
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
                            <img class="single-feature-image" src="admin/uploads/${e.post_img}" alt=""/>
                            <p class="description">${e.description}</p>
                        </div>`
                });
                document.getElementById('post_container').innerHTML = post;
            }).catch((error) =>{
                console.log('errors');
            })
        }
        laod_post();
    </script>
<?php include 'footer.php'; ?>
