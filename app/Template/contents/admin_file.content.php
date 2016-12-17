
<h1 style="position: relative; left: 40%; color: #4cae4c">Upload file</h1>
<div class="c-admin">
    <div class="row">
        <div class="header-top h-nav">
            <div class="header-top min">
                <h2>Orders</h2>
            </div>
        </div>
        <div class="col-md-12">

            <div class="col-lg-6 nav-admin add-file">
                <a href="/admin"><button type="button" class="btn btn-info btn-c">Back to admin-panel</button></a>
                <a href="/admin/orders"><button type="button" class="btn btn-info btn-c">Ready orders</button></a>
                <a href="/admin/create"><button type="button" class="btn btn-info btn-c">Add new user</button></a>
            </div>
            <form class="form-upload"  action= "upload" method='post' enctype='multipart/form-data'>
                <input class="form-control" type='file' name='user_file'>
                <input class="btn-info save-btn" type='submit' value="Upload">
            </form>
        </div>
    </div>
</div>
