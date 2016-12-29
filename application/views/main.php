<?php
    $this->load->view('header');
?>

<div id="invoice-page">
    <div class="invoice-header">
        <h1>Каталог книг</h1>
    </div>
<?php
    if (isset($errDescription)) {
    echo "<h1>".$errDescription."</h1>";
}else{ ?>
    <table class="invoice-table"  id="table_invoce">
        <thead>
            <tr>
                <th rowspan="1">Название</th>
                <th rowspan="1">Изображение</th>
                <th colspan="1">Авторы</th>
                <th rowspan="1">Жанр</th>
                <!--<th rowspan="1">Страница</th>-->
                <th rowspan="1"><a href="javascript:void(0);" class="btn icon-btn" title="Создать книгу" onclick="app.addBook()">Создать книгу</a>&nbsp;&nbsp;<a href="javascript:void(0);" class="btn icon-btn" title="Создать автора" onclick="app.addAuthor()">Создать автора</a></th>
            </tr>
        </thead>
        <tbody id="example">
            <?php foreach($books as $book): ?>
            <tr id="book_<?=$book['id']?>">
                <td style="padding-left: 2em;"><a href="book/<?=$book['id']?>"><?=$book['title']?></a></td>
                <td>
                    <?php if(!empty($book['img'])):?>
                    <img src="/uploads/originals/<?=$book['img']?>" style="width: 100px;height: 100px;">
                    <?php endif;?>
                </td>
                <td>
                    <?php $authors = array();?>
                    <?php foreach($book['author'] as $author):?>
                    <?php $authors[]='<a href="javascript:void(0);" onclick="app.getAuthorBoocks(this)" title="'.$author['name'].'">'.$author['name'].'</a>'?>
                    <?php endforeach;?>
                    <?=implode(', ',$authors)?>
                </td>
                <td>
                    <?php $genres= array();?>
                    <?php foreach($book['genre']as $genre):?>
                    <?php $genres[]='<a href="javascript:void(0);" onclick="app.getGenreBoocks(this)" title="'.$genre['title'].'">'.$genre['title'].'</a>'?>
                    <?php endforeach;?>
                    <?=implode(', ',$genres)?>
                </td>
                <!--<td><?=$book['pages']?></td>-->
                <td>
                    
                    <a href="javascript:void(0);" class="btn icon-btn" onclick="app.editor(<?=$book['id']?>)" title="Редактировать"><img src="/assets/images/edit.png"></a>
                    <a href="javascript:void(0);" class="btn icon-btn" onclick="app.deleteBook(<?=$book['id']?>)" title="Удалить"><img src="/assets/images/delete1.png"></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php }; ?>


<?php
    $this->load->view('footer');
?>