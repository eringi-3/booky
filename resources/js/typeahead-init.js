$(document).ready(function() {
    $('#book-title').typeahead({
        source: function(query, process) {
            // APIエンドポイントにユーザーが入力したキーワードを送信
            $.get('/typeahead', { term: query }, function(data) {
                process(data);
            });
        }
    });
});
