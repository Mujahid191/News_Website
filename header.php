<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu' id="menu">
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    const navigation = () =>{
        let cid = location.search.slice(5);
        fetch(`fetch.php`)
        .then((response) => response.json())
        .then((result) =>{
            location.pathname == '/news/index.php' ? active = 'active' : active = '';
            let li = `<li><a  class='${active}' href='index.php'>Home</a></li>`;
            result['all_category'].forEach(e => {
                cid == `${e.category_id}` ? active = 'active' : active = '';
                li += `<li><a class='${active}' href='category.php?cid=${e.category_id}'>${e.category_name}</a></li>`;
            });
            document.getElementById('menu').innerHTML = li;
        })
    }
    navigation(1);
</script>
<!-- /Menu Bar -->
