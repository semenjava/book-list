<?php

    $this->load->view('header');
?>


<?php
if (isset($errDescription)) {
    echo "<h1>".$errDescription."</h1>";
}
else {
    echo "<h1>Книга ".$bookdetails['title']."</h1>";
    $authors = array();
    foreach($bookdetails['author'] as $author):
    $authors[]=$author['name'];
    endforeach;
    $genres = array();
    foreach($bookdetails['genre'] as $author):
    $genres[]=$author['title'];
    endforeach;
    echo "<p><strong>Автор:</strong> ".implode(', ',$authors)."</p>";
    echo "<p><strong>Жанр:</strong> ".implode(', ',$genres)."</p>";
    echo "<p><strong>Страниц:</strong> ".$bookdetails['pages']."</p>";
    echo "<p><strong>Аннотация:</strong> ".$bookdetails['annotation']."</p>";
}
?>

<?php
    echo "<p>".anchor("", "На главную")."</p>";
    $this->load->view('footer');
?>