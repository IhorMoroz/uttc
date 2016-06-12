<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <script src="/js/jquery.min.js" charset="utf-8"></script>
    <script src="/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <a href="/" class="btn btn-default navbar-btn">Home</a>
            <a href="/admin" class="btn btn-default navbar-btn navbar-right">Admin</a>
        </div>
    </nav>
    <section style="margin-top: 60px;">
        <div class="container">
            <?=$content;?>
        </div>
    </section>

</body>
</html>
