(function ($) {
        setTimeout(function(){
            //table start
        if ($("#table_invoce").length > 0) {
            $("#table_invoce").dataTable({
                "aoColumnDefs": [{
                        "sTitle": "Название"
                        , "aTargets": ["title"]
                    }],
                language: {
                    "processing": "Подождите…",
                    "search": "Поиск:",
                    "lengthMenu": "Показать _MENU_ записей",
                    "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                    "infoEmpty": "Записи с 0 до 0 из 0 записей",
                    "infoFiltered": "(отфильтровано из _MAX_ записей)",
                    "infoPostFix": "",
                    "loadingRecords": "Загрузка записей…",
                    "zeroRecords": "Записи отсутствуют.",
                    "emptyTable": "В таблице отсутствуют данные",
                    "paginate": {
                        "first": "Первая",
                        "previous": "Предыдущая",
                        "next": "Следующая",
                        "last": "Последняя"
                    },
                    "aria": {
                        "sortAscending": ": активировать для сортировки столбца по возрастанию",
                        "sortDescending": ": активировать для сортировки столбца по убыванию"
                    }
                }
            });
            $('#all-checkbox').click(function () {
                if ($(this).is(':checked')) {
                    $('.type-checkbox').attr('checked', 'checked');
                } else {
                    $('.type-checkbox').removeAttr('checked');
                }
            });
            //end table
        }
        },500);
        
        
    $("#editorBook").validate({
			rules: {
				book_title: "required",
				book_author: "required",
                                book_genre: "required",
				book_title: {
					required: true,
					minlength: 3
				},
				book_genre: {
                                    required: true,
                                }
			},
			messages: {
				book_genre: "Please enter your book_author",
                                book_author: "Please enter your book_author",
				book_title: {
					required: "Please enter a book title",
					minlength: "Your title must consist of at least 3 characters"
				}
			}
		});

})(jQuery);

var app = {        
        getAuthorBoocks:function(obj){
            var author = obj.title;
            var table = $('#table_invoce').DataTable();
            $('input[type=search]').val(author);
            table.search(author).draw();
//            $('input[type=search]').trigger(e);
        },
        getGenreBoocks:function(obj){
            var genre = obj.title;
            var table = $('#table_invoce').DataTable();
            $('input[type=search]').val(genre);
            table.search(genre).draw();
        },
        getAuthor:function(){
            
        },
        deleteBook:function(id){
//            console.log(id);
            $.ajax({
                type: "POST",
                url: "catalog/deleteBook",
                data: {id: id},
                dataType: 'json',
                success: function (json) {
                    if(json['id'])
                    $('#book_'+id).empty();
                }
            });
        },
        editor:function(id){
            $.ajax({
                type: "POST",
                url: "catalog/editor",
                data: {id: id},
                dataType: 'json',
                success: function (json) {
                    var data = json.data;
                    $('#book_id').val(id);
                    $('#book_title').val(data.title);
                     var img = '/uploads/originals/'+data.img;
                     $('#book_img').attr('src',img);
                    var book_author = [];
                    for (var i = 0; i < data.author.length; i++) {
                        book_author.push(data.author[i]['id']);
                    }
                    $('#book_author').val(book_author);
                    var book_genre = [];
                    for (var i = 0; i < data.genre.length; i++) {
                        book_author.push(data.genre[i]['id']);
                        
                    }
                    $('#book_genre').val(book_author);
                    $('#book_annotation').val(data.annotation);
                    
                    $('#edit_book').modal('show');
                    $('#book_author').multiselect();   
                    $('#book_genre').multiselect();  
                }
            });
        },
//        editorBook:function(){
//            var form = $('#edit_book').serialize();
//            $.ajax({
//                type: "POST",
//                url: "catalog/editorBook",
//                data: form,
//                dataType: 'json',
//                success: function (json) {
//                    console.log(json);
//                }
//            });
//        },
        addBook:function(){
            $('#add_book').modal('show');
            $('#example-getting-started').multiselect();   
            $('#example-getting-started2').multiselect();  
        },
        addAuthor:function(name){
            $('#add_author').modal('show');
        }
    }