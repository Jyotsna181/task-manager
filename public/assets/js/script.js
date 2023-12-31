$(document).ready(function(){
    function resetIcon(icon){
        let defaultColor = '#65676D';
        icon.find('circle').attr('fill', '#FFF').attr('stroke', defaultColor);
        icon.find('path').attr('stroke', defaultColor);
        icon.closest('.task').find('#tasks-title').css('text-decoration', 'none');
    }

    $('.icon').on('click', function(){
        let color = '#2EB67D';
        $(this).find('circle').attr('fill', color).attr('stroke', color);
        $(this).find('path').attr('stroke', '#FFFF');
        $(this).closest('.task').find('#tasks-title').css('text-decoration', 'line-through');
    });

    $('.icon').on('dblclick', function(){
        resetIcon($(this));
    });
});

$(document).ready(function() {
    $("#navlist .link").on("click", function() {
        var current = $(".active");
        current.removeClass("active");
        $(this).addClass("active");
    });
});

$(document).ready(function () {
    $('.close').click(function () {
        $('.create-box').hide();
    });
});

$(document).ready(function () {
    var currentNumber = parseInt($('#task-number').text());
    var newNumber = currentNumber + 1;
    $('#task-number').text(sprintf('%02d', newNumber));
});

$(document).ready(function () {
    $("#task-list").sortable({
        update: function (event, ui) {
            updateTaskNumbers();
        }
    });

    $("#task-list").on("click", ".task", function () {
        $(".task").removeClass("selected");
        $(this).addClass("selected");
    });

    $("#move-up").on("click", function () {
        var selected = $(".selected");
        if (selected.prev().length !== 0) {
            selected.insertBefore(selected.prev());
            updateTaskNumbers();
        }
    });

    $("#move-down").on("click", function () {
        var selected = $(".selected");
        if (selected.next().length !== 0) {
            selected.insertAfter(selected.next());
            updateTaskNumbers();
        }
    });

    function updateTaskNumbers() {
        $(".task").each(function (index) {
            $(this).find("#task-number").text(sprintf('%02d', index + 1));
        });
    }
});

