<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/profile" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                        <input class="form-control" type="file" id="formFileMultiple" name="image" multiple>
                    </div>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button name="submit" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div