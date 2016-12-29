
</div>

<div class="modal fade" id="add_book">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Создать книгу</h4>
            </div>
            <?php echo form_open_multipart('catalog/createBook', array('id' => 'addBook')); ?>
            <div class="modal-body">
                <?php echo $error; ?>
                <div class="form-group">
                    <label for="exampleSelect1">Название книги</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="" placeholder="Название книги">
                </div>
                <div class="form-group">
                    <input type="file" name="img" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="author">Авторы</label>
                    <select id="example-getting-started" multiple="multiple" name="author[]">
                        <?php if (!empty($authors[0])): ?>
                            <?php foreach ($authors as $author): ?>
                                <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="genre">Жанр</label>
                    <select id="example-getting-started2" multiple="multiple" name="genre[]">
                        <?php if (!empty($genres[0])): ?>
                            <?php foreach ($genres as $genre): ?>
                                <option value="<?= $genre['id'] ?>"><?= $genre['title'] ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea">Аннотация</label>
                    <textarea class="form-control" name="annotation" id="exampleTextarea" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Добавить</button>
            </div>
            </form>    
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="edit_book">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Редактирование</h4>
            </div>
            <?php echo form_open_multipart('catalog/editorBook', array('id' => 'editorBook')); ?>
            <div class="modal-body">
                <input type="hidden" name="id" id="book_id" >
                <div class="form-group">
                    <label for="exampleSelect1">Название книги</label>
                    <input type="text" class="form-control" id="book_title" name="title"  aria-describedby="" placeholder="Название книги">
                </div>
                <div class="form-group">
                    <img id="book_img" src="" style="width: 100px;height: 100px;">
                    <input type="file" name="img"  class="form-control-file"  aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="author">Авторы</label>
                    <select id="book_author" multiple="multiple" name="author[]">
                        <?php if (!empty($authors[0])): ?>
                            <?php foreach ($authors as $author): ?>
                                <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="genre">Жанр</label>
                    <select id="book_genre" multiple="multiple" name="genre[]">
                        <?php if (!empty($genres[0])): ?>
                            <?php foreach ($genres as $genre): ?>
                                <option value="<?= $genre['id'] ?>"><?= $genre['title'] ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea">Аннотация</label>
                    <textarea class="form-control" id="book_annotation" name="annotation"  rows="3"></textarea>
                </div>
            </div>
             
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Редактировать</button>
                <!--onclick="app.editorBook();"-->
            </div>
            </form> 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="add_author">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Добавить автора</h4>
            </div>
            <?php echo form_open_multipart('catalog/createAuthor', array('id' => 'createAuthor')); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleSelect1">Имя автора</label>
                    <input type="text" class="form-control" name="name" id="title" aria-describedby="" placeholder="Имя автора">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
            </form>    
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
</html>