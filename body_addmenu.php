<main>
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="width: 40.00%; line-height: 2.00; margin-left: 320px;"><br>

                <form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">NAME</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter menu name" required />
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">DETAIL</label>
                        <textarea type="text" class="form-control" id="detail" name="detail" placeholder="Enter detail" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">PRICE</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" required />
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">IMAGE</label>
                        <input class="form-control" id="uploadImage" type="file" accept="image/*" name="image" />
                        <div id="preview"><img src="filed.png" /></div><br>
                    </div>
                    <div class="col-auto">
                        <input class="btn btn-success" type="submit" value="Upload">
                    </div>
                </form>
                <div id="err"></div>

            </div>
        </div>
    </div>
</main>